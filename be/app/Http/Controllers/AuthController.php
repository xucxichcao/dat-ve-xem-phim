<?php

namespace App\Http\Controllers;

use App\Models\ChieuPhim;
use App\Models\CumRap;
use App\Models\LichChieu;
use App\Models\Phim;
use App\Models\User;
use App\Models\Ve;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class AuthController extends Controller
{

    public function Register(Request $request)
    {
        $hoTen = $request->hoTen;
        $email = $request->email;
        $matKhau = $request->matKhau;
        $taiKhoan = $request->taiKhoan;
        $soDT = $request->soDt;
        $maNhom = $request->maNhom;
        // $maLoaiNguoiDung = $request->maLoaiNguoiDung;

        // Check if field is empty
        if (empty($hoTen) or empty($email) or empty($matKhau) or empty($taiKhoan) or empty($soDT) or empty($maNhom)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin đăng ký']);
        }

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['status' => 'error', 'message' => 'Địa chỉ email không tồn tại']);
        }

        // Check if password is greater than 5 character
        if (strlen($matKhau) < 6) {
            return response()->json(['status' => 'error', 'message' => 'Mật khẩu phải dài hơn 6 ký tự']);
        }

        // Check if user already exist
        if (User::where('taiKhoan', '=', $taiKhoan)->exists()) {
            return response()->json(['status' => 'error', 'message' => 'Tên người dùng đã tồn tại']);
        }

        // Create new user
        try {
            $user = new User();
            $user->hoTen = $hoTen;
            $user->email = $email;
            $user->matKhau = app('hash')->make($matKhau);
            $user->taiKhoan = $taiKhoan;
            $user->soDt = $soDT;
            $user->maNhom = $maNhom;
            $user->maLoaiNguoiDung = 'KhachhHang';
            $user->staff = false;

            if ($user->save()) {
                return $this->login($request);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function login(Request $request)
    {
        $taiKhoan = $request->taiKhoan;
        $matKhau = $request->matKhau;

        if (empty($taiKhoan) or empty($matKhau)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin đăng nhập'], 400);
        }

        if (!$token = Auth::attempt(['taiKhoan' => $taiKhoan, 'password' => $matKhau])) {
            return response()->json(['error' => 'Tên đăng nhập hoặc mật khẩu không chính xác'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function layDanhSachNguoiDung(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $maNhom = $request->input('MaNhom');
            $tuKhoa = $request->input('tuKhoa');
            if (empty($maNhom) and empty($tuKhoa))
                return User::all(['taiKhoan', 'hoTen', 'email', 'soDt', 'maLoaiNguoiDung']);
            else if (empty($tuKhoa)) {
                return User::where('maNhom', $maNhom)->get();
            } else {
                return User::where('hoTen', 'LIKE', '%' . $tuKhoa . '%')->get();
            }
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }

    public function layDanhSachNguoiDungPhanTrang(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $maNhom = $request->input('MaNhom');
            $tuKhoa = $request->input('tuKhoa');
            $soTrang = intval($request->input('soTrang', 1));
            $soPhanTuTrenTrang = intval($request->input('soPhanTuTrenTrang', 20));
            if (empty($maNhom) and empty($tuKhoa)) {
                $paginate =  User::paginate($soPhanTuTrenTrang, ['taiKhoan', 'hoTen', 'email', 'soDt', 'maLoaiNguoiDung', 'maNhom'], 'page', $soTrang);
                $data = new stdClass;
                $data->currentPage = $paginate->currentPage();
                $data->count = $paginate->perPage();
                $data->totalPages = $paginate->lastPage();
                $data->totalCount = $paginate->total();
                $data->items = $paginate->items();
                return response()->json($data);
            } else if (empty($tuKhoa)) {
                $paginate =  User::where('maNhom', $maNhom)->paginate($soPhanTuTrenTrang, ['taiKhoan', 'hoTen', 'email', 'soDt', 'maLoaiNguoiDung', 'maNhom'], 'page', $soTrang);
                $data = new stdClass;
                $data->currentPage = $paginate->currentPage();
                $data->count = $paginate->perPage();
                $data->totalPages = $paginate->lastPage();
                $data->totalCount = $paginate->total();
                $data->items = $paginate->items();
                return response()->json($data);
            } else if (empty($maNhom)) {
                $paginate = User::where('hoTen', 'LIKE', '%' . $tuKhoa . '%')->paginate($soPhanTuTrenTrang, ['taiKhoan', 'hoTen', 'email', 'soDt', 'maLoaiNguoiDung', 'maNhom'], 'page', $soTrang);
                $data = new stdClass;
                $data->currentPage = $paginate->currentPage();
                $data->count = $paginate->perPage();
                $data->totalPages = $paginate->lastPage();
                $data->totalCount = $paginate->total();
                $data->items = $paginate->items();
                return response()->json($data);
            } else {
                $paginate = User::where([['hoTen', 'LIKE', '%' . $tuKhoa . '%'], ['maNhom', $maNhom]])->paginate($soPhanTuTrenTrang, ['taiKhoan', 'hoTen', 'email', 'soDt', 'maLoaiNguoiDung', 'maNhom'], 'page', $soTrang);
                $data = new stdClass;
                $data->currentPage = $paginate->currentPage();
                $data->count = $paginate->perPage();
                $data->totalPages = $paginate->lastPage();
                $data->totalCount = $paginate->total();
                $data->items = $paginate->items();
                return response()->json($data);
            }
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }

    public function layDanhSachLoaiNguoiDung(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $myData = array();
            $myData[] = array('maLoaiNguoiDung' => 'KhachHang', 'tenLoai' => 'Khách hàng');
            $myData[] = array('maLoaiNguoiDung' => 'QuanTri', 'tenLoai' => 'Quản trị');
            return response()->json($myData);
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }

    public function themNguoiDung(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $hoTen = $request->hoTen;
            $email = $request->email;
            $matKhau = $request->matKhau;
            $taiKhoan = $request->taiKhoan;
            $soDT = $request->soDt;
            $maNhom = "GP01";
            $maLoaiNguoiDung = $request->maLoaiNguoiDung;

            // Check if field is empty
            if (empty($hoTen) or empty($email) or empty($matKhau) or empty($taiKhoan) or empty($soDT) or empty($maNhom) or empty($maLoaiNguoiDung)) {
                return response()->json(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin']);
            }

            // Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['status' => 'error', 'message' => 'Địa chỉ email không tồn tại']);
            }

            // Check if password is greater than 5 character
            if (strlen($matKhau) < 6) {
                return response()->json(['status' => 'error', 'message' => 'Mật khẩu phải dài hơn 6 ký tự']);
            }

            // Check if user already exist
            if (User::where('taiKhoan', '=', $taiKhoan)->exists()) {
                return response()->json(['status' => 'error', 'message' => 'Tên người dùng đã tồn tại']);
            }

            // Create new user
            try {
                $user = new User();
                $user->hoTen = $hoTen;
                $user->email = $email;
                $user->matKhau = app('hash')->make($matKhau);
                $user->taiKhoan = $taiKhoan;
                $user->soDt = $soDT;
                $user->maNhom = $maNhom;
                $user->maLoaiNguoiDung = $maLoaiNguoiDung;
                $user->staff = $maLoaiNguoiDung === 'KhachHang' ? false : true;

                if ($user->save()) {
                    return $this->login($request);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }

    public function capNhatThongTinNguoiDung(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $hoTen = $request->hoTen;
            $email = $request->email;
            $matKhau = $request->matKhau;
            $taiKhoan = $request->taiKhoan;
            $soDT = $request->soDt;
            $maNhom = "GP01";
            $maLoaiNguoiDung = $request->maLoaiNguoiDung;

            // Check if field is empty
            if (empty($hoTen) or empty($email) or empty($matKhau) or empty($taiKhoan) or empty($soDT) or empty($maNhom) or empty($maLoaiNguoiDung)) {
                return response()->json(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin'], 400);
            }
            User::where('taiKhoan', '=', $taiKhoan)->update(['taiKhoan' => $taiKhoan, 'matKhau' => app('hash')->make($matKhau), 'email' => $email, 'hoTen' => $hoTen, 'soDt' => $soDT, 'maNhom' => $maNhom, 'maLoaiNguoiDung' => $maLoaiNguoiDung]);
            return response()->json(['status' => 'success', 'message' => 'Success'], 200);
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }

    public function userCapNhatThongTin(Request $request)
    {
        $user = $request->user();
        if (empty($user)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
        }
        $hoTen = $request->hoTen;
        $email = $request->email;
        $matKhau = $request->matKhau;
        $soDT = $request->soDt;

        if (empty($hoTen) or empty($email) or empty($matKhau) or empty($soDT)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng điền đầy đủ thông tin'], 400);
        }
        User::where('taiKhoan', '=', $user->taiKhoan)->update(['matKhau' => app('hash')->make($matKhau), 'email' => $email, 'hoTen' => $hoTen, 'soDt' => $soDT,]);
        return response()->json(['status' => 'success', 'message' => 'Success'], 200);
    }

    public function xoaNguoiDung(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $taiKhoan = $request->TaiKhoan;
            if (empty($taiKhoan)) {
                return response()->json(['status' => 'error', 'message' => 'Vui lòng chọn tài khoản muốn xóa']);
            }
            User::where('taiKhoan', '=', $taiKhoan)->delete();
            return response()->json(['status' => 'success', 'message' => 'Success'], 200);
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }


    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();
        return response()->json($user);
    }

    public function thongTinTaiKhoan(Request $request)
    {
        $user = $request->user();
        if (empty($user)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng đăng nhập']);
        }
        $data = new stdClass();
        $data->taiKhoan = $user->taiKhoan;
        $data->hoTen = $user->hoTen;
        $data->email = $user->email;
        $data->soDT = $user->soDt;
        $data->loaiNguoiDung = $user->maLoaiNguoiDung;
        $data->maNhom = $user->maNhom;
        // $danhSachPhim = Phim::whereHas('chieuPhim.lichChieu.ve', function (Builder $query) use ($data) {
        //     $query->where('taiKhoanNguoiDat', $data->taiKhoan);
        // })->get();
        $danhSachVe = Ve::where('taiKhoanNguoiDat', '=', $data->taiKhoan)->get(['maVe', 'maLichChieu', 'maGhe', 'tenGhe', 'giaVe', 'loaiGhe'])->groupBy('maLichChieu');
        $danhSachLichChieu = array();
        foreach ($danhSachVe as $mlc) {
            $lichChieu = LichChieu::where('maLichChieu', $mlc[0]->maLichChieu)->first(['maLichChieu', 'maRap', 'ngayChieuGioChieu', 'tenRap', 'maChieu', 'thoiLuong']);
            $cumRap = CumRap::whereHas('danhSachRap', function (Builder $query) use ($lichChieu) {
                $query->where('maRap', $lichChieu->maRap);
            })->first(['diaChi', 'tenCumRap']);
            $phim = Phim::whereHas('chieuPhim', function (Builder $query) use ($lichChieu) {
                $query->where('maChieu', $lichChieu->maChieu);
            })->first(['tenPhim', 'hinhAnh', 'moTa']);
            $lichChieu->diaChi = $cumRap->diaChi;
            $lichChieu->tenCumRap = $cumRap->tenCumRap;
            $lichChieu->tenPhim = $phim->tenPhim;
            $lichChieu->hinhAnh = $phim->hinhAnh;
            $lichChieu->moTa = $phim->moTa;
            $lichChieu->danhSachVe = $mlc;
            $danhSachLichChieu[] = $lichChieu;
        }
        $data->danhSachLichChieu = $danhSachLichChieu;
        // foreach ($danhSachPhim as $phim) {
        //     $chieuPhim = ChieuPhim::where('maPhim', $phim->maPhim)->whereHas('lichChieu.ve', function (Builder $query) use ($data) {
        //         $query->where('taiKhoanNguoiDat', $data->taiKhoan);
        //     })->get('maCumRap');
        //     $maCumRapArray = array();
        //     foreach ($chieuPhim as $cr) {
        //         $maCumRapArray[] = $cr->maCumRap;
        //     }
        //     $crArray = array();
        //     foreach ($maCumRapArray as $cr) {
        //         $crArray[] = CumRap::where('maCumRap', $cr)->first(['maCumRap', 'tenCumRap']);
        //     }
        //     $phim->cumRap = $crArray;
        // }
        return response()->json($data);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function username()
    {
        return 'taiKhoan';
    }

    protected function respondWithToken($token)
    {
        $user = auth()->user();
        return response()->json([
            'accessToken' => $token,
            // 'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60,
            'taiKhoan' => $user->taiKhoan,
            'hoTen' => $user->hoTen,
            'soDT' => $user->soDt,
            'maNhom' => $user->maNhom,
            'maLoaiNguoiDung' => $user->maLoaiNguoiDung,
        ]);
    }
}
