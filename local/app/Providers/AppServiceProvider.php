<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        return view()->composer(['Home.san-pham-moi-nhat', 'DanhMuc.partial-view-danh-sach-danh-muc', 'DanhMuc.select-danh-muc', 'ThuongHieu.select-thuong-hieu', 'ThuongHieu.partial-view-danh-sach-thuong-hieu'], function($view){
            $data = DB::table('tblsanpham')
            ->orderByDesc('ngaytao')
            ->limit(12)
            ->get()
            ->chunk(4)
            ->toArray();
            $spmoinhat0 = $data[0];
            $spmoinhat1 = $data[1];
            $spmoinhat2 = $data[2];
            $view
            ->with("spmoinhat0", $spmoinhat0)
            ->with("spmoinhat1", $spmoinhat1)
            ->with("spmoinhat2", $spmoinhat2);

            $datadanhmuc = DB::table('tbldanhmuc')->get();
            $view
            ->with("danhmuc", $datadanhmuc);

            $view
            ->with("danhmuc", $datadanhmuc);

            $datathuonghieu = DB::table('tblthuonghieu')->get();
            $view
            ->with("thuonghieu", $datathuonghieu);
            
            $view
            ->with("thuonghieu", $datathuonghieu);

        });

    }
}
