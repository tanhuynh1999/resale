<?php

use Illuminate\Support\Facades\DB;
?>
@extends('shared._layout')
@section('title')
{{ $title }}
@endsection
@section('content')
<!--single-page-->
<div class="single-page main-grid-border">
    <div class="container">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="index.html">Home</a></li>
            <?php
                $tendm = DB::table('tbldanhmuc')
                ->where('madm', $sanpham->madm)
                ->first();

                $tenth = DB::table('tblthuonghieu')
                ->where('mathuonghieu', $sanpham->mathuonghieu)
                ->first();
            ?>
            <li class="active"><a href="./tim-kiem-theo-danh-muc-{{$sanpham->madm}}">{{$tendm->danhmuc}}</a></li>
            <li class="active">{{$sanpham->tensp}}</li>
        </ol>
        <div class="product-desc">
            <div class="col-md-7 product-view">
                <div class="row">
                    <div class="col-md-4">
                      <img src="contents/images/{{$sanpham->anhminhhoa}}" class="w-100" style="height: 200px"/>
                    </div>
                    <div class="col-md-8">
                      <h2>{{$sanpham->tensp}}</h2>
                      <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">city</a>| Ngày đăng
                          bán
                          {{date('d-m-yy', strtotime($sanpham->ngaytao))}}, Mã định danh: {{$sanpham->madinhdanh}}</p>
                          <div class="flexslider">
                              <ul class="slides">
                                  <li data-thumb="contents/images/ss1.jpg">
                                      <img src="contents/images/ss1.jpg" />
                                  </li>
                                  <li data-thumb="contents/images/ss2.jpg">
                                      <img src="contents/images/ss2.jpg" />
                                  </li>
                                  <li data-thumb="contents/images/ss3.jpg">
                                      <img src="contents/images/ss3.jpg" />
                                  </li>
                              </ul>
                        </div>
                        <a href="them-vao-gio-{{$sanpham->masp}}" class="btn btn-danger"><i class="fa fa-shopping-cart">&nbsp;</i>Thêm vào giỏ</a>
                        <br /><br />
                        <h4>Nhãn hiệu : <a href="./tim-kiem-theo-thuong-hieu-{{$tenth->mathuonghieu}}">{{$tenth->thuonghieu}}</a></h4>
                        <h4>Lượt xem : <strong>{{$sanpham->luotxem}}</strong></h4>
                        <p><strong>Mô tả </strong>: </p>
                        <div>
                            {!! $sanpham->mota !!}
                        </div>
                      </div>
                </div>
                <!-- FlexSlider -->
                <script defer src="contents/js/jquery.flexslider.js"></script>
                <link rel="stylesheet" href="contents/css/flexslider.css" type="text/css" media="screen" />

                <script>
                // Can also be used with $(document).ready()
                $(window).load(function() {
                    $('.flexslider').flexslider({
                        animation: "slide",
                        controlNav: "thumbnails"
                    });
                });
                </script>
                <!-- //FlexSlider -->
                <br /><br /><br />
                <div class="product-details">
                    <div class="ui threaded comments"  style="font-size: 15px">
                        <h3 class="ui dividing header">Có 0 bình luận về sản phẩm này</h3>
                        <?php
                            $bll = DB::table('tblbinhluan')->where('masp',$sanpham->masp)->join('tblnguoidung','tblbinhluan.mand','tblnguoidung.mand')->get();
                        ?>
                        <?php foreach ($bll as $key => $bll): ?>
                              <div class="comment">
                                <a class="avatar">
                                  <img src="https://semantic-ui.com/images/avatar/small/elliot.jpg">
                                </a>
                                <div class="content">
                                  <a class="author">{{$bll->email}}</a>
                                  <div class="metadata">
                                    <span class="date">{{$bll->ngaybl}}</span>
                                  </div>
                                  <div class="text">
                                    <p>{{$bll->nd}}</p>
                                  </div>
                                  <div class="actions">
                                    <a class="reply" data-toggle="collapse" href="#collapseExample{{$bll->mabl}}" role="button" aria-expanded="false" aria-controls="collapseExample">Trả lời</a>
                                  </div>
                                </div>
                                <div class="collapse" id="collapseExample{{$bll->mabl}}">
                                  <div class="comments">
                                    <form class="ui reply form" method="post" action="/resale/tra-loi-binh-luan-{{$sanpham->masp}}-{{$bll->mabl}}">
                                      {{csrf_field()}}
                                      <div class="field">
                                        <textarea placeholder="Nhap noi dung" name="nd"></textarea>
                                      </div>
                                      <button class="ui red button"><i class="icon edit"></i> Trả lời bình luận</button>
                                    </form>
                                    <?php
                                        $tl = DB::table('tbltraloibinhluan')->where('mabl',$bll->mabl)->join('tblnguoidung','tbltraloibinhluan.mand','tblnguoidung.mand')->get();
                                     ?>
                                     <?php foreach ($tl as $key => $tl): ?>
                                       <div class="comment">
                                         <br />
                                         <a class="avatar">
                                           <img src="https://semantic-ui.com/images/avatar/small/elliot.jpg">
                                         </a>
                                         <div class="content">
                                           <a class="author">{{$tl->email}}</a>
                                           <div class="metadata">
                                             <span class="date">{{$tl->ngayrl}}</span>
                                           </div>
                                           <div class="text">
                                             {{$tl->nd}}
                                           </div>
                                         </div>
                                       </div>
                                     <?php endforeach; ?>
                                  </div>
                                </div>

                              </div>
                        <?php endforeach; ?>
                        <br />
                        <form class="ui reply form" method="post" action="/resale/binh-luan-{{$sanpham->masp}}">
                          {{csrf_field()}}
                          <div class="field">
                            <textarea placeholder="Nhap noi dung" name="nd"></textarea>
                          </div>
                          <button class="ui red button"><i class="icon edit"></i> Bình luận</button>
                        </form>
                      </div>
                </div>
            </div>
            <div class="col-md-5 product-details-grid">
                <div class="item-price">
                    <div class="product-price">
                        <p class="p-price">Giá bán</p>
                        <h3 class="rate">{{$sanpham->giaban}}</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="condition">
                        <p class="p-price">Đánh giá</p>
                        <h4>{{$sanpham->tbdanhgia}} / 5</h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="itemtype">
                        <p class="p-price">Danh mục</p>
                        <h4>{{$tendm->danhmuc}}</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- <div class="interested text-center">
                    <h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
                    <p><i class="glyphicon glyphicon-earphone"></i>00-85-9875462655</p>
                </div> -->
                <?php
                    $dsspcungdanhmuc = DB::table('tblsanpham')
                    ->where('madm', $tendm->madm)
                    ->orderByDesc('ngaytao')
                    ->limit(7)
                    ->get();
                ?>
                <div class="tips">
                    <h4>Sản phẩm cùng danh mục</h4>
                    <ul style="list-style-type: none;">
                        @foreach($dsspcungdanhmuc as $key => $sp)
                        <li style="padding-bottom: 10px;">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="contents/images/{{$sp->anhminhhoa}}"
                                        style="height: 50px; width: 100%;" />
                                </div>
                                <div class="col-md-9">
                                    <span>{{$sp->tensp}}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//single-page-->
@endsection
