<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/QuanLyNguoiDung'], function () use ($router) {
    $router->post('DangNhap', 'AuthController@Login');
    $router->post('DangKy', 'AuthController@Register');
    $router->get('ThongTinTaiKhoan', 'AuthController@thongTinTaiKhoan');
    $router->get('LayDanhSachLoaiNguoiDung', 'AuthController@layDanhSachLoaiNguoiDung');
    $router->get('LayDanhSachNguoiDung', 'AuthController@layDanhSachNguoiDung');
    $router->get('LayDanhSachNguoiDungPhanTrang', 'AuthController@layDanhSachNguoiDungPhanTrang');
    $router->get('TimKiemNguoiDung', 'AuthController@layDanhSachNguoiDung');
    $router->get('TimKiemNguoiDungPhanTrang', 'AuthController@layDanhSachNguoiDungPhanTrang');
    $router->put('CapNhatThongTinNguoiDung', 'AuthController@capNhatThongTinNguoiDung');
    $router->put('UserCapNhatThongTin', 'AuthController@userCapNhatThongTin');
});

$router->group(['prefix' => 'api/QuanLyRap'], function () use ($router) {
    $router->get('LayThongTinHeThongRap', 'HeThongRapController@layThongTinHeThongRap');
    // $router->post('ThemHeThongRap', 'HeThongRapController@themHeThongRap');
    $router->get('LayThongTinCumRapTheoHeThong', 'CumRapController@layThongTinCumRapTheoHeThong');
    // $router->post('ThemCumRap', 'CumRapController@themCumRap');
    $router->get('LayThongTinLichChieuHeThongRap', 'HeThongRapController@layThongTinLichChieuHeThongRap');
    $router->get('LayThongTinLichChieuPhim', 'LichChieuController@layThongTinLichChieuPhim');
    $router->post('ThemChieuPhim', 'ChieuPhimController@themChieuPhim');
});

$router->group(['prefix' => 'api/QuanLyPhim'], function () use ($router) {
    $router->get('LayDanhSachPhim', 'PhimController@layDanhSachPhim');
    $router->get('LayDanhSachPhimPhanTrang', 'PhimController@layDanhSachPhimPhanTrang');
    $router->get('LayDanhSachPhimTheoNgay', 'PhimController@layDanhSachPhimTheoNgay');
    $router->get('ThemPhim', 'PhimController@themPhim');
    $router->get('LayThongTinPhim', 'PhimController@layThongTinPhim');
    $router->post('ThemPhimUploadHinh', "PhimController@themPhimUploadHinh");
    $router->delete('XoaPhim', "PhimController@xoaPhim");
    $router->post("CapNhatPhimUpload", "PhimController@capNhatPhimUpload");
});

$router->group(['prefix' => 'api/QuanLyDatVe'], function () use ($router) {
    $router->post('TaoLichChieu', 'LichChieuController@taoLichChieu');
    $router->get('LayDanhSachPhongVe', 'VeController@layDanhSachPhongVe');
    $router->post('DatVe', 'VeController@datVe');
});
