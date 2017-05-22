<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		span{color: blue; font-style: italic;}
	</style>
	<meta charset="utf-8">
	<title>Title | Hướng dẫn tạo form login trên CodeIgniter</title>
</head>
<body>
	<div id="body">
		<h2>Hướng dẫn tạo form login trên CodeIgniter | Đăng nhập thành công</h2>
		<h3>Xin chào <span><?php echo $user['username'];?></span></h3>
		<p>
			<a href="<?php echo base_url();?>authentication/logout">Logout</a>
		</p>
	</div>
</body>
</html>