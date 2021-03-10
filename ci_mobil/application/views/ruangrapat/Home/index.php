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
</head>

<body>

  <div class="container">
    <h2 class="hh">Selamat Datang Di Aplikasi Booking Ruang Rapat</h2>
    
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-interval="10000">
          <img src="<?=base_url();?>asset/coba/images/1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-interval="2000">
          <img src="<?=base_url();?>asset/coba/images/2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?=base_url();?>asset/coba/images/3.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <br/>
    <?php if (isset($pesan)) {
      echo $pesan;
    }
    ?>
  </div>

  <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="baten">Login</button>

  <div id="id01" class="modal">
    
    <form class="modal-content animate" action="<?= base_url().'login/proses_login'?>" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="<?=base_url();?>asset/coba/images/logo3.jpg" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="text" class="" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        
        <button type="submit" name="login">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
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

</html>