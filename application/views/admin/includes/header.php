<!DOCTYPE html> 
<html lang="en-US" class="no-js">
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
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">Project Name</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'danhmuc'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/danhmuc">Danh mục</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'sanpham'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>admin/sanpham">Sản phẩm</a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
