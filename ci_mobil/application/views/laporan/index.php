<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-building"></em>
			</a></li>
			<li class="active">Laporan</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Laporan</h2>
		</div>
	</div><!--/.row-->
	<div class="panel panel-info">
		<div class="panel-heading">
			<center>
				<li class="fa fa-pencil-square"> Laporan</li>
			</center>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>Data</th>
					<th width="20%">Via</th>
				</thead>
				<tbody>
					<tr>
						<td>Data Mobil</td>
						<td><a href="<?= base_url().'laporan/export_mobil';?>" class="btn btn-warning ">Excel</a>&nbsp;<a href="<?php echo base_url().'Laporanpdf/mobil'?>" class="btn btn-success ">Print</a></td>
					</tr>
					<tr>
						<td>Data Peminjaman Mobil</td>
						<td><a href="<?= base_url().'laporan/export_mobil_peminjaman';?>" class="btn btn-warning ">Excel</a>&nbsp;<a href="<?= base_url().'laporanpdf/peminjaman_mobil';?>" class="btn btn-success ">Print</a></td>
					</tr>
					<tr>
						<td>Data Peminjaman Ruang Rapat</td>
						<td><a href="<?= base_url().'laporan/export_ruang_peminjaman';?>" class="btn btn-warning ">Excel</a>&nbsp;<a href="<?= base_url().'laporanpdf/peminjaman_ruang';?>" class="btn btn-success ">Print</a></td>
					</tr>
					<tr>
						<td>Data User</td>
						<td><a href="<?= base_url().'laporan/export_user';?>" class="btn btn-warning ">Excel</a>&nbsp;<a href="<?php echo base_url().'laporanpdf/user'?>" class="btn btn-success ">Print</a></td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>
</div>

