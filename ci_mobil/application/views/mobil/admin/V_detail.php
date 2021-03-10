<style>
.baten {
	float: right;
}
.table-detail{
	padding: 20px;
}
.table-detail table{
	width: 50%;
}
.table-detail tr,td{
	margin-top: 12px;
}
.table-detail{
	font-size: 12pt;
}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?=base_url();?>kepatuhan/index">
				<em class="fa fa-car"></em>
			</a></li>
			<li class="active">Mobil</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Mobil</h2>
		</div>
	</div><!--/.row-->



	<?php if ( $this->session->flashdata('flash')): ?> 
		<div class="alert bg-teal" role="alert"><em class="fa fa-check">&nbsp;</em> Data Booking Berhasil <?= $this->session->flashdata('flash'); ?><button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
	<?php endif; ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default ">
				<div class="panel-heading">
					Data Mobil
					<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body timeline-container">
						<ul class="timeline">
							<li>
								<?php foreach($detail as $b) :?>
									<div class="timeline-badge success"><i class="glyphicon glyphicon-briefcase"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Divisi</h5>
										</div>
										<div class="timeline-body">
											<h4> <?php echo $b['nama_divisi']; ?></h4>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge primary"><i class="glyphicon glyphicon-user"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Nama Lengkap</h5>
										</div>
										<div class="timeline-body">
											<h4> <?php echo $b['nama_lengkap']; ?></h4>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge danger"><i class="glyphicon glyphicon-home"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Tujuan</h5>
										</div>
										<div class="timeline-body">
											<h4> <?php echo $b['tujuan']; ?></h4>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge danger"><i class="glyphicon glyphicon-list"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Mobil</h5>
										</div>
										<div class="timeline-body">
											<h4> <?php echo $b['nama_mobil']; ?></h4>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge warning"><i class="glyphicon glyphicon-calendar"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Tanggal Peminjaman</h5>
										</div>
										<div class="timeline-body">
											<h4> <?php $tanggal1 = $b['tanggal_booking']; echo longdate_indo($tanggal1);?></h4>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge info"><i class="glyphicon glyphicon-time"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Waktu Peminjaman</h5>
										</div>
										<div class="timeline-body">
											<h4> <?php echo $b['waktu_booking']; ?></h4>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge info"><i class="glyphicon glyphicon-calendar"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Tanggal Selesai</h5>
										</div>
										<div class="timeline-body">
											<h4> <?php $tanggal2 = $b['tanggal_selesai']; echo longdate_indo($tanggal2);?></h4>
											
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge info"><i class="glyphicon glyphicon-calendar"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Waktu Selesai</h5>
										</div>
										<div class="timeline-body">
											<h4>  <?php echo $b['waktu_selesai']; ?></h4>
										</div>
									</div>
								</li>
								<li>
									<div class="timeline-badge info"><i class="glyphicon glyphicon-ok"></i></div>
									<div class="timeline-panel">
										<div class="timeline-heading">
											<h5 class="timeline-title">Status</h5>
										</div>
										<div class="timeline-body">
											<h4>  <?php echo $b['status']; ?></h4>
										</div>
									</div>
								</li>
							</ul>
						<?php endforeach;?>
						<div class="baten">
							<a href="<?= base_url(); ?>mobil/admin/databooking" class="btn btn-warning">Kembali</a>
						</div>
					</div>
					