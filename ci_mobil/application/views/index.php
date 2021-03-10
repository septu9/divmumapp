<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$judul;?></title>
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/coba/bootstrap/css/bootstrap-grid.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/coba/bootstrap/css/bootstrap-grid-min-css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/coba/bootstrap/css/bootstrap-reboot.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/coba/bootstrap/css/bootstrap-reboot-min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/coba/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/coba/bootstrap/css/bootstrap-min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url();?>asset/coba/css/style.css">
  <link rel="shortcut icon" href="<?php echo base_url() ?>asset/coba/images/logo1.png" />
  <script type="text/javascript" src="<?=base_url();?>asset/jquery.min.js"></script>
</head>
<body>

  <div class="container">
    <h2 class="hh">Welcome to General Affair Division Integrated System</h2>
    
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
     
      <br/>
      <?php if (isset($pesan)) :?>
        <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <?php echo $pesan;?></div>
        
      <?php endif;?>

    </div>
    <?php if ( $this->session->flashdata('flash')): ?> 
     <div class="alert alert-info">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Profil <?= $this->session->flashdata('flash'); ?></div>
    <?php endif; ?>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="baten">Login</button>

    <div id="id01" class="modal">
      
      <form class="modal-content animate" action="<?= base_url().'login/proses_login'?>" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="<?=base_url();?>asset/coba/images/logo3.jpg" alt="Avatar" class="avatar">
        </div>
        <div id="output"></div>
        <div class="container">
          <label for="uname"><b>Email</b></label>
          <input type="text" class="" placeholder="Enter Email" name="email" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="passwordfield" class="form-password" required >
          <label>
        <input type="checkbox" class="form-checkbox"> Show password
      </label>
          <button type="submit" name="login">Login</button>
        </div>



        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="psw">Buat <a href="<?=base_url().'user/index';?>">Akun?</a></span>
        </div>
      </form>
    </div>

    <script type="text/javascript" src="<?=base_url();?>asset/coba/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/coba/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/coba/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/coba/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>asset/coba/js/style.js"></script>
  </body>
</div>
<script type="text/javascript">
  $(document).ready(function(){   
    $('.form-checkbox').click(function(){
      if($(this).is(':checked')){
        $('.form-password').attr('type','text');
      }else{
        $('.form-password').attr('type','password');
      }
    });
  });
</script>
</html>
