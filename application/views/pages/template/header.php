<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 039887-512</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>  huyhoang@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>						
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo base_url('/') ?>"><img  width="200px" src=" <?php echo base_url('uploads/brand/logo.jpg')  ?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
						
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								
								 <?php if($this->session->userdata('LoggedInCustomer')) {?>
									<li><a href="#"><i class="fa fa-user"></i> <?php echo $this->session->userdata('LoggedInCustomer')['name']   ?> </a> </li>
								<li><a href=" <?php echo base_url('checkout') ?>"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a onclick="return confirm('Bạn thật sự muốn đăng xuất?')" href=" <?php echo base_url('dang-xuat') ?>"><i class="fa fa-crosshairs"></i> Đăng xuất </a></li>
								 <?php  }else {?>
									<li><a href="<?php echo base_url('dang-nhap') ?>"><i class="fa fa-lock"></i>Đăng Nhập</a></li>
									 <?php } ?>
								<li><a href=" <?php echo base_url('gio-hang') ?>"><i class="fa fa-shopping-cart"></i>Giỏ Hàng</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
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
								<li class="dropdown"><a href="#">Danh Mục<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                    <?php  foreach($category as $key => $cate){ ?>
                                        <li><a href="<?php echo base_url('danh-muc/'.$cate->id)  ?>"> <?php echo $cate->title ?></a></li>
										 <?php } ?>
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Thương Hiệu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
									<?php  foreach($brand as $key => $bra){ ?>
                                        <li><a href="<?php echo base_url('thuong-hieu/'.$bra->id)  ?>"> <?php echo $bra->title ?></a></li>
										 <?php } ?>
                                    </ul>
                                </li> 
								<li><a onclick="return confirm('Bạn thật sự muốn vào mục quản lí của Admin?')" href=" <?php echo base_url('login')  ?>">Quản Lí Sản Phẩm (Admin!)</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
					<form autocomplete="off" method="GET" action=" <?php echo base_url('tim-kiem')  ?>">
						<div class="search_box pull-right">
							<input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..."/>
						</div>
						<!-- <input type="hidden" name="timkiem" value="Tìm Kiếm" hidden class="btn btn-default"> -->
					</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->