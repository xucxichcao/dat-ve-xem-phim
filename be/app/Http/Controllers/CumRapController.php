<?php

namespace App\Http\Controllers;

use App\Models\CumRap;
use App\Models\HeThongRap;
use App\Models\Rap;
use Illuminate\Http\Request;
use stdClass;

class CumRapController extends Controller
{
    public function layThongTinCumRapTheoHeThong(Request $request)
    {
        $maHeThongRap = $request->maHeThongRap;
        if (empty($maHeThongRap)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng điền mã hệ thống rạp']);
        } else if (HeThongRap::where('maHeThongRap', '=', $maHeThongRap)->exists()) {
            $datas = array();
            $cumraps = CumRap::where('maHeThongRap', '=', $maHeThongRap)->get();
            foreach ($cumraps as $cumrap) {
                $data = new stdClass;
                $data->maCumRap = $cumrap->maCumRap;
                $data->tenCumRap = $cumrap->tenCumRap;
                $data->diaChi = $cumrap->diaChi;
                $data->danhSachRap = Rap::where('maCumRap', '=', $data->maCumRap)->get(['maRap', 'tenRap']);
                $datas[] = $data;
            }
            return response()->json($datas);
            // return CumRap::with('danhSachRap')->get(['maCumRap', 'tenCumRap', 'diaChi']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Mã hệ thống rạp không tồn tại']);
        }
    }

    // public function themCumRap(Request $request)
    // {
    //     $maHeThongRap = $request->maHeThongRap;
    //     $maCumRap = $request->maCumRap;
    //     $tenCumRap = $request->tenCumRap;
    //     $diaChi = $request->diaChi;

    //     try {
    //         $cr = new CumRap();
    //         $cr->maHeThongRap = $maHeThongRap;
    //         $cr->maCumRap = $maCumRap;
    //         $cr->tenCumRap = $tenCumRap;
    //         $cr->diaChi = $diaChi;

    //         if ($cr->save()) {
    //             return response()->json(['status' => 'success', 'message' => 'Thêm cụm rạp thành công']);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }
}
