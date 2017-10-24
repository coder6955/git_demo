<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Velocity Global Logistics</title>

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/logo.jpg">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/site.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/skintools.min.css">
  <script src="<?php echo base_url(); ?>assets/js/sections/skintools.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js2/animsition/animsition.min09a2.css?v2.1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js2/asscrollable/asScrollable.min09a2.css?v2.1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js2/slidepanel/slidePanel.min09a2.css?v2.1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js2/jquery-mmenu/jquery-mmenu.min09a2.css?v2.1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/v1.min09a2.css?v2.1.0">
  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/material-design/material-design.min09a2.css?v2.1.0">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,700'>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
  
  <script src="<?php echo base_url(); ?>assets/js2/breakpoints/breakpoints.min.js"></script>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTable/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker/datepicker.css" />
  
    <script src="<?php echo base_url(); ?>assets/sweetalert/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css">
  
  <script>
    Breakpoints();
  </script>
</head>
<body class="dashboard site-navbar-small" id="top">

<div id="disable_screen" style="display:none;"></div> 

<div id="simplePopupBackground" onClick="close_overlay()"></div>

  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
     <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided pull-right"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
    <div class="navbar-header">
      
      <button type="button" class="navbar-toggle collapsed pull-right margin-right-0" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon md-account" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle logo" data-toggle="gridmenu">
      
        <img class="navbar-brand-logo" src="<?php echo base_url(); ?>assets/images/logo.jpg" title="Karjat Heritage Resort" alt="Karjat Heritage Resort">
        <span class="navbar-brand-text"></span>
        
        
      </div>
      
    </div>

    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
        
    
          <li class="hidden-float" id="toggleMenubar">
            <a data-toggle="menubar" href="index.php" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
       
          
          
          
        </ul>
        <!-- End Navbar Toolbar -->

        <!-- Navbar Toolbar Right -->
        
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          
         
         
          
           <!--admin image end-->
          <li class="dropdown-menu-footer" role="presentation">
                <a class="color_black text-capitalize"><span aria-hidden="true" class=""></span>- Welcome <?php echo $this->session->userdata('name'); ?></a>
          </li> 
          
          <li class="dropdown">
            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
              	 
		 
           <!--admin image display-->

               <img src="<?php echo base_url(); ?>assets/images/user.png" title="Admin :: Karjat Heritage Resort" alt="Admin">
                <i></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <!--<li role="presentation">
                <a href="javascript:void(0)" role="menuitem"><i class="icon md-card" aria-hidden="true"></i> Billing</a>
              </li>-->
              <li role="presentation">
                <a href="<?php echo site_url().'/reset_password'; ?>" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Reset Password</a>
              </li>
              
              <li role="presentation">
                <a href="<?php echo site_url('login/logout'); ?>" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
              </li>
            </ul>
          </li>
          <li>&nbsp;</li>

        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->

     
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
  

     <style>
	 	.site-navbar .navbar-header { width: 200px; }
		.site-navbar .navbar-header .navbar-brand-text { display: inline !important;}
	 </style>


<div class="site-menubar">
    <ul class="site-menu">
		<li class="site-menu-item has-sub">
			<a href="javascript:void(0)">
			  <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
			  <span class="site-menu-title">Master</span>
			  <span class="site-menu-arrow"></span>
			</a>
			<ul class="site-menu-sub" style="margin-left:20px;">
				<li class="site-menu-item has-sub">
					<a href="<?php echo site_url()?>/organisation">
					  <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
					  <span class="site-menu-title">Organisation</span>
					</a>
				</li>
				<li class="site-menu-item has-sub">
					<a href="<?php echo site_url()?>/service">
					  <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
					  <span class="site-menu-title">Master Service</span>
					</a>
				</li>
				 <li class="site-menu-item has-sub">
					<a href="<?php echo site_url()?>/checklist">
						<i class="site-menu-icon md-view-list" aria-hidden="true"></i>
						<span class="site-menu-title">Checklist</span>
					</a>
				</li>
				<li class="site-menu-item has-sub">
					<a href="<?php echo site_url()?>/container">
						<i class="site-menu-icon md-view-list" aria-hidden="true"></i>
						<span class="site-menu-title">Container Description</span>
					</a>
				</li>
			</ul>
      </li>
	  <li class="site-menu-item has-sub">
        <a href="<?php echo site_url()?>/enquiry">
          <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
          <span class="site-menu-title">Enquiry</span>
        </a>
      </li>
	   <li class="site-menu-item has-sub">
			<a href="javascript:void(0)">
			  <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
			  <span class="site-menu-title">Invoice </span>
			  <span class="site-menu-arrow"></span>
			</a>
			<ul class="site-menu-sub" style="margin-left:20px;">
				<li class="site-menu-item has-sub">
					<a href="<?php echo site_url()?>invoice/">
					  <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
					  <span class="site-menu-title">Genrate Invoice</span>
					</a>
				</li>
	<!-- 			<li class="site-menu-item has-sub">
					<a href="<?php echo site_url()?>invoice/view_invoice">
					  <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
					  <span class="site-menu-title">View Invoice</span>
					</a>
				</li> -->
			</ul>
		</li>
    </ul>
  </div>
  