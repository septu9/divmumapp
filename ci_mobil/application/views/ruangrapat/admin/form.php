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
				Form Booking Ruang Rapat
			</center>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?= base_url().'ruangrapat/admin/admin'?>" method="post">
				<fieldset>
					<!-- Name input-->
					<div class="form-group">
						<label class="col-md-2 control-label" for="id_divisi"></label>
						<div class="col-md-10">
							<input id="id_divisi" name="id_divisi" type="hidden" value="<?=$id_divisi;?>" placeholder="" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="nama_lengkap">Divisi</label>
						<div class="col-md-10">
							<input id="divisi" name="" type="text" value="Admin" placeholder="" class="form-control" readonly>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Nama Lengkap</label>
						<div class="col-md-10">
							<input id="nama_lengkap" name="nama_lengkap" type="text" value="<?=$user;?>" placeholder="" class="form-control" readonly>
							<br/>
							<small><?=form_error('waktu_booking');?> </small>
						</div>
					</div>
					<!-- Message body -->
					<div class="form-group">
						<label class="col-md-2 control-label" for="message">Agenda <br>Rapat</label>
						<div class="col-md-10">
							<textarea class="form-control" id="message" name="agenda_meeting" placeholder="Agenda Meeting" rows="5"></textarea>
							<br>
							<small><?= form_error('agenda_meeting');?></small>
						</div>
					</div>
					<!-- Email input-->
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Tanggal Peminjaman</label>
						<div class="col-md-10">
							<input id="name" name="tanggal_booking" type="date" placeholder="Your name" class="form-control">
							<br/>
							<small><?= form_error('tanggal_booking');?> </small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Waktu Peminjaman</label>
						<div class="col-md-10">
							<input id="name" name="waktu_booking" type="time" placeholder="Your name" class="form-control">
							<br/>
							<small><?=form_error('waktu_booking');?> </small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Tanggal Selesai</label>
						<div class="col-md-10">
							<input id="name" name="tanggal_selesai" type="date" placeholder="Your name" class="form-control">
							<br/>
							<small><?=form_error('tanggal_selesai');?> </small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="name">Waktu Selesai</label>
						<div class="col-md-10">
							<input id="name" name="waktu_selesai" type="time" placeholder="Your name" class="form-control">
							<br/>
							<small><?=form_error('waktu_selesai');?> </small>
						</div>
					</div>
					<!-- Form actions -->

					<div class="form-group">
						<div class="col-md-12 widget-right">
							<div class="baten">
								<button type="submit" class="btn btn-success btn-md ">Booking</button>
								<a href="<?=base_url().'admin/index';?>" class="btn btn-danger">Cancel</a>
							</div>
							<div class="baten1">
								
							</div>
						</div>
					</div>

				</fieldset>
			</form>
		</div>
	</div>


</div><!--/.col-->


