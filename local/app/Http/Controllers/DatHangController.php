<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DatHangController extends Controller
{
    public function GioHang()
    {
        if(Session::has('user')){
            $nd = Session::get('user');
            $data = DB::table('tblcthd')
            ->join('tblhoadon', 'tblhoadon.mahd', 'tblcthd.mahd')
            ->where('mand', $nd->mand)
            ->join('tblsanpham', 'tblsanpham.masp', 'tblcthd.masp')
            ->where('tblhoadon.trangthai' , false)
            ->orderByDesc('ngayban')
            ->get(array(
                'tblcthd.masp',
                'madinhdanh',
                'tensp',
                'anhminhhoa',
                'madm',
                'mathuonghieu',
                'soluong',
                'dongia',
                'tongtien'
            ));

            $dem = $data->count();
            if($dem == 0){

                return view('DatHang.gio-hang')
                ->with('dem', $dem)
                ->with('title', 'Giỏ hàng cá nhân');
            }

            $tong = DB::table('tblhoadon')
            ->where('mand', $nd->mand)
            ->where('trangthai', false)
            ->first();

            return view('DatHang.gio-hang')
            ->with('sanpham', $data)
            ->with('title', 'Giỏ hàng cá nhân')
            ->with('dem', $dem)
            ->with('tong', $tong->tongtien);
        }
        
        return Redirect::to('/dang-nhap');
    }

    public function ThemVaoGio($id)
    {
        
        if(Session::has('user')){
            $nd = Session::get('user');
            $hoadon = DB::table('tblhoadon')
            ->where('mand', $nd->mand)
            ->where('trangthai', false)
            ->first();

            $sanpham = DB::table('tblsanpham')
            ->where('masp', $id)
            ->first();

            if($hoadon != null){
                $cthd = DB::table('tblcthd')
                ->where('mahd', $hoadon->mahd)
                ->where('masp', $id)
                ->first();

                if($cthd != null){
                    DB::table('tblcthd')
                    ->where('mahd', $hoadon->mahd)
                    ->where('masp', $id)
                    ->update([
                        'soluong' => $cthd->soluong + 1
                    ]);

                    DB::table('tblhoadon')
                    ->where('mand', $nd->mand)
                    ->where('trangthai', false)
                    ->update([
                        'tongtien' => $hoadon->tongtien + $sanpham->giaban
                    ]);
                }
                else{
                    $insertCTHD = array();
                    $insertCTHD['mahd'] = $hoadon->mahd;
                    $insertCTHD['masp'] = $id;
                    $insertCTHD['soluong'] = 1;
                    $insertCTHD['dongia'] = $sanpham->giaban;

                    DB::table('tblcthd')->insert($insertCTHD);

                    DB::table('tblhoadon')
                    ->where('mand', $nd->mand)
                    ->where('trangthai', false)
                    ->update([
                        'tongtien' => $hoadon->tongtien + $sanpham->giaban
                    ]);
                }
            }
            else{
                $insertItem = array();
                $insertItem['mand'] = $nd->mand;
                $insertItem['tongtien'] = $sanpham->giaban;
                $insertItem['trangthai'] = false;
                $insertItem['ngayban'] = Carbon::now();

                DB::table('tblhoadon')->insert($insertItem);

                
                $tmphoadon = DB::table('tblhoadon')
                ->where('mand', $nd->mand)
                ->where('trangthai', false)
                ->first();
                $insertCTHD = array();
                $insertCTHD['mahd'] = $tmphoadon->mahd;
                $insertCTHD['masp'] = $id;
                $insertCTHD['soluong'] = 1;
                $insertCTHD['dongia'] = $sanpham->tongtien;

                DB::table('tblcthd')->insert($insertCTHD);
            }

            return Redirect::to('/gio-hang');
        }
        return Redirect::to('/dang-nhap');
    }

    public function CapNhatSoLuong(Request $request)
    {
        $soluong = $request->soluong;
        $masp = $request->masp;
        $nd = Session::get('user');
        $hd = DB::table('tblhoadon')
        ->where('mand', $nd->mand)
        ->where('trangthai', false)
        ->first();

        $sp = DB::table('tblsanpham')
        ->where('masp', $request->masp)
        ->first();

        $slchenhlech = $soluong - DB::table('tblcthd')
        ->where('mahd', $hd->mahd)
        ->where('masp', $masp)
        ->first()->soluong;

        DB::table('tblhoadon')
            ->where('mand', $nd->mand)
            ->where('trangthai', false)
            ->update([
                'tongtien' => $hd->tongtien + ($slchenhlech * $sp->giaban)
            ]);

        DB::table('tblcthd')
        ->where('mahd', $hd->mahd)
        ->where('masp', $masp)
        ->update([
            'soluong' => $soluong
        ]);

        $data = DB::table('tblcthd')
            ->join('tblhoadon', 'tblhoadon.mahd', 'tblcthd.mahd')
            ->where('mand', $nd->mand)
            ->join('tblsanpham', 'tblsanpham.masp', 'tblcthd.masp')
            ->where('tblhoadon.trangthai' , false)
            ->orderByDesc('ngayban')
            ->get(array(
                'tblcthd.masp',
                'madinhdanh',
                'tensp',
                'anhminhhoa',
                'madm',
                'mathuonghieu',
                'soluong',
                'dongia',
                'tongtien'
            ));

            $dem = $data->count();
            if($dem == 0){

                return view('DatHang.gio-hang')
                ->with('dem', $dem)
                ->with('title', 'Giỏ hàng cá nhân');
            }

            $tong = DB::table('tblhoadon')
            ->where('mand', $nd->mand)
            ->where('trangthai', false)
            ->first();

            return view('DatHang.gio-hang-ajax')
            ->with('sanpham', $data)
            ->with('title', 'Giỏ hàng cá nhân')
            ->with('dem', $dem)
            ->with('tong', $tong->tongtien);
    }

    public function XoaSPGioHang(Request $request)
    {
        $masp = $request->masp;
        $nd = Session::get('user');
        $hd = DB::table('tblhoadon')
        ->where('mand', $nd->mand)
        ->where('trangthai', false)
        ->first();

        $sp = DB::table('tblsanpham')
        ->where('masp', $request->masp)
        ->first();

        $cthd = DB::table('tblcthd')
        ->where('mahd', $hd->mahd)
        ->where('masp', $masp)
        ->first();

        DB::table('tblhoadon')
        ->where('mahd', $hd->mahd)
        ->update([
            'tongtien' => $hd->tongtien - ($cthd->soluong * $sp->giaban)
        ]);

        DB::table('tblcthd')
        ->where('mahd', $hd->mahd)
        ->where('masp', $masp)
        ->delete();

        $data = DB::table('tblcthd')
            ->join('tblhoadon', 'tblhoadon.mahd', 'tblcthd.mahd')
            ->where('mand', $nd->mand)
            ->join('tblsanpham', 'tblsanpham.masp', 'tblcthd.masp')
            ->where('tblhoadon.trangthai' , false)
            ->orderByDesc('ngayban')
            ->get(array(
                'tblcthd.masp',
                'madinhdanh',
                'tensp',
                'anhminhhoa',
                'madm',
                'mathuonghieu',
                'soluong',
                'dongia',
                'tongtien'
            ));

            $dem = $data->count();
            if($dem == 0){

                return view('DatHang.gio-hang')
                ->with('dem', $dem)
                ->with('title', 'Giỏ hàng cá nhân');
            }

            $tong = DB::table('tblhoadon')
            ->where('mand', $nd->mand)
            ->where('trangthai', false)
            ->first();

            return view('DatHang.gio-hang-ajax')
            ->with('sanpham', $data)
            ->with('title', 'Giỏ hàng cá nhân')
            ->with('dem', $dem)
            ->with('tong', $tong->tongtien);
    }
}