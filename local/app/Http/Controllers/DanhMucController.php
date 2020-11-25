<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class DanhMucController extends Controller
{
    // quản lý danh mục _admin
    public function DanhSachDanhMuc()
    {
        $data = DB::table('tbldanhmuc')
        ->paginate(10);
        return view('DanhMuc.adminDanhSachDanhMuc')
        ->with('title', 'Danh sách danh mục')
        ->with('danhmuc', $data);
    }

    public function ThemDanhMuc()
    {
        return view('DanhMuc.adminThemDanhMuc')
        ->with('title', 'Thêm danh mục');
    }

    public function PostThemDanhMuc(Request $request)
    {
        $data = array();
        $data['danhmuc'] = $request->danhmuc;
        $data['anhdanhmuc'] = $request->anhdanhmuc;

        DB::table('tbldanhmuc')->insert($data);
        return Redirect::to('/danh-sach-danh-muc');
    }
    
    public function SuaDanhMuc($id)
    {
        $data = DB::table('tbldanhmuc')->where('madm', $id)->first();
        return view('DanhMuc.adminSuaDanhMuc')
        ->with('title', 'Cập nhật danh mục')
        ->with('danhmuc', $data);
    }

    public function PostSuaDanhMuc(Request $request)
    {

        DB::table('tbldanhmuc')->where('madm', $request->madm)->update([
            'danhmuc' => $request->danhmuc,
            'anhdanhmuc' => $request->anhdanhmuc
        ]);
        return Redirect::to('/danh-sach-danh-muc');
    }

    public function XoaDanhMuc($id)
    {
        $dssp = DB::table('tblsanpham')->where('madm', $id)->get();
        foreach($dssp as $key => $sp){
            DB::table('tblsanpham')->where('masp', $sp->masp)->update([
                'madm' => '5'
            ]);
        }
        DB::table('tbldanhmuc')->where('madm', $id)->delete();
        return Redirect::to('/danh-sach-danh-muc');
    }
}
