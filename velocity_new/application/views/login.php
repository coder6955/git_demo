<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap material admin template">
  <meta name="author" content="">

  <title>Login | Velocity Global Logistics</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favi.png">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/site.min.css">
  
  <!-- Page -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.min09a2.css?v2.1.0">


  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,700'>

  <script src="<?php echo base_url(); ?>assets/js2/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
  
<style>
.site-skintools { display: none;}
</style>
	
</head>
<body class="page-login layout-full page-dark">

  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <div class="brand">
    <img class="brand-img" src="<?php echo base_url(); ?>assets/images/logo.png" alt="" style="width:200px"> 
	   <!-- 	 <img class="brand-img" src="<?php echo base_url(); ?>assets/images/logo.jpg" alt="">-->
      </div>
      <!---->
      <br>
	  
      <form method="post" action="<?php echo site_url('login/user_login'); ?>" class="form">
      <h2 class="brand-text">LOGIN FORM</h2>
		<?php  if($check == 1){?>
			<center><h5 style="color:#dc214e;font-weight:600">Invalid Username or Password</h5></center>
		<?php }?>
        <div class="form-group form-material floating">
          <input type="text" class="form-control empty" id="name" name="username" placeholder="User Name">
          <label class="floating-label" for="inputName"></label>
        </div>
       
        <div class="form-group form-material floating">
          <input type="password" class="form-control empty" id="password1" name="pass" placeholder="Password">
          <label class="floating-label" for="inputPassword"></label>
        </div>
        <div class="form-group clearfix">
          <!--<div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
            <input type="checkbox" id="inputCheckbox" name="remember">
            <label for="inputCheckbox">Remember me</label>
          </div>-->
          <p id="msg" style="color:#F00;"></p>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        <!--
        <div class="form-group clearfix">
          <a class="pull-right" href="<?php echo site_url('login/forgot_password'); ?>">Forgot password?</a>
        </div>
        -->
      </div>
      
      <!--<p>Still no account? Please go to <a href="register.html">Register</a></p>-->

      <footer class="page-copyright page-copyright-inverse">
      
 
        <div class="social">
          <a href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-dribbble" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
  <!-- End Page -->
<script src="<?php echo base_url(); ?>assets/js2/jquery/jquery.min.js"></script>


</body>
</html>