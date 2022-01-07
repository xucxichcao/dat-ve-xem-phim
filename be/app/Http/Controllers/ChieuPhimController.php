<?php

namespace App\Http\Controllers;

use App\Models\ChieuPhim;
use App\Models\CumRap;
use App\Models\Phim;
use Illuminate\Http\Request;

class ChieuPhimController extends Controller
{
    public function themChieuPhim(Request $request)
    {
        $maPhim = $request->maPhim;
        $maCumRap = $request->maCumRap;
        $conChieu = $request->input('conChieu', true);
        if (empty($maPhim) or empty($maCumRap))
            return response()->json(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin'], 400);
        if (CumRap::where('maCumRap', $maCumRap)->exists() and Phim::where('maPhim', $maPhim)->exists()) {
            try {
                $cp = new ChieuPhim();
                $cp->maPhim = $maPhim;
                $cp->maCumRap = $maCumRap;
                $cp->conChieu = $conChieu;
                if ($cp->save()) {
                    return response()->json(['status' => 'success', 'message' => 'Thêm phim mã ' . $maPhim . ' vào cụm rạp mã ' . $maCumRap . ' thành công']);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        } else return response()->json(['status' => 'error', 'message' => 'Phim hoặc cụm rạp không tồn tại']);
    }
}
