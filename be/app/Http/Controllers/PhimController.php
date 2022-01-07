<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use stdClass;

class PhimController extends Controller
{
    public function layDanhSachPhim(Request $request)
    {
        $dangChieu = $request->dangChieu;
        $tenPhim = $request->tenPhim;
        if (!isset($dangChieu) or !isset($tenPhim)) {
            return Phim::all(['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong']);
        } else if (!isset($dangChieu)) {
            return Phim::where('tenPhim', 'LIKE', $tenPhim)->get(['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong']);
        } else if (!isset($tenPhim)) {
            return Phim::where('dangChieu', $dangChieu)->get(['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong']);
        } else {
            return Phim::where([['tenPhim', $tenPhim], ['dangChieu', $dangChieu]])->get(['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong']);
        }
    }

    public function layDanhSachPhimPhanTrang(Request $request)
    {
        $dangChieu = $request->dangChieu;
        $tenPhim = $request->tenPhim;
        $soTrang = $request->input('soTrang', 1);
        $soPhanTuTrenTrang = $request->input('soPhanTuTrenTrang', 10);
        if (!isset($dangChieu) or !isset($tenPhim)) {
            $paginate = Phim::paginate($soPhanTuTrenTrang, ['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong'], 'page', $soTrang);
            $data = new stdClass;
            $data->currentPage = $paginate->currentPage();
            $data->count = $paginate->perPage();
            $data->totalPages = $paginate->lastPage();
            $data->totalCount = $paginate->total();
            $data->items = $paginate->items();
            return response()->json($data);
        } else if (!isset($dangChieu)) {
            $paginate = Phim::where('tenPhim', 'LIKE', $tenPhim)->paginate($soPhanTuTrenTrang, ['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong'], 'page', $soTrang);
            $data = new stdClass;
            $data->currentPage = $paginate->currentPage();
            $data->count = $paginate->perPage();
            $data->totalPages = $paginate->lastPage();
            $data->totalCount = $paginate->total();
            $data->items = $paginate->items();
            return response()->json($data);
        } else if (!isset($tenPhim)) {
            $paginate = Phim::where('dangChieu', $dangChieu)->paginate($soPhanTuTrenTrang, ['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong'], 'page', $soTrang);
            $data = new stdClass;
            $data->currentPage = $paginate->currentPage();
            $data->count = $paginate->perPage();
            $data->totalPages = $paginate->lastPage();
            $data->totalCount = $paginate->total();
            $data->items = $paginate->items();
            return response()->json($data);
        } else {
            $paginate = Phim::where([['tenPhim', $tenPhim], ['dangChieu', $dangChieu]])->paginate($soPhanTuTrenTrang, ['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong'], 'page', $soTrang);
            $data = new stdClass;
            $data->currentPage = $paginate->currentPage();
            $data->count = $paginate->perPage();
            $data->totalPages = $paginate->lastPage();
            $data->totalCount = $paginate->total();
            $data->items = $paginate->items();
            return response()->json($data);
        }
    }

    public function layDanhSachPhimTheoNgay(Request $request)
    {
        $dangChieu = $request->dangChieu;
        $tenPhim = $request->tenPhim;
        $soTrang = $request->input('soTrang', 1);
        $soPhanTuTrenTrang = $request->input('soPhanTuTrenTrang', 10);
        $tuNgay = $request->tuNgay;
        $denNgay = $request->denNgay;
        if (!isset($tuNgay) or !isset($denNgay))
            return response()->json(['status' => 'error', 'message' => 'Vui lòng nhập thời gian']);

        if (!isset($dangChieu) or !isset($tenPhim)) {
            $paginate = Phim::whereDate([['ngayKhoiChieu', '<', $denNgay], ['ngayKhoiChieu', '>', $tuNgay]])->paginate($soPhanTuTrenTrang, ['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong'], 'page', $soTrang);
            $data = new stdClass;
            $data->currentPage = $paginate->currentPage();
            $data->count = $paginate->perPage();
            $data->totalPages = $paginate->lastPage();
            $data->totalCount = $paginate->total();
            $data->items = $paginate->items();
            return response()->json($data);
        } else if (!isset($dangChieu)) {
            $paginate = Phim::where('tenPhim', 'LIKE', $tenPhim)->whereDate([['ngayKhoiChieu', '<', $denNgay], ['ngayKhoiChieu', '>', $tuNgay]])->paginate($soPhanTuTrenTrang, ['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong'], 'page', $soTrang);
            $data = new stdClass;
            $data->currentPage = $paginate->currentPage();
            $data->count = $paginate->perPage();
            $data->totalPages = $paginate->lastPage();
            $data->totalCount = $paginate->total();
            $data->items = $paginate->items();
            return response()->json($data);
        } else if (!isset($tenPhim)) {
            $paginate = Phim::where('dangChieu', $dangChieu)->whereDate([['ngayKhoiChieu', '<', $denNgay], ['ngayKhoiChieu', '>', $tuNgay]])->paginate($soPhanTuTrenTrang, ['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong'], 'page', $soTrang);
            $data = new stdClass;
            $data->currentPage = $paginate->currentPage();
            $data->count = $paginate->perPage();
            $data->totalPages = $paginate->lastPage();
            $data->totalCount = $paginate->total();
            $data->items = $paginate->items();
            return response()->json($data);
        } else {
            $paginate = Phim::where([['tenPhim', $tenPhim], ['dangChieu', $dangChieu]])->whereDate([['ngayKhoiChieu', '<', $denNgay], ['ngayKhoiChieu', '>', $tuNgay]])->paginate($soPhanTuTrenTrang, ['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong'], 'page', $soTrang);
            $data = new stdClass;
            $data->currentPage = $paginate->currentPage();
            $data->count = $paginate->perPage();
            $data->totalPages = $paginate->lastPage();
            $data->totalCount = $paginate->total();
            $data->items = $paginate->items();
            return response()->json($data);
        }
    }

    public function themPhim(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $tenPhim = $request->tenPhim;
            $biDanh = Str::kebab($tenPhim);
            $trailer = $request->trailer;
            $hinhAnh = $request->input('hinhAnh', 'http://localhost:8888/hinhanh/movie.jpg');
            $moTa = $request->moTa;
            $dangChieu = $request->dangChieu;
            $ngayKhoiChieu = $request->ngayKhoiChieu;
            $danhGia = $request->danhGia;
            $thoiLuong = $request->thoiLuong;

            if (!isset($tenPhim) or !isset($trailer) or !isset($hinhAnh) or !isset($moTa) or !isset($dangChieu) or !isset($ngayKhoiChieu) or !isset($danhGia) or !isset($thoiLuong)) {
                return response()->json(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin'], 400);
            }

            try {
                $phim = new Phim();
                $phim->tenPhim = $tenPhim;
                $phim->biDanh = $biDanh;
                $phim->trailer = $trailer;
                $phim->hinhAnh = $hinhAnh;
                $phim->moTa = $moTa;
                $phim->dangChieu = $dangChieu;
                $phim->ngayKhoiChieu = $ngayKhoiChieu;
                $phim->danhGia = $danhGia;
                $phim->thoiLuong = $thoiLuong;

                if ($phim->save()) {
                    return response()->json(['status' => 'success', 'message' => 'Thêm phim thành công']);
                }
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }

    public function themPhimUploadHinh(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $tenPhim = $request->tenPhim;
            $biDanh = Str::kebab($tenPhim);
            $trailer = $request->trailer;
            $moTa = $request->moTa;
            $dangChieu = $request->dangChieu ? 1 : 0;
            $ngayKhoiChieu = $request->ngayKhoiChieu;
            $danhGia = $request->danhGia;
            $thoiLuong = $request->thoiLuong;

            if (!isset($tenPhim) or !isset($trailer) or !isset($moTa) or !isset($ngayKhoiChieu) or !isset($danhGia) or !isset($thoiLuong) or !isset($dangChieu)) {
                return response()->json(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin'], 400);
            }

            if ($request->hasFile('hinhAnh')) {
                $hinhAnh = $request->file('hinhAnh');
                if ($hinhAnh->isValid()) {
                    $fileName = time() . '_' . $hinhAnh->getClientOriginalName();
                    $path = base_path() . DIRECTORY_SEPARATOR  . "public" . DIRECTORY_SEPARATOR  . "hinhanh" . DIRECTORY_SEPARATOR . "movie-image";
                    $hinhAnh->move($path, $fileName);

                    try {
                        $phim = new Phim();
                        $phim->tenPhim = $tenPhim;
                        $phim->biDanh = $biDanh;
                        $phim->trailer = $trailer;
                        $phim->hinhAnh = $request->getSchemeAndHttpHost() . "/hinhanh/movie-image/" . $fileName;
                        $phim->moTa = $moTa;
                        $phim->dangChieu = $dangChieu;
                        $phim->ngayKhoiChieu = $ngayKhoiChieu;
                        $phim->danhGia = $danhGia;
                        $phim->thoiLuong = $thoiLuong;

                        if ($phim->save()) {
                            return response()->json(['status' => 'success', 'message' => 'Thêm phim thành công']);
                        }
                    } catch (\Exception $e) {
                        File::delete($path . DIRECTORY_SEPARATOR . $fileName);
                        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
                    }
                } else return response()->json(['status' => 'error', 'message' => 'Vui lòng gửi hình ảnh chính xác', 400]);
            } else return response()->json(['status' => 'error', 'message' => 'Vui lòng gửi hình ảnh chính xác'], 400);
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }

    public function layThongTinPhim(Request $request)
    {
        $maPhim = $request->maPhim;
        if (!isset($maPhim)) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng nhập mã phim'], 400);
        } else if (Phim::where('maPhim', $maPhim)->exists()) {
            $data = new stdClass;
            $phim = Phim::where('maPhim', $maPhim)->get(['maPhim', 'tenPhim', 'biDanh', 'trailer', 'hinhAnh', 'moTa', 'dangChieu', 'ngayKhoiChieu', 'danhGia', 'thoiLuong']);
            $data = $phim;
            return response()->json($data);
        }
    }

    public function xoaPhim(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $maPhim = $request->MaPhim;
            $phim = Phim::find($maPhim);
            $fullPath = $phim->hinhAnh;
            $splittedPath = explode("/", explode("//", $fullPath)[1]);
            array_shift($splittedPath);
            $pathToDelete = base_path() . DIRECTORY_SEPARATOR . "public";
            foreach ($splittedPath as $folder) {
                $pathToDelete = $pathToDelete . DIRECTORY_SEPARATOR . $folder;
            }
            File::delete($pathToDelete);
            $phim->delete();
            return response()->json(['status' => 'success', 'message' => 'Xóa phim thành công'], 200);
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }

    public function capNhatPhimUpload(Request $request)
    {
        if ($request->user()->can('laAdmin', User::class)) {
            $maPhim = $request->maPhim;
            $tenPhim = $request->tenPhim;
            $biDanh = Str::kebab($tenPhim);
            $trailer = $request->trailer;
            $moTa = $request->moTa;
            $dangChieu = $request->dangChieu ? 1 : 0;
            $ngayKhoiChieu = $request->ngayKhoiChieu;
            $danhGia = $request->danhGia;
            $thoiLuong = $request->thoiLuong;

            if (!isset($maPhim) or !isset($tenPhim) or !isset($trailer) or !isset($moTa) or !isset($ngayKhoiChieu) or !isset($danhGia) or !isset($thoiLuong) or !isset($dangChieu)) {
                return response()->json(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin'], 400);
            }
            if ($request->hasFile('hinhAnh')) {
                $hinhAnh = $request->file('hinhAnh');
                if ($hinhAnh->isValid()) {
                    // Remove current image
                    $curPhim = Phim::find($maPhim);
                    $fullPath = $curPhim->hinhAnh;
                    $splittedPath = explode("/", explode("//", $fullPath)[1]);
                    array_shift($splittedPath);
                    $pathToDelete = base_path() . DIRECTORY_SEPARATOR . "public";
                    foreach ($splittedPath as $folder) {
                        $pathToDelete = $pathToDelete . DIRECTORY_SEPARATOR . $folder;
                    }
                    // Add new image
                    $fileName = time() . '_' . $hinhAnh->getClientOriginalName();
                    $path = base_path() . DIRECTORY_SEPARATOR  . "public" . DIRECTORY_SEPARATOR  . "hinhanh" . DIRECTORY_SEPARATOR . "movie-image";
                    $hinhAnh->move($path, $fileName);

                    try {
                        $phim = Phim::find($maPhim);
                        $phim->tenPhim = $tenPhim;
                        $phim->biDanh = $biDanh;
                        $phim->trailer = $trailer;
                        $phim->hinhAnh = $request->getSchemeAndHttpHost() . "/hinhanh/movie-image/" . $fileName;
                        $phim->moTa = $moTa;
                        $phim->dangChieu = $dangChieu;
                        $phim->ngayKhoiChieu = $ngayKhoiChieu;
                        $phim->danhGia = $danhGia;
                        $phim->thoiLuong = $thoiLuong;

                        if ($phim->save()) {
                            File::delete($pathToDelete);
                            return response()->json(['status' => 'success', 'message' => 'Cập nhật phim thành công']);
                        }
                    } catch (\Exception $e) {
                        File::delete($path . DIRECTORY_SEPARATOR . $fileName);
                        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
                    }
                } else return response()->json(['status' => 'error', 'message' => 'Vui lòng gửi hình ảnh chính xác', 400]);
            } else {
                try {
                    $phim = Phim::find($maPhim);
                    $phim->tenPhim = $tenPhim;
                    $phim->biDanh = $biDanh;
                    $phim->trailer = $trailer;
                    $phim->moTa = $moTa;
                    $phim->dangChieu = $dangChieu;
                    $phim->ngayKhoiChieu = $ngayKhoiChieu;
                    $phim->danhGia = $danhGia;
                    $phim->thoiLuong = $thoiLuong;

                    if ($phim->save()) {
                        return response()->json(['status' => 'success', 'message' => 'Cập nhật phim thành công']);
                    }
                } catch (\Exception $e) {
                    return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
                }
            }
        } else return response()->json(['status' => 'error', 'message' => 'Bạn không có quyền xem trang này'], 403);
    }
}
