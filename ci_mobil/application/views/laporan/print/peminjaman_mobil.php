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
					<th width="20%">Aksi</th>
				</thead>
				<tbody>
					<tr>
						<td>Data Hari Ini</td>
						<td><a href="<?= base_url().'laporanpdf/bookingmobil_hari';?>" class="btn btn-info ">Print</a></td>
					</tr>
					<tr>
						<td>Data Minggu Ini</td>
						<td><a href="<?= base_url().'laporanpdf/bookingmobil_minggu';?>" class="btn btn-info ">Print</a></td>
					</tr>
					<tr>
						<td>Data Bulan Ini </td>
						<td><a href="<?= base_url().'laporanpdf/bookingmobil_bulan';?>" class="btn btn-info ">Print</a></td>
					</tr>
					<tr>
						<td>Data Tahun Ini</td>
						<td><a href="<?= base_url().'laporanpdf/bookingmobil_tahun';?>" class="btn btn-info ">Print</a></td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>
</div>

