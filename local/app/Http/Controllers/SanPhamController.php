<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SanPhamController extends Controller
{
    public function Index()
    {
        $data_moinhat = DB::table('tblsanpham')
        ->orderByDesc('ngaytao')
        ->paginate(7);

        return view('SanPham.tat-ca-san-pham')
        ->with('sanpham', $data_moinhat)
        ->with('title' , 'Tất cả sản phẩm');
    }

    public function getDanhMuc()
    {
        return $this->belongsTo(tbldanhmuc::class);
    }

    public function TimKiemDanhMuc($madm)
    {
        $data = DB::table('tblsanpham')
        ->where('madm', $madm)
        ->paginate(7);

        $cat = DB::table('tbldanhmuc')
        ->where('madm' , $madm)
        ->first();

        return view('SanPham.tat-ca-san-pham')
        ->with('sanpham', $data)
        ->with('title' , 'Danh mục: '. $cat->danhmuc);
    }
    public function TimKiemThuongHieu($math)
    {
        $data = DB::table('tblsanpham')
        ->where('mathuonghieu', $math)
        ->simplePaginate(7);

        $cat = DB::table('tblthuonghieu')
        ->where('mathuonghieu' , $math)
        ->first();

        return view('SanPham.tat-ca-san-pham')
        ->with('sanpham', $data)
        ->with('title' , 'Thương hiệu: '. $cat->thuonghieu);
    }

    public function TimKiemTheoTuKhoa(Request $request)
    {
        $data = DB::table('tblsanpham')
        ->where('tensp', 'like', '%' . $request->key . '%')
        ->orWhere('madinhdanh', 'like' , '%' . $request->key . '%')
        ->paginate(7);
        return view('SanPham.tat-ca-san-pham')
        ->with('sanpham', $data)
        ->with('title' , 'Từ khóa: '. $request->key)
        ->with('title_key', $request->key);
    }

    public function TimKiemNangCao(Request $request)
    {
        $madm = $request->danhmuc;
        $math = $request->thuonghieu;
        $key = $request->searchText;

        $tendm = DB::table('tbldanhmuc')->where('madm', $madm)->first();
        $tenth = DB::table('tblthuonghieu')->where('mathuonghieu', $math)->first();
        if($madm != 0 && $math !=0){
            $data = DB::table('tblsanpham')
            ->where('madm', $madm)
            ->where('mathuonghieu', $math)
            ->where('tensp', 'LIKE', '%'.$key.'%')
            ->paginate(7);

            return view('SanPham.tat-ca-san-pham')
            ->with('title', 'Tìm kiếm theo danh mục: ' . $tendm->danhmuc .', thương hiệu: ' . $tenth->thuonghieu . ', từ khóa: ' . $key)
            ->with('sanpham', $data)
            ->with('title_danhmuc', $tendm)
            ->with('title_thuonghieu', $tenth)
            ->with('title_tukhoa', $key);
        }
        else if($madm == 0 && $math != 0){
            $data = DB::table('tblsanpham')
            ->where('mathuonghieu', $math)
            ->where('tensp', 'LIKE', '%'.$key.'%')
            ->paginate(7);

            return view('SanPham.tat-ca-san-pham')
            ->with('title', 'Tìm kiếm theo danh mục: tất cả, thương hiệu: ' . $tenth->thuonghieu . ', từ khóa: ' . $key)
            ->with('sanpham', $data)
            ->with('title_danhmuc', '0')
            ->with('title_thuonghieu', $tenth)
            ->with('title_tukhoa', $key);
        }
        else if($math == 0 && $madm != 0){
            $data = DB::table('tblsanpham')
            ->where('madm', $madm)
            ->where('tensp', 'LIKE', '%'.$key.'%')
            ->paginate(7);

            return view('SanPham.tat-ca-san-pham')
            ->with('title', 'Tìm kiếm theo danh mục: ' . $tendm->danhmuc .', thương hiệu: tất cả, từ khóa: ' . $key)
            ->with('sanpham', $data)
            ->with('title_danhmuc', $tendm)
            ->with('title_thuonghieu', '0')
            ->with('title_tukhoa', $key);
        }
        else{
            $data = DB::table('tblsanpham')
            ->where('tensp', 'LIKE', '%'.$key.'%')
            ->paginate(7);

            return view('SanPham.tat-ca-san-pham')
            ->with('title', 'Tìm kiếm theo danh mục: tất cả, thương hiệu: tất cả, từ khóa: ' . $key)
            ->with('sanpham', $data)
            ->with('title_danhmuc', '0')
            ->with('title_thuonghieu', '0')
            ->with('title_tukhoa', $key);
        }
    }

    public function ChiTietSanPham($id)
    {
        $data = DB::table('tblsanpham')
        ->where('masp', $id)
        ->first();

        DB::table('tblsanpham')
        ->where('masp', $id)
        ->update([
            'luotxem' => $data->luotxem + 1
        ]);


        return view('SanPham.chi-tiet-san-pham')
        ->with('sanpham', $data)
        ->with('title', 'Chi tiết sản phẩm: ');
    }

    // quản lý sản phẩm _admin
    public function DanhSachSanPham()
    {
        $data = DB::table('tblsanpham')
        ->orderByDesc('ngaytao')
        ->simplePaginate(10);

        return view('SanPham.adminDanhSachSanPham')
        ->with('sanpham', $data)
        ->with('title' , 'Danh sách sản phẩm');
    }

    public function ThemSanPham()
    {
        return view('SanPham.adminThemSanPham')
        ->with('title', 'Thêm sản phẩm mới');
    }

    public function PostThemSanPham(Request $request)
    {
        $data = array();
        $data['madinhdanh'] = $request->madinhdanh;
        $data['tensp'] = $request->tensp;
        $data['mota'] = $request->mota;
        $data['giaban'] = $request->giaban;
        $data['khuyenmai'] = $request->khuyenmai;
        $data['mathuonghieu'] = $request->mathuonghieu;
        $data['madm'] = $request->madanhmuc;
        $data['luotxem'] = 0;
        $data['luotdanhgia'] = 0;
        $data['tbdanhgia'] = 0;
        $data['ngaytao'] = Carbon::now();

        // add image
        if($request->hasFile('fileimg')){
            $file = $request->file('fileimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('contents/images/', $filename);
            $data['anhminhhoa'] = $filename;
        }
        else{
            return $request;
            $data['anhminhhoa'] = '';
        }

        DB::table('tblsanpham')->insert($data);

        return Redirect::to('/danh-sach-san-pham');
    }

    public function SuaSanPham($id)
    {
        $data = DB::table('tblsanpham')
        ->where('masp', $id)
        ->first();

        return view('SanPham.adminSuaSanPham')
        ->with('title', 'Cập nhật sản phẩm')
        ->with('sanpham', $data);
    }

    public function PostSuaSanPham(Request $request)
    {
        $data = DB::table('tblsanpham')->where('masp', $request->masp)->first();
        /**$data->madinhdanh = $request->madinhdanh;
        $data->tensp = $request->tensp;
        $data->mota = $request->mota;
        $data->giaban = $request->giaban;
        $data->khuyenmai = $request->khuyenmai;
        $data->mathuonghieu = $request->mathuonghieu;
        $data->madm = $request->madanhmuc; */

        // add image
        if($request->hasFile('fileimg')){
            $file = $request->file('fileimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('contents/images/', $filename);
            $data['anhminhhoa'] = $filename;
        }

        DB::table('tblsanpham')->where('masp', $request->masp)->update([
            'madinhdanh' => $request->madinhdanh,
            'tensp' => $request->tensp,
            'mota' => $request->mota,
            'giaban' => $request->giaban,
            'khuyenmai' => $request->khuyenmai,
            'mathuonghieu' => $request->mathuonghieu,
            'madm' => $request->madanhmuc,
            'anhminhhoa' => $data->anhminhhoa
        ]);

        return Redirect::to('/danh-sach-san-pham');
    }

    public function XoaSanPham($id)
    {
        DB::table('tblsanpham')->where('masp', $id)->delete();
        return Redirect::to('/danh-sach-san-pham');
    }

    //Binh luan
    public function BinhLuan(int $id, Request $request)
    {
        $nd = Session::get('user');
        $data = array();
        $data['nd'] = $request->nd;
        $data['masp'] = $id;

        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $data['ngaybl'] = $now;

        $data['mand'] = $nd->mand;


        DB::table('tblbinhluan')->insert($data);
        return Redirect::to('chi-tiet-san-pham-'.$id);
    }
    public function TraLoiBinhLuan(int $id, Request $request,int $bl)
    {
        $nd = Session::get('user');

        $data = array();
        $data['nd'] = $request->nd;
        $data['mabl'] = $bl;

        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $data['ngayrl'] = $now;

        $data['mand'] = $nd->mand;


        DB::table('tbltraloibinhluan')->insert($data);

        return Redirect::to('chi-tiet-san-pham-'.$id);
    }
}
