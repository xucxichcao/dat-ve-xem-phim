<?php

namespace App\Http\Controllers;

use App\Models\ChieuPhim;
use App\Models\CumRap;
use App\Models\HeThongRap;
use App\Models\LichChieu;
use App\Models\Phim;
use Illuminate\Http\Request;
use stdClass;

class HeThongRapController extends Controller
{
    public function layThongTinHeThongRap(Request $request)
    {
        $maHeThongRap = $request->maHeThongRap;
        if (empty($maHeThongRap)) {
            return HeThongRap::all(['maHeThongRap', 'tenHeThongRap', 'biDanh', 'logo']);
        } else {
            return HeThongRap::where('maHeThongRap', '=', $maHeThongRap)->get();
        }
    }

    public function layThongTinLichChieuHeThongRap(Request $request)
    {
        $maHeThongRap = $request->maHeThongRap;
        if (empty($maHeThongRap)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng điền mã hệ thống rạp']);
        } else if (HeThongRap::where('maHeThongRap', '=', $maHeThongRap)->exists()) {
            $htr = HeThongRap::where('maHeThongRap', '=', $maHeThongRap)->first(['maHeThongRap', 'tenHeThongRap', 'logo']);
            $cumrap = CumRap::where('maHeThongRap', '=', $maHeThongRap)->get(['maCumRap', 'tenCumRap', 'diaChi']);
            $data = new stdClass;
            $data = $htr;
            $data->lstCumRap = new stdClass;
            $data->lstCumRap = $cumrap;
            foreach ($data->lstCumRap as $cr) {
                $chieuphim = ChieuPhim::where('maCumRap', $cr->maCumRap)->get();
                $array = array();
                foreach ($chieuphim as $cp) {
                    $array[] = Phim::where('maPhim', $cp->maPhim)->first(['maPhim', 'tenPhim', 'hinhAnh']);
                }
                $cr->danhSachPhim = $array;
                $array = array();
                foreach ($cr->danhSachPhim as $phim) {
                    $maChieu = ChieuPhim::where([['maCumRap', $cr->maCumRap], ['maPhim', $phim->maPhim]])->first()->maChieu;
                    $array = LichChieu::where('maChieu', $maChieu)->get(['maLichChieu', 'maRap', 'ngayChieuGioChieu', 'giaVe']);
                    $phim->lstLichChieuTheoPhim = $array;
                }
            }
            // foreach ($data->lstCumRap as $cr) {
            //     $chieuphim = ChieuPhim::where('maCumRap', $cr->maCumRap)->get();
            //     $cr->cp = array();
            //     foreach ($chieuphim as $cp) {
            //         $cr->cp[] = Phim::where('maPhim', $cp->maPhim)->get();
            //     }
            //     foreach ($cr->cp as $phim) {
            //         $maChieu = ChieuPhim::where([['maCumRap', $cr->maCumRap], ['maPhim', $phim->maPhim]])->first()->maChieu;
            //         $phim->lstLichChieuTheoPhim = LichChieu::where('maChieu', $maChieu)->get();
            //     }
            // }
            return response()->json([$data]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Mã hệ thống rạp không tồn tại']);
        }
    }

    // public function themHeThongRap(Request $request)
    // {
    //     $maHeThongRap = $request->maHeThongRap;
    //     $tenHeThongRap = $request->tenHeThongRap;
    //     $biDanh = $request->biDanh;
    //     $logo = $request->logo;

    //     try {
    //         $htr = new HeThongRap();
    //         $htr->maHeThongRap = $maHeThongRap;
    //         $htr->tenHeThongRap = $tenHeThongRap;
    //         $htr->biDanh = $biDanh;
    //         $htr->logo = $logo;
    //         if ($htr->save()) {
    //             return response()->json(['status' => 'success', 'message' => 'Thêm hệ thống rap thành công']);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }
}
