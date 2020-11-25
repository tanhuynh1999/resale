<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký tài khoản Resale | Register :: w3layouts</title>
    <link rel="stylesheet" href="contents/css/bootstrap.min.css">
    <link rel="stylesheet" href="contents/css/bootstrap-select.css">
    <link href="contents/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
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


    <style>
    .sign-up2 input[type="email"] {

        outline: none;
        border: 1px solid #BEBEBE;
        background: none;
        font-size: 15px;
        padding: 10px 10px;
        width: 100%;
        margin: 1em 0;

    }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="/resale"><span>Re</span>sale</a>
            </div>
            <div class="header-right">
            <a class="account" href="/resale/dang-nhap">Đăng nhập</a>

            </div>
        </div>
    </div>
    <section>
        <div id="page-wrapper" class="sign-in-wrapper">
            <div class="graphs">
                <form class="sign-up" role="form" method="POST" action="/resale/post-dang-ky" onkeyup="return ktradangky()">
                {{csrf_field()}}
                    <h1>Tạo tài khoản</h1>
                    <div id="tbao">
                    </div>
                    <h2>Thông tin đăng nhập</h2>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Email Address (*) :</h4>
                        </div>
                        <div class="sign-up2">
                            <div>
                                <input type="email" id="email" placeholder=" " required=" " name="email" />
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Password (*) :</h4>
                        </div>
                        <div class="sign-up2">
                            <div>
                                <input type="password" placeholder=" " required=" " name="matkhau" id="matkhau"/>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Confirm Password (*) :</h4>
                        </div>
                        <div class="sign-up2">
                            <div>
                                <input type="password" placeholder=" " required=" " name="confirmpassword" id="confirmpassword"/>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="sub_home">
                        <input type="submit" value="Create">
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
        </div>
        <!--footer section start-->
        <footer class="diff">
            <p class="text-center">&copy 2016 Resale. All Rights Reserved | Design by <a href="https://w3layouts.com/"
                    target="_blank">w3layouts.</a></p>
        </footer>
        <!--footer section end-->
	</section>

    <script>
        var ktradangky = function(){
            document.getElementById("tbao").innerHTML = "";

            let email = document.getElementById("email").value;
            let pass = document.getElementById("matkhau").value;
            let confirmpass = document.getElementById("confirmpassword").value;
            let re = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

            $.ajax({
                type: 'Get',
                url: '{{URL::to("/kiem-tra-ton-tai")}}',
                data: {
                    email: email
                },
                contentType: 'html',
                success: function(response) {
                    if(response == true){
                        document.getElementById("tbao").innerHTML = '<div class="alert alert-danger"><p>Tài khoản đã tồn tại</p></div>';
                        return;
                    }
                }
            })
            if(!re.test(email)){
                document.getElementById("tbao").innerHTML = '<div class="alert alert-danger"><p>Email không hợp lệ</p></div>';
                return false;
            }
            else if(pass == null || pass == ""){
                document.getElementById("tbao").innerHTML = '<div class="alert alert-danger"><p>Vui lòng nhập mật khẩu!</p></div>';
                return false;
            }
            else if(pass.length < 6){
                document.getElementById("tbao").innerHTML = '<div class="alert alert-danger"><p>Mật khẩu không ít hơn 6 kí tự</p></div>';
                return false;
            }
            else if(confirmpass == null || confirmpass == ""){
                document.getElementById("tbao").innerHTML = '<div class="alert alert-danger"><p>Vui lòng nhập xác nhận mật khẩu!</p></div>';
                return false;
            }
            else if(confirmpass != pass){
                document.getElementById("tbao").innerHTML = '<div class="alert alert-danger"><p>Mật khẩu không trùng khớp!</p></div>';
                return false;
            }
            document.getElementById("tbao").innerHTML = '<div class="alert alert-success"><p>Thông tin đăng ký hợp lệ!</p></div>';
            return true;
        }
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajax-unobtrusive/3.2.6/jquery.unobtrusive-ajax.min.js" integrity="sha512-DedNBWPF0hLGUPNbCYfj8qjlEnNE92Fqn7xd3Sscfu7ipy7Zu33unHdugqRD3c4Vj7/yLv+slqZhMls/4Oc7Zg==" crossorigin="anonymous"></script>
    
</body>

</html>