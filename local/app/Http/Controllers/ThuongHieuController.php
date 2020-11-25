<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ThuongHieuController extends Controller
{
    //quản lý thương hiệu _admin
    public function DanhSachThuongHieu()
    {
        $data = DB::table('tblthuonghieu')
        ->paginate(10);
        return view('ThuongHieu.adminDanhSachThuongHieu')
        ->with('title', 'Danh sách thương hiệu')
        ->with('thuonghieu', $data);
    }

    public function ThemThuongHieu()
    {
        return view('ThuongHieu.adminThemThuongHieu')
        ->with('title', 'Thêm thương hiệu');
    }

    public function PostThemThuongHieu(Request $request)
    {
        $data = array();
        $data['thuonghieu'] = $request->thuonghieu;

         // add image
         if($request->hasFile('fileimg')){
            $file = $request->file('fileimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('contents/images/', $filename);
            $data['anhthuonghieu'] = $filename;
        }
        else{
            return $request;
            $data['anhthuonghieu'] = '';
        }

        DB::table('tblthuonghieu')->insert($data);
        return Redirect::to('/danh-sach-thuong-hieu');
    }
    
    public function SuaThuongHieu($id)
    {
        $data = DB::table('tblthuonghieu')->where('mathuonghieu', $id)->first();
        return view('ThuongHieu.adminSuaThuongHieu')
        ->with('title', 'Cập nhật thương hiệu')
        ->with('thuonghieu', $data);
    }

    public function PostSuaThuongHieu(Request $request)
    {
        $data = DB::table('tblthuonghieu')->where('mathuonghieu', $request->mathuonghieu)->first();
        // add image
        if($request->hasFile('fileimg')){
            $file = $request->file('fileimg');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('contents/images/', $filename);
            $data->anhthuonghieu = $filename;
        }
        
        DB::table('tblthuonghieu')->where('mathuonghieu', $request->mathuonghieu)->update([
            'thuonghieu' => $request->thuonghieu,
            'anhthuonghieu' => $data->anhthuonghieu
        ]);
        return Redirect::to('/danh-sach-thuong-hieu');
    }

    public function XoaThuongHieu($id)
    {
        $dssp = DB::table('tblsanpham')->where('mathuonghieu', $id)->get();
        foreach($dssp as $key => $sp){
            DB::table('tblsanpham')->where('masp', $sp->masp)->update([
                'mathuonghieu' => '5'
            ]);
        }
        DB::table('tblthuonghieu')->where('mathuonghieu', $id)->delete();
        return Redirect::to('/danh-sach-thuong-hieu');
    }
}
