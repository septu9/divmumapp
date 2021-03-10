<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
  <title><?=$judul;?></title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8" />
  <meta name="keywords" content="Full Screen Enroll Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- Meta tag Keywords -->

  <!-- css files -->
  <link rel="stylesheet" href="<?=base_url();?>asset/regis/css/style.css" type="text/css" media="all" />
  <!-- Style-CSS -->
  <link rel="stylesheet" href="<?=base_url();?>asset/regis/css/font-awesome.min.css">
  <!-- Font-Awesome-Icons-CSS -->
  <!-- //css files -->

  <!-- web-fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=devanagari,latin-ext"
  rel="stylesheet">
  <!-- //web-fonts -->
</head>

<body>
  <div class="main-w3ls">
    <div class="left-content">
      <div class="w3ls-content">
        <!-- logo -->
        
      </div>
      <!-- copyright -->
      
      <!-- //copyright -->
    </div>
    <div class="right-form-agile">
      <!-- content -->
      <div class="sub-main-w3">
        <h3>YBM PLN Gandaria</h3>
        <br/>
        <br/>
        <p>Buat Akun</p>
        <br/>
        <br/>
        <form action="<?php echo base_url(); ?>user/registration" method="post">  
          <div class="form-style-agile">
            <label>Nama Lengkap</label>
            <div class="pom-agile">
              <span class="fa fa-user"></span>
              <input placeholder="Nama Lengkap" name="nama_lengkap" type="text" required="">
            </div>
            <span class="text-danger"><?php echo form_error('nama_lengkap'); ?></span>  
          </div>
          <div class="form-style-agile">
            <label>Email</label>
            <div class="pom-agile">
              <span class="fa fa-envelope-open"></span>
              <input placeholder="Email" name="email" type="email" required="">
            </div>
            <span class="text-danger"><?php echo form_error('email'); ?></span>  
          </div>
          <div class="form-style-agile">
            <label>Telepon</label>
            <div class="pom-agile">
              <span class="fa fa-phone"></span>
              <input placeholder="Telepon" name="telepon" type="text" required="">
            </div>
            <span class="text-danger"><?php echo form_error('telepon'); ?></span>  
          </div>
          
          <div class="form-style-agile">
            <label>Alamat</label>
            <div class="pom-agile">
              <span class="fa fa-home"></span>
              <textarea name="alamat" placeholder="Alamat"></textarea>
            </div>
          </div>
          <div class="form-style-agile">
            <label>Divisi</label>
            <div class="pom-agile">
              <span class="fa fa-home"></span>
              <select class="form-control" name="id_divisi">
                <?php foreach($divisi as $div){ ?>
                  <option value="<?php echo $div['id_divisi']; ?>"><?php echo $div['nama_divisi']; ?>   </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-style-agile">
            <label>Password</label>
            <div class="pom-agile">
              <span class="fa fa-key"></span>
              <input placeholder="Password" name="password" type="password" id="password1" required="">
            </div>
            <span class="text-danger"><?php echo form_error('password'); ?></span>  
          </div>
          
          <button type="submit"> Registrasi</button>
        </form>
        <!-- social icons -->
        
        <!-- //social icons -->
      </div>
    </div>
  </div>
  <!-- //content -->

</body>

</html>