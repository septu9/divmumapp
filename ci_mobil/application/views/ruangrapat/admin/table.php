<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<style>
  .baten {
    float: right;
  }
  .baten1 {
    float: right;
    margin-right: 5px;
  }

.cari{
  width: 1055px;
  margin-top: 15px;
  margin-bottom: 10px;
  
  border-radius: 1px;
  float: right;
  margin-right: 19px;
  padding: 10px;
}
.cari input[type="text"]{
    font-size: 15px;
    font-weight: 500;
    background: #fff;
    color: #000;
  }

  .Disetujui{
  color:black;
  background-color: #90EE90;}

.Ditolak{
  color:white;
  background-color:#B22222;}

.kosong{
  color: white;
   background-color:white;}

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
    <?php if ( $this->session->flashdata('flash')): ?> 
    <div class="alert bg-teal" role="alert"><em class="fa fa-check">&nbsp;</em> Data Peminjaman Berhasil <?= $this->session->flashdata('flash'); ?><button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
    <?php endif; ?>
     <?php if (empty($booking)) : ?>
    <div class="alert bg-danger" role="alert"><em class="fa fa-warning">&nbsp;</em> Data Peminjaman tidak ditemukan <button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
     <?php endif; ?>
<div class="panel panel-info">
						<div class="panel-heading"><center>
						<li class="fa fa-table"></li>
						Table Peminjaman Ruang Meeting</center></div>
						<div class="panel-body btn-margins">
							<div class="col-md-12">
                <br>
							 <table id="table_id" class="table table-striped table-bordered" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th width="15%">Divisi</th>
											<th>Nama Lengkap</th>
                      <th>Agenda Rapat</th>
											<th >Tanggal Booking</th>
											<th >Jam Booking</th>
											<th>Tanggal Selesai</th>
											<th >Jam Selesai</th>
											<th >Status</th>
											<th>Keterangan</th>
											<th >Alat</th>
											
										</tr>
									</thead>
									<tbody>
									 <?php
                    						$no=1;
                   							foreach ($booking as $b) :?>
                      						<tr>
                                 				<td><?php echo $no++;?>.</td>
                                 				<td><?= $b['nama_divisi'];?></td>
                                 				<td><?= $b['nama_lengkap'];?></td>
                                        <td><?= $b['agenda_meeting'];?></td>
                                 				<td><?php $tanggal1 = $b['tanggal_booking']; echo longdate_indo($tanggal1);?></td>
                                 				</td>
                                 				<td><?= $b['waktu_booking'];?> 
                                 				<td><?php $tanggal2 = $b['tanggal_selesai']; echo longdate_indo($tanggal2);?></td>
                                 				<td><?= $b['waktu_selesai'];?> 
                                 				</td>
                                 				<td class="<?php if(empty($b['status'])) echo 'kosong';
                        elseif ($b['status'] == 'Disetujui' ){echo "Disetujui";}
                        elseif ($b['status'] == 'Ditolak' ) {echo "Ditolak";}?>">
                         <?php if(empty($b['status'])) echo 'kosong';
                        elseif ($b['status'] == 'Disetujui' ){echo "Disetujui";}
                        elseif ($b['status'] == 'Ditolak' ) {echo "Ditolak";}?>
                                 				<td>
                                 					<center>
                                 					<a href="<?= base_url(); ?>ruangrapat/status/ubah/<?= $b['id_booking'] ?> " class="btn btn-sm btn-primary btn-circle ">Beri status</a>
                                 					</center>
                                 				</td>
                                 				<td>
                                 					<a href="<?= base_url(); ?>ruangrapat/admin/hapus/<?= $b['id_booking'] ?> " class="btn btn-sm btn-danger btn-circle " onclick="return confirm('Yakin data akan dihapus?');" ><li class="fa  fa-trash"></li> </a>
                                 					<p></p>
                                  					<a href="<?= base_url(); ?>ruangrapat/admin/ubah/<?= $b['id_booking'] ?> " class="btn btn-sm btn-success btn-circle "><li class="fa fa-pencil"></li> </a>
                                  					<p></p>
                                  					<a href="<?= base_url(); ?>ruangrapat/admin/detail/<?= $b['id_booking'] ?> " class="btn btn-sm btn-warning btn-circle "><li class="fa fa-list-alt"></li> </a>
                                  					<p></p>
                                  				</td>
                                  				


</div>
                                 			
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div><!-- /.panel-->
         
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>
