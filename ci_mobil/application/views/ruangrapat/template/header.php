<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $judul ?></title>
  <link href="<?php echo base_url() ?>asset/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>asset/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>asset/css/datepicker3.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>asset/css/styles.css" rel="stylesheet">
  
  <!--Custom Font-->
  <link href="<?php echo base_url() ?>asset/https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="asset/"js/html5shiv.js"></script>
  <script src="asset/"js/respond.min.js"></script>
<![endif]-->
</head>
<body>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span></button>
          <a class="navbar-brand" href="<?php echo base_url() ?>asset/#"><span>YBM PLN</span>Admin</a>
          <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="<?php echo base_url() ?>asset/#">
              <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
            </a>
            <ul class="dropdown-menu dropdown-messages">
              <li>
                <div class="dropdown-messages-box"><a href="<?php echo base_url() ?>asset/profile.html" class="pull-left">
                  <img alt="image" class="img-circle" src="asset/"http://placehold.it/40/30a5ff/fff">
                </a>
                <div class="message-body"><small class="pull-right">3 mins ago</small>
                  <a href="<?php echo base_url() ?>asset/#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
                  <br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="dropdown-messages-box"><a href="<?php echo base_url() ?>asset/profile.html" class="pull-left">
                  <img alt="image" class="img-circle" src="asset/"http://placehold.it/40/30a5ff/fff">
                </a>
                <div class="message-body"><small class="pull-right">1 hour ago</small>
                  <a href="<?php echo base_url() ?>asset/#">New message from <strong>Jane Doe</strong>.</a>
                  <br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
                </div>
              </li>
              <li class="divider"></li>
              <li>
                <div class="all-button"><a href="<?php echo base_url() ?>asset/#">
                  <em class="fa fa-inbox"></em> <strong>All Messages</strong>
                </a></div>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="<?php echo base_url() ?>asset/#">
            <em class="fa fa-bell"></em><span class="label label-info">5</span>
          </a>
          <ul class="dropdown-menu dropdown-alerts">
            <li><a href="<?php echo base_url() ?>asset/#">
              <div><em class="fa fa-envelope"></em> 1 New Message
                <span class="pull-right text-muted small">3 mins ago</span></div>
              </a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url() ?>asset/#">
                <div><em class="fa fa-heart"></em> 12 New Likes
                  <span class="pull-right text-muted small">4 mins ago</span></div>
                </a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url() ?>asset/#">
                  <div><em class="fa fa-user"></em> 5 New Followers
                    <span class="pull-right text-muted small">4 mins ago</span></div>
                  </a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div><!-- /.container-fluid -->
      </nav>
      <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
          <div class="profile-userpic">
            <img src="<?php echo base_url() ?>asset/"http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
          </div>
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">Username</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </form>
        <ul class="nav menu">
          <li class="active"><a href="<?php echo base_url() ?>c_home/Admin"><em class="fa fa-home">&nbsp;</em> Home </a></li>
          <li class="parent "><a data-toggle="collapse" href="<?php echo base_url() ?>asset/#sub-item-1">
            <em class="fa fa-bars">&nbsp;</em> Mobil <span data-toggle="collapse" href="<?php echo base_url() ?>asset/#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
          </a>
          <ul class="children collapse" id="sub-item-1">
            <li><a class="" href="<?php echo base_url() ?>Admin_mobil/mobil">
              <span class="fa fa-car">&nbsp;</span> Form Mobil
            </a></li>
            <li><a href="<?php echo base_url() ?>Admin/Admin">
              <span class="fa fa-users">&nbsp;</span> Form Booking User
            </a></li>
            <li><a class="" href="<?php echo base_url() ?>Admin/databooking">
              <span class="fa fa-users">&nbsp;</span> Data Booking User
            </a></li>
          </ul>
        </li>
        <li><a href="<?=base_url().'login/logout'?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
      </ul>
  </div><!--/.sidebar-->