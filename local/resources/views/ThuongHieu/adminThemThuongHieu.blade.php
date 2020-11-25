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
                <h4 class="card-title">Thêm mới thương hiệu</h4>
            </div>
            <div class="card-body">
                <form class="row" role="form" action="./post-them-thuong-hieu  " method="POST"
                    enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-md-6">

                        <div class="form-group">
                            <span class="control-label col-md-2">Thương hiệu</span>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="thuonghieu" require />
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <span class="control-label col-md-2">Logo thương hiệu</span>
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
                                <button class="file-upload" class="btn btn-default"><i class="fa fa-image">&nbsp;</i>Tải
                                    ảnh lên</button>
                            </div>
                        </div>

                    </div>

                    <div style="margin-left: 68%; padding: 0 30px 0 30px;">
                        <div style=" width: 100%;">
                            <input type="submit" class="btn btn-danger" value="Thêm mới" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br />
@endsection