<link rel="stylesheet" href="<?=base_url();?>assets/asset/css/modalubah.css">
<style>
.baten {
	float: right;
}
.baten1 {
	float: right;
	margin-right: 5px;
}

.cari{
	width: 1055px;
	margin-top: 15px;
	margin-bottom: 10px;
	
	border-radius: 1px;
	float: right;
	margin-right: 19px;
	padding: 10px;
}
.cari input[type="text"]{
	font-size: 15px;
	font-weight: 500;
	background: #fff;
	color: #000;
}

</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-building"></em>
			</a></li>
			<li class="active">Ruang Rapat</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Ruang Rapat</h2>
		</div>
	</div><!--/.row-->
	<?php if ( $this->session->flashdata('flash')): ?> 
		<div class="alert bg-teal" role="alert"><em class="fa fa-check">&nbsp;</em> Data Booking Berhasil <?= $this->session->flashdata('flash'); ?><button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
	<?php endif; ?>



	<div class="panel panel-info">
		<div class="panel-heading">
			<center>
				<li class="fa fa-pencil-square"></li>
				Status Ruang Rapat
			</center>
		</div>
		<div class="panel-body">
			<?php
			foreach ($ubahbooking as $b) :?>
				<form class="form-horizontal" action="<?=base_url().'ruangrapat/status/update';?>" method="post">
					<input type="hidden" name="id" value="<?= $b['id_booking'];?>">
					<fieldset>
						<!-- Name input-->
						<div class="form-group">
							<label class="col-md-2 control-label" for="name"></label>
							<div class="col-md-10">
								<input id="email" name="email" type="hidden" value="<?= $b['email']; ?>" placeholder="Your name" class="form-control" readonly>
								<small><?=form_error('email');?> </small>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label" for="name">Nama Lengkap</label>
							<div class="col-md-10">
								<input id="nama_lengkap" name="nama_lengkap" type="text" value="<?= $b['nama_lengkap']; ?>" placeholder="Your name" class="form-control" readonly>
							</div>
						</div>
					<?php endforeach;?>
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Status</label>
						<div class="col-md-10">
							<select class="form-control" id="status" name="status">
								<?php foreach ($status as $ss) :?>
									<option value="<?= $ss; ?>" ><?= $ss; ?></option>
								<?php endforeach ?>
							</select>
							<br/>
							<small><?= form_error('status');?> </small>
						</div>
					</div>
					<!-- Form actions -->


					<div class="form-group">
						<div class="col-md-12 widget-right">
							<div class="baten">
								<button type="submit" class="btn btn-success btn-md ">Beri Status</button></div>
								<div class="baten1">
									<a href="<?=base_url().'ruangrapat/admin/table'?>" class="btn btn-danger">Cancel</a>
								</div>
							</div>
						</div>

					</fieldset>
				</form>
			</div>
		</div>