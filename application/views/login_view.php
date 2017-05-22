<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wrapper">
      <div id="main">
        <div class="login-page">
          <div class="form login-block">
            <!-- <form class="register-form">
              <input type="text" placeholder="name">
              <input type="password" placeholder="password">
              <input type="text" placeholder="email address">
              <button>create</button>
              <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form> -->
            <?php 
              if (validation_errors()) {
            ?>
            <div class="">Alert</div>
            <strong><?php echo validation_errors(); ?></strong>
            <?php
              }
            ?>
            <form  action="<?php echo site_url('login') ?>" class="login-form" method="post">
              <input type="text" name="username" placeholder="username">
              <input type="password" name="password" placeholder="password">
              <button>login</button>
              <p class="message hide">Not registered? <a href="#">Create an account</a></p>
            </form>
            <a href="<?php echo site_url('login')?>" class="btn btn-link"> sins</a>
          </div>
        </div>
      </div>
    </div>

  
  </body>
</html>