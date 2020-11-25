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
                <h4 class="card-title">Cập nhật danh mục</h4>
            </div>
            <div class="card-body">
                <form class="row" role="form" action="./post-sua-danh-muc" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="madm" value="{{$danhmuc->madm}}"/>
                    <div class="col-md-6">

                        <div class="form-group">
                            <span class="control-label col-md-2">Danh mục</span>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="danhmuc" value="{{$danhmuc->danhmuc}}" require />
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <span class="control-label col-md-2">Logo</span>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="anhdanhmuc" require value="{{$danhmuc->anhdanhmuc}}" />
                            </div>
                        </div>

                    </div>

                    <div style="margin-left: 68%; padding: 0 30px 0 30px;">
                        <div style=" width: 100%;">
                            <input type="submit" class="btn btn-primary" value="Cập nhật" />
                            <a href="https://fontawesome.com/" target="_blank" class="btn btn-warning">Danh sách logo
                                mẫu</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br />
@endsection