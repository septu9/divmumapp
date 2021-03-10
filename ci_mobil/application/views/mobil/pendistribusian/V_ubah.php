<style>
.baten {
	float: right;
	margin-right: 5px;
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



	<div class="panel panel-info">
		<div class="panel-heading">
			<center>
				<li class="fa fa-pencil-square"></li>
				Form Ubah Booking Mobil
			</center>
		</div>
		<?php foreach ($booking as $b):?>
			<div class="panel-body">
				<fieldset>
					<form class="form-horizontal" action="<?php echo base_url().'mobil/pendistribusian/update' ?>" method="post">
						<fieldset>
							<!-- Name input-->
							<div class="form-group">
								<input type="hidden" name="id" value="<?=$b['id_booking'];?>">
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="id_divisi"></label>
								<div class="col-md-10">
									<input id="id_divisi" name="id_divisi" type="hidden" value="<?=$id_divisi;?>" placeholder="" class="form-control" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="nama_lengkap">Divisi</label>
								<div class="col-md-10">
									<input id="divisi" name="" type="text" value="Pendistribusian dan Pendayagunaan" placeholder="" class="form-control" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="nama_divisi">Nama Lengkap</label>
								<div class="col-md-10">
									<input id="nama_lengkap" name="nama_lengkap" type="text" value="<?=$user;?>" placeholder="" class="form-control" readonly>
									<br/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="nama_divisi">Tujuan</label>
								<div class="col-md-10">
									<textarea class="form-control" id="message" name="tujuan" placeholder="Tujuan" rows="5"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="nama_divisi">Mobil</label>
								<div class="col-md-10">
									<select class="form-control pull-right" name="mobil">
										<option>Pilih Mobil</option>
										<?php foreach($mobil as $m){ ?>
											<option value="<?php echo $m['id_mobil']; ?>"><?php echo $m['nama_mobil']; ?>   </option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="nama_divisi">Tanggal Peminjaman</label>
								<div class="col-md-10">
									<input id="tglawal" name="tglawal" type="date" value="<?= $b['tanggal_booking'];?>" placeholder="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="nama_divisi">Waktu Peminjaman</label>
								<div class="col-md-10">
									<input id="waktuawal" name="waktuawal" type="time" value="<?php echo $b['waktu_booking']; ?>" placeholder="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="nama_divisi">Tanggal Peminjaman</label>
								<div class="col-md-10">
									<input id="tglakhir" name="tglakhir" type="date" value="<?= $b['tanggal_selesai']; ?>"placeholder="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="nama_divisi">Waktu Peminjaman</label>
								<div class="col-md-10">
									<input id="waktuakhir" name="waktuakhir" type="time" value="<?php echo $b['waktu_selesai']; ?>" placeholder="" class="form-control">
								</div>
							</div>
						<?php endforeach;?>	
						
						<!-- Form actions -->
						<div class="form-group">
							<div class="col-md-12 widget-right">
								<button type="submit" class="btn btn-primary btn-md pull-right">Submit</button>
								<div class="baten">
									<a href="<?= base_url(); ?>mobil/pendistribusian/table" class="btn btn-warning">Kembali</a>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
					</div><!--/.col-->