<?php

use Illuminate\Support\Facades\DB;

?>

@extends('shared._layoutAdmin')
@section('title')
{{ $title }}
@endsection
@section('content_admin')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách sản phẩm</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Mã định danh
                            </th>
                            <th>
                                Ảnh sản phẩm
                            </th>
                            <th>
                                Tên sản phẩm
                            </th>
                            <th>
                                Lượt đánh giá
                            </th>
                            <th>
                                Đã bán
                            </th>
                            <th>
                                Ngày tạo
                            </th>
                            <th class="text-right">
                                Tùy chỉnh
                            </th>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $key => $sp)
                            <tr>
                                <td>
                                    {{$sp->madinhdanh}}
                                </td>
                                <td>
                                    <img src="contents/images/{{$sp->anhminhhoa}}" style="width: 50px; height: 50px"/>
                                </td>
                                <td>
                                    {{$sp->tensp}}
                                </td>
                                <td>
                                    {{$sp->luotdanhgia}}
                                </td>
                                <td>
                                    120
                                </td>
                                <td>
                                    {{date('d-m-yy', strtotime($sp->ngaytao))}}
                                </td>
                                <td class="text-right">
                                    <a href="#" data-toggle="modal" data-target="#xemsp{{$sp->madinhdanh}}"><i
                                            class="fa fa-cogs"></i></a>
                                </td>
                            </tr>

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
                            <div class="modal fade bd-example-modal-lg" id="xemsp{{$sp->madinhdanh}}" tabindex="-1"
                                role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sản phẩm: {{$sp->tensp}} -
                                                {{$sp->giaban}} VNĐ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="contents/images/{{$sp->anhminhhoa}}"
                                                        style="width: 100%; height: 300px;" />
                                                    <hr />
                                                    <div>
                                                        <span><i class="fa fa-list-alt">&nbsp;</i>Danh mục:
                                                            {{$tendm}}</span><br />
                                                        <span><i class="fa fa-tags">&nbsp;</i>Thương hiệu:
                                                            {{$tenth}}</span><br />
                                                        <span><i class="fa fa-eye">&nbsp;</i>Lượt xem:
                                                            {{$sp->luotxem}}</span><br />
                                                        <span><i class="fa fa-hashtag">&nbsp;</i>Trung bình đánh giá:
                                                            {{$sp->tbdanhgia}}</span><br />
                                                        <span><i class="fa fa-credit-card">&nbsp;</i>Khuyên mãi:
                                                            {{$sp->khuyenmai}}</span><br />
                                                    </div>
                                                </div>

                                                <div class="col-md-8" style="padding-top: 20px;">
                                                    <h3 style="margin-bottom: 10px;">Mô tả: </h3>
                                                    <p style="overflow: auto; max-height: 300px;">{!! $sp->mota !!} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="./sua-san-pham-{{$sp->masp}}" class="btn btn-success"><i
                                                    class="fa fa-edit"></i> Cập nhât sản phẩm</a>
                                            <a href="#" data-toggle="modal" data-target="#xoasp{{$sp->masp}}" class="btn btn-danger"><i
                                                    class="fa fa-trash"></i>
                                                Xóa sản phẩm</a>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- xac nhan xoa san pham -->
                            <!-- Modal -->
                            <div class="modal fade" id="xoasp{{$sp->masp}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn chắc chắn muốn xóa sản phẩm này ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                            <form method="POST" action="./xoa-san-pham-{{$sp->masp}}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Xác nhận</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <div style="float: left;">
                <a href="./them-san-pham" class="btn btn-warning"><i class="fa fa-plus"
                        style="font-weight: 900px !important;font-size: 15px;">&nbsp;</i>Thêm sản phẩm</a>
                <a href="./trang-chu-admin  " class="btn btn-warning"><i class="fa fa-home"
                        style="font-weight: 900px !important;font-size: 15px;">&nbsp;</i>Trang chủ</a>
            </div>
            <div class="pagination" style="float: right;">
                {{$sanpham->links()}}
            </div>
        </div>
    </div>
</div>
<br />
@endsection
