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
			<h2 class="page-header">Mobil</h2>
		</div>
	</div><!--/.row-->
	<a href="<?= base_url().'laporanpdf/mobil';?>" class="btn btn-warning pull-right" >Print</a>
	<br/>
	<br>
	<div class="panel panel-info">
		<div class="panel-heading">
			<center>
				<li class="fa fa-pencil-square"> Data Mobil</li>
			</center>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<th>No</th>
					<th>Nama Mobil</th>
				</thead>
				<tbody>
					<?php 
					$no=1;
						foreach ($mobil as $m ) :?>
					<tr>
						<td><?php echo $no++?>.</td>
						<td><?= $m['nama_mobil']?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
			</div>
			</div>
			<a href="<?=base_url().'laporan/index';?>" class="btn btn-danger">Kembali</a>
	
</div>
