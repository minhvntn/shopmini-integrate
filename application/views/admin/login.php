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
  <body class="admin">
    <div class="wrapper">
      <div id="main">
        <div class="login-page">
          <div class="form login-block">Shop Mini
            <!-- <form class="register-form" action="admin/login/validate_credentials" method="post">
              <input type="text" placeholder="name", name="username">
              <input type="password" placeholder="password">
              <input type="text" placeholder="email address">
              <button>create</button>
              <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form> -->
            <form class="login-form" action="<?php echo site_url('admin/login/validate_credentials') ?>" method="post">
              <input type="text" placeholder="Tên truy cập" name="username">
              <input type="password" placeholder="Mật khẩu" name="password">
              <button type="submit">login</button>
              <?php
              if(isset($message_error) && $message_error){
                  echo '<div class="alert alert-error">';
                    // echo '<a class="close" data-dismiss="alert">×</a>';
                    echo 'Tên truy cập hoặc mật khẩu không đúng! vui lòng thử lại';
                  echo '</div>'; 
                }
              ?>
              <!-- <p class="message hide">Not registered? <a href="#">Create an account</a></p> -->
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/libs/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/libs/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/libs/plugins.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  </body>
</html>