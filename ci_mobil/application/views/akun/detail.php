<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-user"></em>
			</a></li>
			<li class="active">User</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Detail User</h2>
			<div class="panel panel-default ">
				<div class="panel-heading">
					Data User
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<?php foreach ($detail as $d):?> 
									
									<div class="timeline-badge success"><i class="glyphicon glyphicon-user"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Nama Lengkap</h5>
										</div>
										<div class="timeline-body">
											<h3><?= $d['nama_lengkap']; ?></h3>
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
											<h3><?= $d['email'];?></h3>
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
											<h3><?= $d['alamat'];?></h3>
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
											<h3><?= $d['telepon'];?></h3>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge info"><i class="glyphicon glyphicon-briefcase"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Divisi</h5>
										</div>
										<div class="timeline-body">
											<h3><?= $d['nama_divisi'];?></h3>
										</div>
									</div>
								</li>
							</ul>
						<?php endforeach;?>
						<a href="<?=base_url();?>akunadmin/index" class="btn btn-warning pull-right">Kembali</a>
					</div>
				</div>