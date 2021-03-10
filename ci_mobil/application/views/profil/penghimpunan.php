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
				<em class="fa fa-user"></em>
			</a></li>
			<li class="active">Profil</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Profil</h2>
		</div>
	</div><!--/.row-->
	<?php if ( $this->session->flashdata('flash')): ?> 
		<div class="alert bg-teal" role="alert"><em class="fa fa-check">&nbsp;</em> Data User Berhasil <?= $this->session->flashdata('flash'); ?><button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
	<?php endif; ?>



	<div class="panel panel-info">
		<div class="panel-heading">
			<center>
				<li class="fa fa-pencil-square"></li>
				Form Ubah Profil
			</center>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?= base_url().'akunadmin/update'?>" method="post">
				<fieldset>
					<!-- Name input-->
					<input type="hidden" name="id" value="<?=$id_user;?>">
					<div class="form-group">
						<label class="col-md-2 control-label" for="nama_lengkap">Nama Lengkap</label>
						<div class="col-md-10">
							<input id="name" name="nama_lengkap" type="text" placeholder="Nama Lengkap" class="form-control" value="<?=$user;?>">
							<br/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="email">Email</label>
						<div class="col-md-10">
							<input id="name" name="email" type="email" placeholder="Email" class="form-control" value="<?=$email;?>">
							<br/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="message">Alamat</label>
						<div class="col-md-10">
							<textarea class="form-control" id="message" name="alamat" placeholder="Alamat" rows="5"></textarea>
							<br>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="telepon">Telepon</label>
						<div class="col-md-10">
							<input id="name" name="telepon" type="text" placeholder="telepon" class="form-control" value="<?=$telepon;?>">
							<br/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="password">Password</label>
						<div class="col-md-10">
							<input id="name" name="password" type="password" placeholder="password" class="form-control">
							<br/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="telepon">Telepon</label>
						<div class="col-md-10">
							<input id="name" name="telepon" type="text" placeholder="telepon" class="form-control" value="<?=$telepon;?>">
							<br/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12 widget-right">
							<div class="baten">
								<button type="submit" class="btn btn-success btn-md ">Ubah</button>
								<a href="<?=base_url();?>penghimpunan/index" class="btn btn-danger" >Cancel</a>
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


