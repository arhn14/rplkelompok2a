<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistem Informasi Rapat Jurusan Sistem Informasi</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/zabuto_calendar.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/js/fullcalendar/bootstrap-fullcalendar.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/gritter/css/jquery.gritter.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lineicons/style.css'); ?>" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/js/chart-master/Chart.js'); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/evencal/css/style.css')?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/evencal/css/colorbox.css');?>"/>
  <script type="text/javascript" src="<?php echo base_url('assets/evencal/js/jquery-1.7.2.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/evencal/js/jquery.colorbox-min.js');?>"></script>
    </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url('dosen') ?>" class="logo"><b>Sistem Informasi UNAND</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url('logout') ?>"><i class="glyphicon glyphicon-off"></i></a></li>
              </ul>
            </div>
        </header>