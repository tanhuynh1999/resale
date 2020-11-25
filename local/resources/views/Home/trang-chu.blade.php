@extends('shared._layout')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="categories">
    <div class="container">
        @foreach($danhmuc as $key => $danhmuc)
        <div class="col-md-2 focus-grid" style="max-height: 197px;">
            <a href="/resale/tim-kiem-theo-danh-muc-{{$danhmuc->madm}}">
                <div class="focus-border">
                    <div class="focus-layout">
                        <div class="focus-image"><i class="{{$danhmuc->anhdanhmuc}}"></i></div>
                        <h4 class="clrchg">{{$danhmuc->danhmuc}}</h4>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
    <div class="container">
        @foreach($thuonghieu as $key => $thuonghieu)
        <div class="col-md-2 focus-grid" style="max-height: 197px;">
            <a href="/resale/tim-kiem-theo-thuong-hieu-{{$thuonghieu->mathuonghieu}}">
                <div class="focus-border">
                    <div class="focus-layout">
                        <div class="focus-image"><img src="contents/images/{{$thuonghieu->anhthuonghieu}}" style="height: 70px;" /></div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="clearfix"></div>
    </div>
</div>
@endsection
