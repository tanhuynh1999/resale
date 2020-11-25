<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | Resale :: w3layouts</title>

    <script src="Semantic-UI-CSS-master/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="Semantic-UI-CSS-master/semantic.min.css" />
    <script src="Semantic-UI-CSS-master/semantic.min.js"></script>


    <link rel="stylesheet" href="contents/css/bootstrap.min.css">
    <link rel="stylesheet" href="contents/css/bootstrap-select.css">
    <link href="contents/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="contents/css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="contents/css/notification.css" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //for-mobile-apps -->
    <!--fonts-->
    <link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <!-- js -->
    <script type="text/javascript" src="contents/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <!-- js -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="contents/js/bootstrap.min.js"></script>
    <script src="contents/js/bootstrap-select.js"></script>
    <script>
    $(document).ready(function() {
        var mySelect = $('#first-disabled2');

        $('#special').on('click', function() {
            mySelect.find('option:selected').prop('disabled', true);
            mySelect.selectpicker('refresh');
        });

        $('#special2').on('click', function() {
            mySelect.find('option:disabled').prop('disabled', false);
            mySelect.selectpicker('refresh');
        });

        $('#basic2').selectpicker({
            liveSearch: true,
            maxOptions: 1
        });
    });
    </script>
    <script type="text/javascript" src="contents/js/jquery.leanModal.min.js"></script>
    <link href="contents/css/jquery.uls.css" rel="stylesheet" />
    <link href="contents/css/jquery.uls.grid.css" rel="stylesheet" />
    <link href="contents/css/jquery.uls.lcd.css" rel="stylesheet" />
    <!-- Source -->
    <script src="contents/js/jquery.uls.data.js"></script>
    <script src="contents/js/jquery.uls.data.utils.js"></script>
    <script src="contents/js/jquery.uls.lcd.js"></script>
    <script src="contents/js/jquery.uls.languagefilter.js"></script>
    <script src="contents/js/jquery.uls.regionfilter.js"></script>
    <script src="contents/js/jquery.uls.core.js"></script>
    <script>
    $(document).ready(function() {
        $('.uls-trigger').uls({
            onSelect: function(language) {
                var languageName = $.uls.data.getAutonym(language);
                $('.uls-trigger').text(languageName);
            },
            quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
        });
    });
    </script>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="/resale"><span>Re</span>sale</a>
            </div>
            <div class="header-right">
                <?php
                    if(Session::has('user')){
                        $nd = Session::get('user');

                        $demhoadon = DB::table('tblhoadon')
                        ->where('mand', $nd->mand)
                        ->where('trangthai', false)
                        ->first();

                        $demsp = 0;
                        if($demhoadon != null){
                          $demsp = DB::table('tblcthd')
                          ->where('mahd', $demhoadon->mahd)
                          ->count();
                        }
                        echo '<a class="account" style="color: black; background: none" href="#">'.'Xin chào, '.$nd->email.'</a>';
                        echo '<a class="account" style="color: blue; background: none" href="/resale/dang-xuat">'.'Đăng xuất'.'</a>';
                        echo '<a href="./gio-hang" class="account" style="background: none; color: black; font-size: 27px;margin-top: 10px;"><i class="fas fa-shopping-cart"></i>(' . $demsp . ')</a>';
                    }
                    else{
                        echo '<a class="account" href="/resale/dang-xuat">Đăng nhập</a>';
                        echo '<a href="./dang-nhap" class="account" style="background: none; color: black; font-size: 27px;margin-top: 10px;"><i class="fas fa-shopping-cart"></i></a>';
                    }
                ?>
            </div>
        </div>
    </div>
    <div
        class="<?php if(url()->current() == 'http://localhost:8080/resale'){ echo 'main-banner';} ?> banner text-center">
        <div class="container">
            <h1>Mua hàng giá rẻ và chất lượng <span class="segment-heading"> tại nhà </span> với Resale</h1>
            <p>Chất lượng cho bạn, uy tín cho chúng tôi</p>
            <a href="/resale/tat-ca-san-pham">Tất cả sản phẩm</a>
        </div>
    </div>
    <!-- content-starts-here -->
    <div class="content">
        @yield('content')
        @if(class_basename(Route::currentRouteAction()) != 'SanPhamController@ChiTietSanPham')
        <div class="trending-ads">
            <div class="container">

                <!-- slider -->
                @include('Home.san-pham-moi-nhat')
            </div>
            <!-- //slider -->
        </div>
        @endif
        <div class="mobile-app">
            <div class="container">
                <div class="col-md-5 app-left">
                    <a href="mobileapp.html"><img src="contents/images/app.png" alt=""></a>
                </div>
                <div class="col-md-7 app-right">
                    <h3>Resale App is the <span>Easiest</span> way for Selling and buying second-hand goods</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam auctor Sed bibendum varius
                        euismod. Integer eget turpis sit amet lorem rutrum ullamcorper sed sed dui. vestibulum odio at
                        elementum. Suspendisse et condimentum nibh.</p>
                    <div class="app-buttons">
                        <div class="app-button">
                            <a href="#"><img src="contents/images/1.png" alt=""></a>
                        </div>
                        <div class="app-button">
                            <a href="#"><img src="contents/images/2.png" alt=""></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--footer section start-->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="foo-grids">
                    <div class="col-md-3 footer-grid">
                        <h4 class="footer-head">Who We Are</h4>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout.</p>
                        <p>The point of using Lorem Ipsum is that it has a more-or-less normal letters, as opposed to
                            using 'Content here.</p>
                    </div>
                    <div class="col-md-3 footer-grid">
                        <h4 class="footer-head">Help</h4>
                        <ul>
                            <li><a href="howitworks.html">How it Works</a></li>
                            <li><a href="sitemap.html">Sitemap</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="feedback.html">Feedback</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="typography.html">Shortcodes</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 footer-grid">
                        <h4 class="footer-head">Information</h4>
                        <ul>
                            <li><a href="regions.html">Locations Map</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                            <li><a href="popular-search.html">Popular searches</a></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 footer-grid">
                        <h4 class="footer-head">Contact Us</h4>
                        <span class="hq">Our headquarters</span>
                        <address>
                            <ul class="location">
                                <li><span class="glyphicon glyphicon-map-marker"></span></li>
                                <li>CENTER FOR FINANCIAL ASSISTANCE TO DEPOSED NIGERIAN ROYALTY</li>
                                <div class="clearfix"></div>
                            </ul>
                            <ul class="location">
                                <li><span class="glyphicon glyphicon-earphone"></span></li>
                                <li>+0 561 111 235</li>
                                <div class="clearfix"></div>
                            </ul>
                            <ul class="location">
                                <li><span class="glyphicon glyphicon-envelope"></span></li>
                                <li><a href="mailto:info@example.com">mail@example.com</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </address>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                <div class="footer-logo">
                    <a href="index.php"><span>Re</span>sale</a>
                </div>
                <div class="footer-social-icons">
                    <ul>
                        <li><a class="facebook" href="#"><span>Facebook</span></a></li>
                        <li><a class="twitter" href="#"><span>Twitter</span></a></li>
                        <li><a class="flickr" href="#"><span>Flickr</span></a></li>
                        <li><a class="googleplus" href="#"><span>Google+</span></a></li>
                        <li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
                    </ul>
                </div>
                <div class="copyrights">
                    <p> © 2016 Resale. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </footer>
    <!--footer section end-->
    <!-- thong bao -->

    <!-- The actual snackbar -->
    <div id="snackbar">Some text some message..</div>
    <script>
    //tb
    function myFunction(tbao) {
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");
        x.innerHTML = tbao;

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
    </script>
</body>

</html>
