
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url(); ?>c_home/index">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Info Total</h1>
		</div>
	</div><!--/.row-->
	<div class="alert bg-info" role="alert"><i class="fa fa-smile"></i>&nbsp; Selamat Datang <?php echo $this->session->userdata('nama_lengkap');?></div>
	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-car color-blue"></em>
						<div class="large"><?php echo $count; ?></div>
						<div class="text-muted">Booking Mobil</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-car color-orange"></em>
						<div class="large"><?php echo $count_m; ?></div>
						<div class="text-muted">Mobil</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
						<div class="large"><?php echo $jumlahuser; ?></div>
						<div class="text-muted">Total User</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-building-o color-orange"></em>
						<div class="large"><?php echo $jumlahbooking; ?></div>
						<div class="text-muted">Total Peminjaman Ruang</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	