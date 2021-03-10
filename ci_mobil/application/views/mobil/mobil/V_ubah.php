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

  <?php if( $this->session->flashdata('flash')):?>
    <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em><?= $this->session->flashdata('flash'); ?><a href="asset/#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
  <?php endif; ?>

  <div class="row-mt-3">
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><center><i class="fa fa-check-square-o">
        Form Mobil</center></i>
      </div>
      <div class="panel-body">

        <?php if( $this->session->flashdata('flash')):?>
          <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em><?= $this->session->flashdata('flash'); ?><a href="asset/#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
        <?php endif; ?>
        
        <form class="form-horizontal" action="<?php echo base_url(); ?>mobil/Admin_mobil/update" method="POST">
          <fieldset>
            <!-- Name input-->
            <input type="hidden" name="id" value="<?= $mobil->id_mobil ?>">
            <div class="form-group">
              <label class="col-md-1 control-label" for="name">Mobil</label>
              <div class="col-md-9">
                <input id="namamobil" name="namamobil" type="text" value="<?php echo $mobil->nama_mobil ?>" class="form-control">
              </div>
            </div>
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 widget-left">
                <button type="submit" class="btn btn-primary btn-md pull-right">Submit</button>
                <a href="<?=base_url();?>Admin_mobil/mobil" class="btn btn-danger">Cancel</a>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
      </div><!--/.col-->