<?php
    ob_start();
    ob_get_clean();
    ob_clean();
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
<title>Đăng nhập Resale | Login :: w3layouts</title>
<link rel="stylesheet" href="contents/css/bootstrap.min.css">
<link rel="stylesheet" href="contents/css/bootstrap-select.css">
<link href="contents/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resale Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--//fonts-->	
<!-- js -->
<script type="text/javascript" src="contents/js/jquery.min.js"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="contents/js/bootstrap.min.js"></script>
<script src="contents/js/bootstrap-select.js"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
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
<link href="contents/css/jquery.uls.css" rel="stylesheet"/>
<link href="contents/css/jquery.uls.grid.css" rel="stylesheet"/>
<link href="contents/css/jquery.uls.lcd.css" rel="stylesheet"/>
<!-- Source -->
<script src="contents/js/jquery.uls.data.js"></script>
<script src="contents/js/jquery.uls.data.utils.js"></script>
<script src="contents/js/jquery.uls.lcd.js"></script>
<script src="contents/js/jquery.uls.languagefilter.js"></script>
<script src="contents/js/jquery.uls.regionfilter.js"></script>
<script src="contents/js/jquery.uls.core.js"></script>
<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
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
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>Đăng nhập</h1>
						</div>
						<div class="signin">
							<div class="signin-rit">
								<span class="checkbox1">
									 <a href="/resale/quen-mat-khau" class="checkbox"><input type="checkbox" name="checkbox" checked="">Quên mật khẩu ?</a>
								</span>
								<p><a href="/resale">Trở lại trang chủ</a> </p>
								<div class="clearfix"> </div>
							</div>
							<form role="form" method="POST" action="/resale/post-dang-nhap">
							{{csrf_field()}}
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" name="email" class="user" value="Your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email';}"/>
								</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" name="password" class="lock" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
								</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" value="Đăng nhập">
						</form>	 
						</div>
						<div class="new_people">
							<h2>Bạn chưa có tài khoản?</h2>
							<p>Hãy đăng ký tài khoản ngay để đặt hàng và mua hàng trên resale nhé!.</p>
							<a href="/resale/dang-ky">Đăng ký ngay!</a>
						</div>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">&copy 2016 Resale. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
			</footer>
        <!--footer section end-->
	</section>
</body>
</html>