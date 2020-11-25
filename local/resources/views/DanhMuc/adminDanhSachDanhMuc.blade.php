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
                <h4 class="card-title">Danh sách danh mục</h4>
            </div>
            <div class="card-body">
                <div class="">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Logo danh mục
                            </th>
                            <th>
                                Tên danh mục
                            </th>
                            <th class="text-right">
                                Tùy chỉnh
                            </th>
                        </thead>
                        <tbody>
                            @foreach($danhmuc as $key => $dm)
                            <tr>
                                <td>
                                    <div style="min-width: 50px; min-height: 50px;">
                                        <i class="{{$dm->anhdanhmuc}}" style="font-size: 50px;"></i>
                                    </div>
                                </td>
                                <td>
                                    {{$dm->danhmuc}}
                                </td>
                                <td class="text-right">
                                    <a href="./sua-danh-muc-{{$dm->madm}}"><i class="fa fa-edit"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#xoadm{{$dm->madm}}"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>



                            <!-- xac nhan xoa san pham -->
                            <div class="modal fade" id="xoadm{{$dm->madm}}" tabindex="-1" role="dialog"
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
                                            Bạn chắc chắn muốn xóa danh mục này ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Đóng</button>
                                            <form method="POST" action="./xoa-danh-muc-{{$dm->madm}}">
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
                <a href="./them-danh-muc" class="btn btn-warning"><i class="fa fa-plus"
                        style="font-weight: 900px !important;font-size: 15px;">&nbsp;</i>Thêm danh mục</a>
                <a href="./trang-chu-admin  " class="btn btn-warning"><i class="fa fa-home"
                        style="font-weight: 900px !important;font-size: 15px;">&nbsp;</i>Trang chủ</a>
                <a href="https://fontawesome.com/" target="_blank" class="btn btn-warning">Danh sách logo mẫu</a>
            </div>
            <div class="pagination" style="float: right;">
                {{$danhmuc->links()}}
            </div>
        </div>
    </div>
</div>
<br />
@endsection