<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>YBM PLN | <?php echo $judul ?></title>
  <link href="<?php echo base_url() ?>asset/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>asset/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>asset/css/datepicker3.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>asset/css/styles.css" rel="stylesheet">
  
  <!--Data Table-->
  <script type="text/javascript" href="<?=base_url();?>asset/data-table/media/js/jquery.dataTables.js"></script>
  <script type="text/javascript" href="<?=base_url();?>asset/data-table/media/js/jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/data-table/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/data-table/media/css/dataTables.bootstrap.css">
  
  <!--Custom Font-->
  <link href="<?php echo base_url() ?>asset/https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="asset/"js/html5shiv.js"></script>
  <script src="asset/"js/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php echo base_url() ?>asset/coba/images/logo1.png" />
</head>
<body>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span></button>
          <a class="navbar-brand" href="<?php echo base_url() ?>penghimpunan/index"><span>YBM PLN</span> Penghimpunan Dan Publikasi</a>
          <li class="navbar-brand" href="<?php echo base_url() ?>asset/#"><span></li>
            <ul class="nav navbar-top-links navbar-right">
          <li><a href="<?=base_url().'login/logout'?>" class="dropdown"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
          </ul>
          </div>
        </div><!-- /.container-fluid -->
      </nav>
      <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
          <div class="profile-userpic">
           <img src="<?php echo base_url() ?>asset/coba/images/logo1.png "class="img-responsive" alt="">
         </div>
         <div class="profile-usertitle">
          <div class="profile-usertitle-name"><?php echo $this->session->userdata('nama_lengkap');?></div>
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
        <li class="active"><a href="<?php echo base_url() ?>mobil/penghimpunan/index"><em class="fa fa-home">&nbsp;</em> Home </a></li>
        <li class="parent "><a data-toggle="collapse" href="<?php echo base_url() ?>asset/#sub-item-1">
          <em class="fa fa-bars">&nbsp;</em> Mobil <span data-toggle="collapse" href="<?php echo base_url() ?>asset/#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
        </a>
        <ul class="children collapse" id="sub-item-1">
          <li><a href="<?php echo base_url() ?>mobil/Penghimpunan/Penghimpunan">
            <span class="fa fa-users">&nbsp;</span> Form Peminjaman Mobil
          </a></li>
          <li><a class="" href="<?php echo base_url() ?>mobil/Penghimpunan/table">
            <span class="fa fa-users">&nbsp;</span> Data Peminjaman Mobil
          </a></li>
          <li><a class="" href="<?php echo base_url() ?>mobil/Penghimpunan/penghimpunansemua">
            <span class="fa fa-users">&nbsp;</span> Data Semua Peminjaman 
          </a></li>
        </ul>
      </li>
      <li class="parent "><a data-toggle="collapse" href="<?php echo base_url() ?>asset/#sub-item-2">
        <em class="fa fa-bars">&nbsp;</em> Ruang Rapat <span data-toggle="collapse" href="<?php echo base_url() ?>asset/#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
      </a>
      <ul class="children collapse" id="sub-item-2">
        <li><a class="" href="<?php echo base_url() ?>ruangrapat/penghimpunan/penghimpunan">
          <span class="fa fa-building">&nbsp;</span> Form Peminjaman Ruang 
        </a></li>
        <li><a class="" href="<?php echo base_url() ?>ruangrapat/penghimpunan/table">
          <span class="fa fa-users">&nbsp;</span> Data Peminjaman Ruang
        </a></li>
        <li><a class="" href="<?php echo base_url() ?>ruangrapat/penghimpunan/penghimpunansemua">
          <span class="fa fa-users">&nbsp;</span> Data Semua Peminjaman 
        </a></li>
      </ul>
    <li><a href="<?=base_url().'profil/penghimpunan/index'?>"><em class="fa fa-user">&nbsp;</em> Profil</a></li>
  </ul>
  </div><!--/.sidebar-->