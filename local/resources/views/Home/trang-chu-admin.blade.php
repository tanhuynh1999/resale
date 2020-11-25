@extends('shared._layoutAdmin')
@section('title')
{{ $title }}
@endsection
@section('content_admin')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-box text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <?php
                                $demsanpham = DB::table('tblsanpham')->get()->count();
                                $demnguoidung = DB::table('tblnguoidung')->get()->count();
                                $demtien = DB::table('tblhoadon')->sum('tongtien');
                                $demhoadon = DB::table('tblhoadon')->get()->count();
                            ?>
                            <p class="card-category">Tổng sản phẩm</p>
                            <p class="card-title">{{$demsanpham}}
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <style>
                    .add_new_item{
                        text-decoration: none !important;
                    }

                    .add_new_item:hover{
                        color: orange !important;
                    }

                    .add_new_item:hover > .nc-simple-add{
                        color: orange !important;
                    }
                </style>
                <a href="#" class="stats add_new_item">
                    <i class="nc-icon nc-simple-add"></i>
                    Thêm sản phẩm mới
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-money-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Tổng thu nhập</p>
                            <p class="card-title">{{$demtien}} vnđ
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <style>
                    .money{
                        text-decoration: none !important;
                    }

                    .money:hover{
                        color: #6bd098 !important;
                    }

                    .money:hover > .fa-calendar-o{
                        color: #6bd098 !important;
                    }
                </style>
                <a href="#" class="stats money">
                    <i class="fa fa-calendar-o"></i>
                    Ngày hôm nay
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-single-02 text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Người dùng</p>
                            <p class="card-title">{{$demnguoidung}}
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <style>
                    .add_user{
                        text-decoration: none !important;
                    }

                    .add_user:hover{
                        color: #ef8157  !important;
                    }

                    .add_user:hover > .fa-refresh{
                        color: #ef8157  !important;
                    }
                </style>
                <a href="#" class="stats add_user">
                    <i class="fa fa-refresh"></i>
                    Cập nhật ngay
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-cart-simple text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Tổng đơn hàng</p>
                            <p class="card-title">+{{$demhoadon}}
                            <p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <style>
                    .add_order{
                        text-decoration: none !important;
                    }

                    .add_order:hover{
                        color: #51cbce !important;
                    }
                    .add_order:hover > .fa-refresh{
                        color: #51cbce !important;
                    }
                </style>
                <a href="#" class="stats add_order">
                    <i class="fa fa-refresh"></i>
                    Cập nhật ngay
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">Users Behavior</h5>
                <p class="card-category">24 Hours performance</p>
            </div>
            <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card ">
            <div class="card-header ">
                <h5 class="card-title">Email Statistics</h5>
                <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-body ">
                <canvas id="chartEmail"></canvas>
            </div>
            <div class="card-footer ">
                <div class="legend">
                    <i class="fa fa-circle text-primary"></i> Opened
                    <i class="fa fa-circle text-warning"></i> Read
                    <i class="fa fa-circle text-danger"></i> Deleted
                    <i class="fa fa-circle text-gray"></i> Unopened
                </div>
                <hr>
                <div class="stats">
                    <i class="fa fa-calendar"></i> Number of emails sent
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-chart">
            <div class="card-header">
                <h5 class="card-title">NASDAQ: AAPL</h5>
                <p class="card-category">Line Chart with Points</p>
            </div>
            <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
            </div>
            <div class="card-footer">
                <div class="chart-legend">
                    <i class="fa fa-circle text-info"></i> Tesla Model S
                    <i class="fa fa-circle text-warning"></i> BMW 5 Series
                </div>
                <hr />
                <div class="card-stats">
                    <i class="fa fa-check"></i> Data information certified
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
