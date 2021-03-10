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
			<h2 class="page-header">Detail Profil</h2>
			<a href= "<?=base_url().'profil/penghimpunan/ubah';?>" class="btn btn-warning">Ubah</a>
			<p></p>
			<div class="panel panel-default ">
				<div class="panel-heading">
					Profil
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
									<div class="timeline-badge success"><i class="glyphicon glyphicon-user"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Nama Lengkap</h5>
										</div>
										<div class="timeline-body">
											<h3><?= $user;?></h3>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge primary"><i class="glyphicon glyphicon-envelope"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Email</h5>
										</div>
										<div class="timeline-body">
											<h3><?= $email;?></h3>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge danger"><i class="glyphicon glyphicon-home"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Alamat</h5>
										</div>
										<div class="timeline-body">
											<h3><?= $alamat;?></h3>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge warning"><i class="glyphicon glyphicon-earphone"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Telepon</h5>
										</div>
										<div class="timeline-body">
											<h3><?= $telepon;?></h3>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge success"><i class="glyphicon glyphicon-qrcode"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Password</h5>
										</div>
										<div class="timeline-body">
											<h3><?= $password;?></h3>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge info"><i class="glyphicon glyphicon-briefcase"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Divisi</h5>
										</div>
										<?php foreach ($divisi as $d){?>
										<div class="timeline-body">
											<h3><?= $d['nama_divisi'];?></h3>
										<?php };?>
										</div>
									</div>
								</li>
							</ul>
					</div>
				</div>