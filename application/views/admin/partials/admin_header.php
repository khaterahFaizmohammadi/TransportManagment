<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VSMS</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("assets/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
	<!--date picker -->
	<link href="<?php echo base_url("assets/datepicker3.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- sweet-alert --> 
    <link href="<?php echo base_url("assets/vendors/sweetalert/sweetalert.css"); ?>" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("assets/build/css/custom.min.css"); ?>" rel="stylesheet">
  </head>
  <?php
  $lang = $this->session->userdata('lang');
  if($lang=="persion"){
    
      $data['side_dashboard'] = 'داشبرد';
      $data['side_mg_emp'] = 'مدیریت کارمندان';
      $data['side_add_emp'] = 'اضافه کردن کارمند';
      $data['side_all_emp'] = 'همه کارمندان';

      $data['side_manifacture'] = 'سازنده ها و مودل ها';
      $data['side_add_mf'] = 'اضافه کردن سازنده';
      $data['side_add_model'] = 'اضافه کردن مودل';

      $data['side_vehicle'] = 'ماشین ها';
      $data['side_all_vehicle'] = 'همه ماشین ها';
      $data['side_sold_vehicle'] = 'ماشین های فروخته شده';

  }else{
      $data['side_dashboard'] = 'Dashboard';
      $data['side_mg_emp'] = 'Total Employee';
      $data['side_add_emp'] = 'Add Employee';
      $data['side_all_emp'] = 'Total Employee';

      $data['side_manifacture'] = 'Manufacturers & Model';
      $data['side_add_mf'] = 'Add Manufacturers';
      $data['side_add_model'] = 'Add Model';

      $data['side_vehicle'] = 'Vehicles';
      $data['side_all_vehicle'] = 'All Vehicles';
      $data['side_sold_vehicle'] = 'Sold Vehicles';
      
  }
  

  ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
             <a href="<?= base_url('admin/dashboard'); ?>" class="site_title"><i class="fa fa-automobile"></i> <span>VSMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="<?= base_url('uploads').$this->session->userdata('image'); ?>" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>
                    <h2><?= $this->session->userdata('first_name'); ?></h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-home"></i><?=$data['side_dashboard']?> </a></li>
                  <?php if($this->session->userdata('type') == "admin" ) : ?>
                  <li><a><i class="fa fa-edit"></i><?=$data['side_mg_emp']?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('admin/employee/add'); ?>"><?=$data['side_add_emp']?></a></li>
                      <li><a href="<?= base_url('admin/employee'); ?>"><?=$data['side_all_emp']?></a></li>
                    </ul>
                  </li>
                  
                    <li>
                        <a><i class="fa fa-desktop"></i><?=$data['side_manifacture']?><span class="fa fa-chevron-down"></span></a>

                        <ul class="nav child_menu">
                          <li><a href="<?php echo base_url() . 'admin/manufacturers';?>"><?=$data['side_add_mf']?></a></li>
                          <li><a href="<?php echo base_url() . 'admin/car_model';?>"><?=$data['side_add_model']?></a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                  <li><a><i class="fa fa-table"></i> <?=$data['side_vehicle']?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('admin/vehicles'); ?>"><?=$data['side_all_vehicle']?></a></li>
                      <li><a href="<?= base_url('admin/vehicles/soldlist'); ?>"><?=$data['side_sold_vehicle']?></a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?= $this->session->userdata('first_name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="<?php echo base_url() . 'admin/dashboard/logout'; ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->