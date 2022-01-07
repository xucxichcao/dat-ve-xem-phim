<?php

namespace App\Http\Controllers;

use App\Models\ChieuPhim;
use App\Models\CumRap;
use App\Models\HeThongRap;
use App\Models\LichChieu;
use App\Models\Phim;
use App\Models\Rap;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    public function taoLichChieu(Request $request)
    {
        $maPhim = $request->maPhim;
        $ngayChieuGioChieu = $request->ngayChieuGioChieu;
        $maRap = $request->maRap;
        $giaVe = $request->giaVe;
        $thoiLuong = Phim::where('maPhim', $maPhim)->first()->thoiLuong;
        $maCumRap = Rap::where('maRap', $maRap)->first()->maCumRap;
        if (empty($maPhim) or empty($ngayChieuGioChieu) or empty($maRap) or empty($giaVe))
            return response()->json(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin'], 400);
        if (!ChieuPhim::where([['maCumRap', '=', $maCumRap], ['maPhim', '=', $maPhim]])->exists()) {
            $cp = new ChieuPhim();
            $cp->maPhim = $maPhim;
            $cp->maCumRap = $maCumRap;
            $cp->conChieu = true;
            $cp->save();
        }
        $maChieu = ChieuPhim::where([['maCumRap', '=', $maCumRap], ['maPhim', '=', $maPhim]])->first()->maChieu;
        if (LichChieu::where([['maChieu', $maChieu], ['maRap', $maRap], ['ngayChieuGioChieu', $ngayChieuGioChieu]])->exists()) {
            return response()->json(['status' => 'error', 'message' => 'Lịch chiếu đã tồn tại'], 400);
        }
        $tenRap = Rap::where('maRap', $maRap)->first()->tenRap;
        try {
            $lc = new LichChieu();
            $lc->maChieu = $maChieu;
            $lc->maRap = $maRap;
            $lc->tenRap = $tenRap;
            $lc->giaVe = $giaVe;
            $lc->ngayChieuGioChieu = $ngayChieuGioChieu;
            $lc->thoiLuong = $thoiLuong;
            if ($lc->save()) {
                return response()->json(['status' => 'success', 'message' => 'Thêm lịch chiếu thành công']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function layThongTinLichChieuPhim(Request $request)
    {
        $maPhim = $request->MaPhim;
        if (empty($maPhim)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng điền mã phim']);
        }
        $phim = Phim::where('maPhim', $maPhim)->first(['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'ngayKhoiChieu', 'danhGia', 'dangChieu']);
        // $chieuPhim = ChieuPhim::where('maPhim', $maPhim)->with('cumRap.heThongRap')->get();
        $chieuPhim = HeThongRap::whereHas('cumRap.chieuPhim', function (Builder $query) use ($maPhim) {
            $query->where('maPhim', '=', $maPhim);
        })->get(['maHeThongRap', 'tenHeThongRap', 'logo']);
        $phim->heThongRapChieu = $chieuPhim;
        foreach ($chieuPhim as $htr) {
            $cumRap = CumRap::where('maHeThongRap', $htr->maHeThongRap)->whereHas('chieuPhim', function (Builder $query) use ($maPhim) {
                $query->where('maPhim', '=', $maPhim);
            })->get(['maCumRap', 'tenCumRap']);
            foreach ($cumRap as $cr) {
                $newArray = array();
                $dsMaRap = Rap::where('maCumRap', $cr->maCumRap)->select('maRap')->get();
                foreach ($dsMaRap as $rap) {
                    $lc = LichChieu::where('maRap', $rap->maRap)->get(['maLichChieu', 'maRap', 'tenRap', 'ngayChieuGioChieu', 'giaVe', 'thoiLuong']);
                    foreach ($lc as $l) {
                        $newArray[] = $l;
                    }
                }
                $cr->lichChieuPhim = $newArray;
            }
            $htr->cumRapChieu = $cumRap;
        }
        return response()->json($phim);
    }
}
