<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>Admin/index">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Mobil</li>
    </ol>
  </div><!--/.row-->
  
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-"></h1>
    </div>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h2>Mobil</h2>
    </div>
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">Detail Info Mobil</div>
        <div class="panel-body">
          <p><strong>Nama Mobil</strong></p>
          <p><em class="fa fa-car">&nbsp;<?= $mobil->nama_mobil; ?></em></p>
          <a href="<?= base_url(); ?>mobil/Admin_mobil/mobil" class="btn btn-primary pull-right"><i class="fa fa-arrow-left">&nbsp;Kembali</i></a></br>
        </div>
      </div>
    </div>
    </div><!-- /.row -->