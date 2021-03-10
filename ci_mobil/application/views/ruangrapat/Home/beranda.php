<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="asset/#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
			
		</div>
	</div><!--/.row-->
	
	<div class="panel panel-teal">
		<div class="panel-heading dark-overlay">YBM PLN</div>
		<div class="panel-body">
			<h2>Selamat Datang Admin <?php echo $this->session->userdata('username');?></h2>
		</div>
	</div>
	
	
	
	<div class="panel panel-container">
		<div class="row">
			<div class="col-xs-6 col-md-5 col-lg-5 no-padding">
				<div class="panel panel-teal panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
						<div class="large"><?php echo $jumlahuser; ?></div>
						<div class="text-muted">Total User</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-5 col-lg-5 no-padding">
				<div class="panel panel-blue panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-building-o color-orange"></em>
						<div class="large"><?php echo $jumlahbooking; ?></div>
						<div class="text-muted">Total Peminjaman Ruang</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-5 col-lg-5 no-padding">
				<div class="panel panel-orange panel-widget border-right">
					<div class="row no-padding"><em class="fa fa-xl fa-car color-red"></em>
						<div class="large">24</div>
						<div class="text-muted">Total Peminjaman Mobil</div>
					</div>
				</div>
			</div>
			
		</div><!--/.row-->
	</div>
</div>

