		<style>
		.baten {
			float: right;
		}
		.baten1 {
			float: right;
			margin-right: 5px;
		}
	</style>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-building"></em>
				</a></li>
				<li class="active">Ruang Rapat</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Ruang Rapat</h2>
			</div>
		</div><!--/.row-->
		<div class="panel panel-info">
			<div class="panel-heading">
				<center>
					<li class="fa fa-pencil-square"></li>
					Form Ubah Data Booking Ruang Rapat
				</center>
			</div>
			<?php foreach($booking as $b):?>
				<div class="panel-body">
					<form class="form-horizontal" action="<?=base_url().'ruangrapat/keuangan/update';?>" method="post">
						<input type="hidden" name="id" value="<?= $b['id_booking']; ?>">
						<fieldset>
							<!-- Name input-->
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
								<label class="col-md-2 control-label" for="name">Nama Lengkap</label>
								<div class="col-md-10">
									<input id="nama_lengkap" name="nama_lengkap" type="text" value="<?=$user;?>" placeholder="" class="form-control" readonly>
									<br/>
									<small><?=form_error('waktu_booking');?> </small>
								</div>
							</div>
							
							<!-- Message body -->
							<div class="form-group">
								<label class="col-md-2 control-label" for="message">Agenda <br>Rapat</label>
								<div class="col-md-10">
									<textarea maxlength="50" class="form-control" id="message" name="agenda_meeting" placeholder="Agenda Rapat" rows="5" ></textarea>
									<br>
									<small><?= form_error('agenda_Rapat');?></small>
								</div>
							</div>
							<!-- Email input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="name">Tanggal Peminjaman</label>
								<div class="col-md-10">
									<input id="name" name="tanggal_booking" type="date" placeholder="Your name" class="form-control" value="<?=$b['tanggal_booking']; ?>">
									<br/>
									<small><?= form_error('tanggal_booking');?> </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="name">Waktu Peminjaman</label>
								<div class="col-md-10">
									<input id="name" name="waktu_booking" type="time" placeholder="Your name" class="form-control" value="<?= $b['waktu_booking']; ?>">
									<br/>
									<small><?=form_error('waktu_booking');?> </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="name">Tanggal Selesai</label>
								<div class="col-md-10">
									<input id="name" name="tanggal_selesai" type="date" placeholder="Your name" class="form-control" value="<?= $b['tanggal_selesai']; ?>">
									<br/>
									<small><?=form_error('tanggal_selesai');?> </small>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="name">Waktu Selesai</label>
								<div class="col-md-10">
									<input id="name" name="waktu_selesai" type="time" placeholder="Your name" class="form-control" value="<?= $b['waktu_selesai']; ?>">
									<br/>
									<small><?=form_error('waktu_selesai');?> </small>
								</div>
							</div>
						<?php endforeach?>
						<!-- Form actions -->

						<div class="form-group">
							<div class="col-md-12 widget-right">
								<div class="baten">
									<button type="submit" class="btn btn-success btn-md ">Booking</button></div>
									<div class="baten1">
										<a href="<?=base_url().'ruangrapat/keuangan/table'?>" class="btn btn-danger">Cancel</a>
									</div>
								</div>
							</div>

						</fieldset>
					</form>
				</div>
			</div>
			