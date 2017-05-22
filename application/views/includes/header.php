<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no"><!--[if IE]>
    <link rel="shortcut icon" href="path/to/favicon.ico"/>
    <![endif]-->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Shop mini</title>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" media="screen">
  </head>
  <body class="">
    <div class="wrapper">
      <div id="main">
        <div class="banner"></div>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Trang Chủ</a></li>
                <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Sản Phẩm <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php 
                      foreach($danhmuc as $row) {
                    ?>
                    <li><a href="<?php echo site_url('sanpham/catalog').'/'.$row['slug'] ?>"><?php echo $row['Name']; ?></a></li>
                    <?php
                     }
                    ?>
                    <!-- <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li> -->
                  </ul>
                </li>
                <li><a href="#contact">Khuyến Mãi</a></li>
                <li><a href="#contact">Hướng Dẫn Mua Hàng</a></li>
                <li><a href="#contact">Đơn Hàng</a></li>
                <li><a href="#contact">Liên Hệ</a></li>
              </ul>
              <div class="nav navbar-nav navbar-right">
                <div class="icon-cart"><img src="../images/empty-cart-light.png"></div>
              </div>
            </div>
            <!-- /.nav-collapse-->
          </div>
        </nav>