<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Util\Json;
use \Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\PseudoTypes\True_;

use function PHPUnit\Framework\isNull;

class NguoiDungController extends Controller
{
    public function DangKy()
    {
        return view('NguoiDung.dang-ky');
    }

    public function PostDangKy(Request $request)
    {
        $data = array();
        $data['email'] = $request->email;
        $data['matkhau'] = $request->matkhau;
        $data['mapq'] = 1;

        DB::table('tblnguoidung')->insert($data);
        return Redirect ::to('/dang-nhap');
    }

    public function DangNhap()
    {
        if(Session::has('user')){
            return Redirect::to('/');
        }
        return view('NguoiDung.dang-nhap');
    }

    public function PostDangNhap(Request $request)
    {
        $nd = DB::table('tblnguoidung')
        ->where('email', $request->email)
        ->where('matkhau', $request->password)
        ->first();

        if(!empty($nd)){

            DB::table('tblnguoidung')
            ->where('mand', $nd->mand)
            ->update([
                'ngaydn' => Carbon::now()
            ]);

            session_start();
            $_SESSION['nguoidung'] = $nd;
            Session::put('user', $nd);
            return Redirect::to('/');
        }
        return view('NguoiDung.dang-nhap');
    }

    public function DangXuat()
    {
        Session::forget('user');
        return Redirect::to('/dang-nhap');
    }

    public function KiemTraTonTai(Request $request)
    {
        $nd = DB::table('tblnguoidung')
        ->where('email', $request->email)
        ->first();
        if($nd != null){
            return view('NguoiDung.kiem-tra-ton-tai')
            ->with('kq', true);
        }
        return view('NguoiDung.kiem-tra-ton-tai')
        ->with('kq', false);
    }
}
