<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favi.png">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icheck.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/log.png">
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
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert/sweetalert.css">
  
  <!--  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" /> -->
	
  <script>
    Breakpoints();
  </script>
</head>

<body class="dashboard site-navbar-small">

  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided" data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
         <img class="navbar-brand-logo" src="<?php echo base_url('assets/images/logo.png'); ?>" title="" style="width:60px;">
    <!--    <span class="navbar-brand-text"> Velocity</span> -->
      </div>
    </div>

    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="hidden-float" id="toggleMenubar">
            <a data-toggle="menubar" href="#" role="button">
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
		  <li class="dropdown-menu-footer" role="Admin">
              <a class="color_black text-capitalize"><span aria-hidden="true" class=""></span>- Welcome <?php echo $this->session->userdata['first_name']; ?></a>
          </li>
          <li class="dropdown">
            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <img src="<?php echo base_url('assets/images/user.png'); ?>" alt="Logo">
                <i></i>
              </span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation">
                <a href="<?php echo site_url('login/logout'); ?>" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->

      <!-- Site Navbar Seach -->
	  <!-- 
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon md-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="">
              <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search" data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>
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
        <a href="<?php echo site_url()?>enquiry">
          <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
          <span class="site-menu-title">Enquiry</span>
        </a>
      </li>
      
        <li class="site-menu-item has-sub">
          <a href="<?php echo site_url()?>/invoice">
            <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
            <span class="site-menu-title">Invoice</span>
          </a>
        </li>

      <li class="site-menu-item has-sub">
        <a href="<?php echo site_url()?>project">
          <i class="site-menu-icon md-view-list" aria-hidden="true"></i>
          <span class="site-menu-title">Project</span>
        </a>
      </li>
    </ul>
  </div>
  