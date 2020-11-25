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
                <h4 class="card-title">Thêm mới sản phẩm</h4>
            </div>
            <div class="card-body">
                <form class="row" role="form" action="./post-them-san-pham" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="col-md-6">

                        <div class="form-group">
                            <span class="control-label col-md-2">Mã định danh</span>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="madinhdanh" id="madd" require />
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Tên sản phẩm</span>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="tensp" id="tensp" require />
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Giá bán</span>
                            <div class="col-md-10">
                                <input type="number" class="form-control" value="0" name="giaban" id="giaban" require />
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Khuyến mãi</span>
                            <div class="col-md-10">
                                <input type="number" class="form-control" value="0" name="khuyenmai" id="khuyenmai" require />
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Danh mục</span>
                            <div class="col-md-10">
                                <select class="form-control" name="madanhmuc">
                                    @include('DanhMuc.select-danh-muc')
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Thương hiệu</span>
                            <div class="col-md-10">
                                <select class="form-control" name="mathuonghieu">
                                    @include('ThuongHieu.select-thuong-hieu')
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <span class="control-label col-md-2">Hình ảnh</span>
                            <div class="col-md-10">
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
                                <button class="file-upload" class="btn btn-default"><i class="fa fa-image">&nbsp;</i>Tải ảnh lên</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-2">Mô tả</span>
                            <div class="col-md-10">
                                <textarea name="mota" mota id=""></textarea>
                            </div>
                        </div>

                    </div>

                    <div style="margin-left: 75%;">
                        <input type="submit" class="btn btn-danger" value="Thêm mới" style="width: 200%;" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br />
@endsection