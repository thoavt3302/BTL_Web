<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Shop Điện Thoại Di Động</title>
	<link href=" <?php echo base_url('frontend/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('frontend/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('frontend/css/prettyPhoto.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('frontend/css/price-range.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('frontend/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('frontend/css/main.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('frontend/css/responsive.css') ?>" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
	<header id="header">
		<!--header-->
		<div class="header_top">
			<!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 039887-512</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> huyhoang@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->

		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url('/') ?>"><img width="200px" src=" <?php echo base_url('uploads/brand/logo.jpg')  ?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right">

						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">


								<?php if ($this->session->userdata('LoggedInCustomer')) { ?>
									<li><a href="#"><i class="fa fa-user"></i> Account</a>: <?php echo $this->session->userdata('LoggedInCustomer')['username']   ?></li>
									<li><a href=" <?php echo base_url('checkout') ?>"><i class="fa fa-crosshairs"></i> Checkout</a></li>
									<li><a href=" <?php echo base_url('dang-xuat') ?>"><i class="fa fa-crosshairs"></i> Đăng xuất </a></li>
								<?php  } else { ?>
									<li><a href="<?php echo base_url('dang-nhap') ?>"><i class="fa fa-lock"></i>Đăng nhập</a></li>
								<?php } ?>
								<li><a href=" <?php echo base_url('gio-hang') ?>"><i class="fa fa-shopping-cart"></i>Giỏ Hàng</a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->

		<div class="header-bottom">
			<!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href=" <?php echo base_url('/') ?>" class="active">Nhóm 4</a></li>


								<li><a onclick="return confirm('Bạn thật sự muốn vào mục quản lí của Admin ?')" href=" <?php echo base_url('login')  ?>">Quản Lí Sản Phẩm (Admin!)</a></li>

							</ul>
						</div>
					</div>
					<div class="col-sm-3">
					<form autocomplete="off" method="GET" action=" <?php echo base_url('tim-kiem')  ?>">
						<div class="search_box pull-right">
							<input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..."/>
						</div>
						<!-- <input type="hidden" name="timkiem" value="Tìm Kiếm" hidden class="btn btn-default"> -->
					</form>
					</div>
				</div>
			</div>
		</div>
		<!--/header-bottom-->
	</header>
	<!--/header-->
	<section id="form">
		<!--form-->

		<div class="container">

			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<!--login form-->
						<h2>Đăng nhập vào tài khoản của bạn!!</h2>
						<?php
						if ($this->session->flashdata('success')) {
						?>
							<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?> </div>
						<?php
						} elseif ($this->session->flashdata('error')) {
						?>
							<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?> </div>
						<?php

						}
						?>
						<form action=" <?php echo base_url('login-customer') ?>" method="POST">

							<input type="email" name="email" required placeholder="Email Address" />

							<input type="password" required name="password" placeholder="Password" />

							<button type="submit" class="btn btn-default">Đăng Nhập</button>
						</form>
					</div>
					<!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">
						<!--sign up form-->
						<h2>Đăng kí tài khoản mới !!!</h2>
						<form action=" <?php echo base_url('dang-ky') ?>" method="POST">
							<input type="text" name="name" required placeholder="Name" />

							<input type="email" name="email" required placeholder="Email Address" />

							<input type="password" name="password" required placeholder="Password" />


							<button type="submit" name="submit" class="btn btn-default">Đăng Ký</button>
						</form>
					</div>
					<!--/sign up form-->
				</div>
			</div>
		</div>
	</section>
	<!--/form-->