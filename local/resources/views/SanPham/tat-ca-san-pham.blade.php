<?php

use Illuminate\Support\Facades\DB;

?>

@extends('shared._layout')
@section('title')
{{ $title }}
@endsection
@section('content')
<!-- Products -->
<div class="total-ads main-grid-border">
    <div class="container">
        <div class="select-box">
            <form action="./tim-kiem-nang-cao" method="POST">
            {{ csrf_field() }}
                <div class="browse-category ads-list">
                    <label>Duyệt thương hiệu</label>
                    <!-- danh sách thương hiệu -->
                    <select class="selectpicker show-tick" data-live-search="true" name="thuonghieu">
                        @if(!isset($title_thuonghieu) || $title_thuonghieu == '0')
                            <option data-tokens="Mobiles" value="0">All</option>
                        @else
                            <option data-tokens="Mobiles" value="{{$title_thuonghieu->mathuonghieu}}" disabled selected>{{$title_thuonghieu->thuonghieu}}</option>
                            <option data-tokens="Mobiles" value="0">All</option>
                        @endif
                        @include('ThuongHieu.select-thuong-hieu')
                    </select>
                </div>
                <div class="browse-category ads-list">
                    <label>Duyệt danh mục</label>
                    <!-- danh sách danh mục -->
                    <select class="selectpicker show-tick" data-live-search="true" name="danhmuc">
                        @if(!isset($title_danhmuc) || $title_danhmuc == '0')
                            <option data-tokens="Mobiles" value="0">All</option>
                        @else
                            <option data-tokens="Mobiles" value="{{$title_danhmuc->madm}}" disabled selected>{{$title_danhmuc->danhmuc}}</option>
                            <option data-tokens="Mobiles" value="0">All</option>
                        @endif
                        @include('DanhMuc.select-danh-muc')
                    </select>
                </div>
                <div class="search-product ads-list">
                    <label>Tìm kiếm từ khóa theo tên sản phẩm</label>
                    <div class="search">
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg" placeholder="Iphone 12" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-lg" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
        <div class="all-categories">
            <h3> Chọn danh mục mà bạn cần tìm</h3>
            <!-- danh sách danh mục -->
            @include('DanhMuc.partial-view-danh-sach-danh-muc')
        </div>
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="index.html">Home</a></li>
            <li class="active">{{$title}}</li>
        </ol>
        <div class="ads-grid">
            <div class="side-bar col-md-3">
                <div class="search-hotel">
                    <h3 class="sear-head">Tìm kiếm</h3>
                    <form action="./tim-kiem-theo-tu-khoa" method="POST">
                        {{ csrf_field() }}
                        @if(isset($title_key))
                        <input type="text" value="Tên sản phẩm..." onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Tên sản phẩm...';}" required="" name="key" value="{{$title_key}}">
                        @else
                        <input type="text" value="Tên sản phẩm..." onfocus="this.value = '';"
                            onblur="if (this.value == '') {this.value = 'Tên sản phẩm...';}" required="" name="key">
                        @endif
                        <input type="submit" value=" ">
                    </form>
                </div>

                <div class="range">
                    <!---->
                    <script type="text/javascript" src="contents/js/jquery-ui.js"></script>
                    <script type='text/javascript'>
                    //<![CDATA[ 
                    $(window).load(function() {
                        $("#slider-range").slider({
                            range: true,
                            min: 0,
                            max: 9000,
                            values: [50, 6000],
                            slide: function(event, ui) {
                                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                            }
                        });
                        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $(
                            "#slider-range").slider("values", 1));

                    }); //]]>  
                    </script>

                </div>
                <div class="featured-ads">
                    <h2 class="sear-head fer">Thương hiệu</h2>
                    @include('ThuongHieu.partial-view-danh-sach-thuong-hieu')
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="ads-display col-md-9">
                <div class="wrapper">
                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                        <!-- 
                            <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home"
                                    aria-expanded="true">
                                    <span class="text">All Ads</span>
                                </a>
                            </li>
                            <li role="presentation" class="next">
                                <a href="#profile" role="tab" id="profile-tab" data-toggle="tab"
                                    aria-controls="profile">
                                    <span class="text">Ads with Photos</span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#samsa" role="tab" id="samsa-tab" data-toggle="tab" aria-controls="samsa">
                                    <span class="text">Company</span>
                                </a>
                            </li>
                        </ul>
                        -->
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                <div>
                                    <div id="container">
                                        <div class="view-controls-list" style="width: 80%;" id="viewcontrols">
                                            <h4 style="font-style: italic;">{{ $title }}</h4>
                                            <!-- 
                                            <a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
                                            <a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
                                             -->
                                        </div>
                                        <!-- <div class="sort">
                                             <div class="sort-by">
                                                <label>Sort By : </label>
                                                <select>
                                                    <option value="">Most recent</option>
                                                    <option value="">Price: Rs Low to High</option>
                                                    <option value="">Price: Rs High to Low</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="clearfix"></div>
                                        <ul class="list">
                                            @foreach($sanpham as $key => $sp)
                                            <?php
                                                $dm = DB::table('tbldanhmuc')->where('madm', $sp->madm)->get();
                                                foreach($dm as $key => $dm){
                                                    $tendm = $dm->danhmuc;
                                                }

                                                $th = DB::table('tblthuonghieu')->where('mathuonghieu', $sp->mathuonghieu)->get();
                                                foreach($th as $key => $th){
                                                    $tenth = $th->thuonghieu;
                                                }
                                            ?>
                                            <a href="./chi-tiet-san-pham-{{$sp->masp}}">
                                                <li>
                                                    <img src="contents/images/{{$sp->anhminhhoa}}" title=""
                                                        alt="" />
                                                    <section class="list-left">
                                                        <h5 class="title">{{$sp->tensp}} -
                                                            {{$sp->madinhdanh}}
                                                        </h5>
                                                        <span class="adprice">{{$sp->giaban}}</span>
                                                        <p class="catpath">{{$tendm}} >> {{$tenth}}</p>
                                                    </section>
                                                    <section class="list-right">
                                                        <span
                                                            class="date">{{date('d-m-yy', strtotime($sp->ngaytao))}}</span>
                                                        <span class="cityname"></span>
                                                    </section>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </a>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="pagination pagination-sm">
                                {{$sanpham->links()}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- // Products -->
@endsection