<style>
table, td, th {
  border: 0px solid black;
  border-collapse: collapse;
}

table {
  width: 100%;
}

th, td {
  text-align: center;
}

</style>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url() ?>Admin/index">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Forms</li>
    </ol>
  </div><!--/.row-->
  
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"></h1>
    </div>
  </div><!--/.row-->

  <?php if ( $this->session->flashdata('flash')): ?> 
    <div class="alert bg-teal" role="alert"><em class="fa fa-check">&nbsp;</em> Data Mobil Berhasil <?= $this->session->flashdata('flash'); ?><button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
  <?php endif; ?>

  <div class="row-mt-3">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><center><i class="fa fa-check-square-o">
        Form Mobil</center></i>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="<?php echo base_url().'Admin_mobil/tambah' ?>" method="POST">
          <fieldset>
            <?php if(validation_errors()) : ?> 
              <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em><?php echo validation_errors(); ?><a class="pull-right"><em class="fa fa-close"></em></a></div>
            <?php endif; ?>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-1 control-label" for="name">Mobil</label>
              <div class="col-md-9">
                <input id="namamobil" name="namamobil" type="text" placeholder="Enter Nama Mobil" class="form-control">
              </div>
            </div>
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 widget-left">
                <button type="submit" class="btn btn-primary btn-md pull-right">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div><!--/.col-->



  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading"><center><i class="fa fa-table">
      Data Mobil</center></i>
    </div>
    <div class="panel-body">
      <fieldset>
        <table class="table">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Mobil</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php $no=1; foreach($mobil as $m) :?>
          <tbody>
            <tr>
              <th><?php echo $no++; ?></th>
              <td><?php echo $m['nama_mobil']; ?></td>
              <td>
                <h4>
                  <a href="<?= base_url(); ?>mobil/Admin_mobil/detail/<?= $m['id_mobil']; ?>"><span class="label label-info"><i class="fa fa-info">&ensp;Detail</i></span></a>
                  <a href="<?= base_url(); ?>mobil/Admin_mobil/ubah/<?= $m['id_mobil']; ?>"><span class="label label-warning"><i class="fa fa-edit">&ensp;Edit</i></span></a>
                  <a href="<?= base_url(); ?>mobil/Admin_mobil/hapus/<?= $m['id_mobil']; ?>"><span class="label label-danger" onclick="return confirm('Anda Yakin Menghapus Data?');"><i class="fa fa-trash">&ensp;Hapus</i></span></a>
                </h4>
              </td>
            </tr>
          </tbody>
        <?php endforeach;?>
      </table>
    </fieldset>
  </form>
</div>
</div>
</div><!--/.col-->


