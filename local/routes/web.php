<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DatHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThuongHieuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('Home.trang-chu');
});
*/
Route::get('/trang-chu', function () {
    return view('Home.trang-chu');
});

Route::get('/', [HomeController::class, 'Index']);
Route::get('trang-chu-admin', [HomeController::class, 'AdminIndex']);
Route::get('dang-ky', [NguoiDungController::class, 'DangKy']);
Route::post('post-dang-ky', [NguoiDungController::class, 'PostDangKy']);
Route::post('kiem-tra-ton-tai', [NguoiDungController::class, 'KiemTraTonTai']);
Route::get('dang-nhap', [NguoiDungController::class, 'DangNhap']);
Route::post('post-dang-nhap', [NguoiDungController::class, 'PostDangNhap']);
Route::get('dang-xuat', [NguoiDungController::class, 'DangXuat']);
Route::get('san-pham-moi-nhat', [HomeController::class, 'SanPhamMoiNhat']);
Route::get('tat-ca-san-pham', [SanPhamController::class, 'Index']);
Route::get('tim-kiem-theo-danh-muc-{madm}', [SanPhamController::class, 'TimKiemDanhMuc']);
Route::get('tim-kiem-theo-thuong-hieu-{math}', [SanPhamController::class, 'TimKiemThuongHieu']);
Route::get('tim-kiem-theo-thuong-hieu-{math}', [SanPhamController::class, 'TimKiemThuongHieu']);
Route::post('tim-kiem-nang-cao', [SanPhamController::class, 'TimKiemNangCao']);
Route::post('tim-kiem-theo-tu-khoa', [SanPhamController::class, 'TimKiemTheoTuKhoa']);
Route::get('chi-tiet-san-pham-{id}', [SanPhamController::class, 'ChiTietSanPham']);
Route::get('gio-hang', [DatHangController::class, 'GioHang']);
Route::get('them-vao-gio-{id}', [DatHangController::class, 'ThemVaoGio']);
Route::get('cap-nhat-so-luong-san-pham', [DatHangController::class, 'CapNhatSoLuong']);
Route::get('xoa-khoi-gio-hang', [DatHangController::class, 'XoaSPGioHang']);
Route::get('kiem-tra-ton-tai', [NguoiDungController::class, 'KiemTraTonTai']);


// quản lý _admin
Route::get('danh-sach-san-pham', [SanPhamController::class, 'DanhSachSanPham']);
Route::get('them-san-pham', [SanPhamController::class, 'ThemSanPham']);
Route::post('post-them-san-pham', [SanPhamController::class, 'PostThemSanPham']);
Route::get('sua-san-pham-{id}', [SanPhamController::class, 'SuaSanPham']);
Route::post('post-sua-san-pham', [SanPhamController::class, 'PostSuaSanPham']);
Route::post('xoa-san-pham-{id}', [SanPhamController::class, 'XoaSanPham']);
Route::get('danh-sach-danh-muc', [DanhMucController::class, 'DanhSachDanhMuc']);
Route::get('them-danh-muc', [DanhMucController::class, 'ThemDanhMuc']);
Route::post('post-them-danh-muc', [DanhMucController::class, 'PostThemDanhMuc']);
Route::get('sua-danh-muc-{id}', [DanhMucController::class, 'SuaDanhMuc']);
Route::post('post-sua-danh-muc', [DanhMucController::class, 'PostSuaDanhMuc']);
Route::post('xoa-danh-muc-{id}', [DanhMucController::class, 'XoaDanhMuc']);
Route::get('danh-sach-thuong-hieu', [ThuongHieuController::class, 'DanhSachThuongHieu']);
Route::get('them-thuong-hieu', [ThuongHieuController::class, 'ThemThuongHieu']);
Route::post('post-them-thuong-hieu', [ThuongHieuController::class, 'PostThemThuongHieu']);
Route::get('sua-thuong-hieu-{id}', [ThuongHieuController::class, 'SuaThuongHieu']);
Route::post('post-sua-thuong-hieu', [ThuongHieuController::class, 'PostSuaThuongHieu']);
Route::post('xoa-thuong-hieu-{id}', [ThuongHieuController::class, 'XoaThuongHieu']);









//Binh luan
Route::post('binh-luan-{id}', [SanPhamController::class, 'BinhLuan']);
Route::post('tra-loi-binh-luan-{id}-{bl}', [SanPhamController::class, 'TraLoiBinhLuan']);
