 <link rel="stylesheet" href="<?=base_url();?>asset/asset/css/modalubah.css">
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
			<li class="active">User</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">User</h2>
		</div>
	</div><!--/.row-->
	<?php if ( $this->session->flashdata('flash')): ?> 
		<div class="alert bg-teal" role="alert"><em class="fa fa-check">&nbsp;</em> Data User Berhasil <?= $this->session->flashdata('flash'); ?><button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
	<?php endif; ?>



	<div class="panel panel-info">
		<div class="panel-heading">
			<center>
				<li class="fa fa-pencil-square"></li>
				Form Tambah Data User
			</center>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?= base_url().'akunadmin/tambahdatauser'?>" method="post">
				<fieldset>
					<!-- Name input-->
					
					<div class="form-group">
						<label class="col-md-2 control-label" for="nama_lengkap">Nama Lengkap</label>
						<div class="col-md-10">
							<input id="name" name="nama_lengkap" type="text" placeholder="Nama Lengkap" class="form-control">
							<br/>
							<small><?=form_error('nama_lengkap');?> </small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="email">Email</label>
						<div class="col-md-10">
							<input id="name" name="email" type="email" placeholder="Email" class="form-control">
							<br/>
							<small><?=form_error('email');?> </small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="message">Alamat</label>
						<div class="col-md-10">
							<textarea class="form-control" id="message" name="alamat" placeholder="Alamat" rows="5"></textarea>
							<br>
							<small><?= form_error('alamat');?></small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="telepon">Telepon</label>
						<div class="col-md-10">
							<input id="name" name="telepon" type="text" placeholder="telepon" class="form-control">
							<br/>
							<small><?=form_error('telepon');?> </small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="password">Password</label>
						<div class="col-md-10">
							<input id="name" name="password" type="password" placeholder="password" class="form-control">
							<br/>
							<small><?=form_error('password');?> </small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="level">Divisi</label>
						<div class="col-md-10">
							<select class="form-control" name="id_divisi">
								<?php foreach($divisi as $div){ ?>
									<option value="<?php echo $div['id_divisi']; ?>"><?php echo $div['nama_divisi']; ?>   </option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12 widget-right">
							<div class="baten">
								<button type="submit" class="btn btn-success btn-md ">Tambah</button></div>
								<div class="baten1">
									  <a href="<?=base_url();?>akunadmin/index" class="btn btn-danger">Cancel</a>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>


	</div><!--/.col-->


