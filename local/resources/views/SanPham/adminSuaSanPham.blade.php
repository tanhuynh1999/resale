<?php

use Illuminate\Support\Facades\DB;

?>

<?php
    $tendm = DB::table('tbldanhmuc')
    ->where('madm', $sanpham->madm)
    ->limit(1)
    ->first();

    $tenth = DB::table('tblthuonghieu')
    ->where('mathuonghieu', $sanpham->mathuonghieu)
    ->limit(1)
    ->first();
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
                <h4 class="card-title">Thêm mới sản phẩm</h4>
            </div>
            <div class="card-body">
                <form class="row" role="form" action="./post-sua-san-pham" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$sanpham->masp}}" name="masp" />
                    <div class="col-md-6">

                        <div class="form-group">
                            <span class="control-label col-md-2">Hình ảnh</span>
                            <div class="col-md-10">
                                <img src="contents/images/{{$sanpham->anhminhhoa}}" style="height: 400px;" />
                                <style>
                                .visuallyhidden {
                                    border: 0;
                                    clip: rect(0 0 0 0);
                                    height: 1px;
                                    margin: -1px;
                                    overflow: hidden;
                                    padding: 0;
                                    position: absolute;
                                    width: 1px;
                                }
                                </style>
                                <input type="file" name="fileimg" id="file-input" class="visuallyhidden" />
                                <button class="file-upload" class="btn btn-default"><i class="fa fa-image">&nbsp;</i>Tải
                                    ảnh lên</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Mã định danh</span>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="madinhdanh" id="madd"
                                    value="{{$sanpham->madinhdanh}}" require />
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Tên sản phẩm</span>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="tensp" id="tensp"
                                    value="{{$sanpham->tensp}}" require />
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <span class="control-label col-md-2">Giá bán</span>
                            <div class="col-md-10">
                                <input type="number" class="form-control" value="{{$sanpham->giaban}}" name="giaban"
                                    id="giaban" require />
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Khuyến mãi</span>
                            <div class="col-md-10">
                                <input type="number" class="form-control" value="{{$sanpham->khuyenmai}}"
                                    name="khuyenmai" id="khuyenmai" require />
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Danh mục</span>
                            <div class="col-md-10">
                                <select class="form-control" name="madanhmuc">
                                    <option value="{{$sanpham->madm}}" disabled selected>{{$tendm->danhmuc}}</option>
                                    @include('DanhMuc.select-danh-muc')
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Thương hiệu</span>
                            <div class="col-md-10">
                                <select class="form-control" name="mathuonghieu">
                                    <option value="{{$sanpham->mathuonghieu}}" disabled selected>{{$tenth->thuonghieu}}</option>
                                    @include('ThuongHieu.select-thuong-hieu')
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Mô tả</span>
                            <div class="col-md-10">
                                <textarea name="mota" id="">{{$sanpham->mota}}</textarea>
                            </div>
                        </div>

                    </div>

                    <div style="margin-left: 75%;">
                        <input type="submit" class="btn btn-danger" value="Cập nhật" style="width: 200%;" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br />
@endsection