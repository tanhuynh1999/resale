<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function Index()
    {
        $dsdanhmuc = DB::table('tbldanhmuc')->get();

        $dsthuonghieu = DB::table('tblthuonghieu')->get();

        return view("Home.trang-chu")
        ->with('danhmuc', $dsdanhmuc)
        ->with('title', 'Trang chủ')
        ->with('thuonghieu', $dsthuonghieu);
    }

    public function AdminIndex()
    {

        return view("Home.trang-chu-admin")
        ->with('title', 'Trang chủ Admin');
    }
}
