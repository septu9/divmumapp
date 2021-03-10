<style>
.baten {
	float: right;
	margin-right: 5px;
}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?=base_url();?>keuangan/index">
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
				Form Booking Mobil
			</center>
		</div>
		<div class="panel-body">
			<fieldset>
				<form class="form-horizontal" action="<?php echo base_url().'mobil/keuangan/keuangan' ?>" method="post">
					<div class="form-group">
						<label class="col-md-2 control-label" for="id_divisi"></label>
						<div class="col-md-10">
							<input id="id_divisi" name="id_divisi" type="hidden" value="<?=$id_divisi;?>" placeholder="" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="nama_lengkap">Divisi</label>
						<div class="col-md-10">
							<input id="divisi" name="" type="text" value="Keuangan dan Umum" placeholder="" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="nama_lengkap">Nama Lengkap</label>
						<div class="col-md-10">
							<input id="nama_lengkap" name="nama_lengkap" type="text" value="<?=$user;?>" placeholder="" class="form-control" readonly>
							<br/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="tujuan">Tujuan</label>
						<div class="col-md-10">
							<textarea class="form-control" id="message" name="tujuan" placeholder="Tujuan" rows="5"></textarea>
							<br>
							<small><?= form_error('tujuan');?></small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="mobil">Mobil</label>
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
							<input id="tglawal" name="tglawal" type="date" placeholder="" class="form-control">
							<br>
							<small><?= form_error('tglawal');?></small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="nama_divisi">Waktu Peminjaman</label>
						<div class="col-md-10">
							<input id="waktuawal" name="waktuawal" type="time" placeholder="" class="form-control">
							<br>
							<small><?= form_error('waktuawal');?></small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="nama_divisi">Tanggal Selesai</label>
						<div class="col-md-10">
							<input id="tglakhir" name="tglakhir" type="date" placeholder="" class="form-control">
							<br>
							<small><?= form_error('tglakhir');?></small>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="nama_divisi">Waktu Selesai</label>
						<div class="col-md-10">
							<input id="waktuakhir" name="waktuakhir" type="time" placeholder="" class="form-control">
							<br>
							<small><?= form_error('waktuakhir');?></small>
						</div>
					</div>
					
					
					<!-- Form actions -->
					<div class="form-group">
						<div class="col-md-12 widget-right">
							<button type="submit" class="btn btn-primary btn-md pull-right">Booking</button>
							<div class="baten">
									<a href="<?= base_url(); ?>mobil/keuangan/index" class="btn btn-warning">Kembali</a>
								</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div><!--/.col-->


</fieldset>
</form>
</div>
</div>
      </div><!--/.col-->