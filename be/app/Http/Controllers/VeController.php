<?php

namespace App\Http\Controllers;

use App\Models\ChieuPhim;
use App\Models\CumRap;
use App\Models\LichChieu;
use App\Models\Phim;
use App\Models\Ve;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use stdClass;

class VeController extends Controller
{
    public function layDanhSachPhongVe(Request $request)
    {
        $maLichChieu = $request->MaLichChieu;
        if (empty($maLichChieu)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng nhập mã lịch chiếu']);
        }
        if (!LichChieu::where('maLichChieu', $maLichChieu)->exists()) return response()->json(['status' => 'error', 'message' => 'Mã lịch chiếu không tồn tại']);
        $lichChieu = LichChieu::where('maLichChieu', $maLichChieu)->first();
        $ngayChieuGioChieu = \Carbon\Carbon::parse($lichChieu->ngayChieuGioChieu);
        $maChieu = $lichChieu->maChieu;
        $tenRap = $lichChieu->tenRap;
        $giaVe = $lichChieu->giaVe;
        $chieuPhim = ChieuPhim::where('maChieu', $maChieu)->first();
        $maPhim = $chieuPhim->maPhim;
        $maCumRap = $chieuPhim->maCumRap;
        $phim = Phim::where('maPhim', $maPhim)->first();
        $cumRap = CumRap::where('maCumRap', $maCumRap)->first();
        $data = new stdClass();
        $thongTinPhim = new stdClass();
        $thongTinPhim->maLichChieu = $maLichChieu;
        $thongTinPhim->tenCumRap = $cumRap->tenCumRap;
        $thongTinPhim->tenRap = $tenRap;
        $thongTinPhim->diaChi = $cumRap->diaChi;
        $thongTinPhim->tenPhim = $phim->tenPhim;
        $thongTinPhim->hinhAnh = $phim->hinhAnh;
        $thongTinPhim->ngayChieu = $ngayChieuGioChieu->format('d/m/Y');
        $thongTinPhim->gioChieu = $ngayChieuGioChieu->format('H:i');
        $data->thongTinPhim = $thongTinPhim;
        // return response()->json(['maPhim' => $maPhim]);
        $data->danhSachGhe = array();
        $ves = Ve::where('maLichChieu', $maLichChieu)->get();
        $ghe_dat_array = array();
        $ghe_dat_withtk_array = array();
        foreach ($ves as $ve) {
            $ghe_dat_array[] = $ve->maGhe;
            $ghe_dat_withtk_array[] = $ve->taiKhoanNguoiDat;
        }
        $count = 0;
        for ($i = 0; $i < 160; $i++) {
            $newGhe = new stdClass();
            $newGhe->maGhe = $i + 1;
            $newGhe->tenGhe = $i < 9 ? '0' . $i + 1 : $i + 1;
            // $newGhe->maRap = $maRap
            $newGhe->loaiGhe = ((intdiv($i, 16) != 0 and intdiv($i, 16) != 1 and intdiv($i, 16) != 8 and intdiv($i, 16) != 9) and ($i % 16 != 0 and $i % 16 != 1 and $i % 16 != 14 and $i % 16 != 15)) ? 'Vip' : 'Thuong';
            $newGhe->giaVe = $newGhe->loaiGhe == "Vip" ? intval($giaVe) * 1.2 : $giaVe;
            if (in_array($newGhe->maGhe, $ghe_dat_array)) {
                $newGhe->daDat =  true;
                $newGhe->taiKhoanNguoiDat = $ghe_dat_withtk_array[$count];
                $count++;
            } else {
                $newGhe->daDat = false;
                $newGhe->taiKhoanNguoiDat = null;
            }
            $data->danhSachGhe[] = $newGhe;
        }

        return response()->json($data);
    }

    public function datVe(Request $request)
    {
        $maLichChieu = $request->maLichChieu;
        $danhSachVe = $request->danhSachVe;
        $taiKhoanNguoiDat = request()->user()->taiKhoan;
        $giaVe = LichChieu::where('maLichChieu', $maLichChieu)->first()->giaVe;
        if (empty($maLichChieu) or empty($danhSachVe) or empty($taiKhoanNguoiDat))
            return response()->json(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin hoặc đăng nhập'], 400);
        foreach ($danhSachVe as $ve) {
            if (Ve::where([['maLichChieu', $maLichChieu], ['maGhe', $ve['maGhe']]])->exists())
                return response()->json(['status' => 'error', 'message' => 'Vui lòng không đặt ghế đã được đặt'], 400);
            // return response()->json(gettype($ve));
        }
        try {
            $flag = true;
            foreach ($danhSachVe as $ve) {
                $newVe = new Ve();
                $newVe->taiKhoanNguoiDat = $taiKhoanNguoiDat;
                $newVe->maLichChieu = $maLichChieu;
                $newVe->maGhe = $ve['maGhe'];
                $newVe->tenGhe = $ve['tenGhe'];
                $newVe->loaiGhe = ((intdiv($newVe->maGhe, 16) != 0 and intdiv($newVe->maGhe, 16) != 1 and intdiv($newVe->maGhe, 16) != 8 and intdiv($newVe->maGhe, 16) != 9) and ($newVe->maGhe % 16 != 0 and $newVe->maGhe % 16 != 1 and $newVe->maGhe % 16 != 14 and $newVe->maGhe % 16 != 15)) ? 'Vip' : 'Thuong';
                $newVe->giaVe = $newVe->loaiGhe == 'Thuong' ? intval($giaVe) : intval($giaVe * 1.2);
                $newVe->daDat = true;
                if (!$newVe->save()) {
                    $flag = false;
                }
            }
            if ($flag == true) {
                return response()->json(['status' => 'success', 'message' => 'Bạn đã đặt vé thành công'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }
}
