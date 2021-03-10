 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
 <style>

 .baten {
  float: right;
  margin-right: 12px;
  margin-bottom: 10px;
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
    .cari{

      margin-top: 20px;
      margin-bottom: 20px;
      border: 1px solid #000;
      border-radius: 3px;
    }
    .cari input[type="text"]{
      width: 97%;
      font-size: 15px;
      font-weight: 500;    
      margin-top: 30px;
      margin-bottom: 20px;
      float: right;
      padding: 10px;
    }
    .cari button{
      margin-top: 30px;
      margin-bottom: 20px;
      margin-right: 10px;
      color: white;
      background-color: green;
      width: 70px;
    }

  </style>

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-building"></em>
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
      <div class="alert bg-teal" role="alert"><em class="fa fa-check">&nbsp;</em> Data Peminjaman Berhasil <?= $this->session->flashdata('flash'); ?><button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
    <?php endif; ?>
    <?php if (empty($booking)) : ?>
      <div class="alert bg-danger" role="alert"><em class="fa fa-warning">&nbsp;</em> Data Peminjaman tidak ditemukan <button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
    <?php endif; ?>
    <div class="panel panel-info">
      <div class="panel-heading"><center>
        <li class="fa fa-table"></li>
      Table Peminjaman Mobil</center></div>
      <div class="panel-body btn-margins">
        <div class="col-md-12">
          <br>
          <table id="table_id" class="table table-striped table-bordered" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Divisi</th>
                <th>Nama Lengkap</th>
                <th>Tujuan</th>
                <th>Tanggal Pemesanan</th>
                <th>Waktu Pemesanan</th>
                <th>Tanggal Selesai</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
                <th>Beri Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php $no=1; foreach($booking as $bk) :?>
             
             <tr>
              <th><?php echo $no++; ?>.</th>
              <td><?php echo $bk['nama_divisi']; ?></td>
              <td><?php echo $bk['nama_lengkap'] ?></td>
              <td><?php echo $bk['tujuan']; ?></td>
              <td><?php $tanggal1 = $bk['tanggal_booking']; echo longdate_indo($tanggal1);?></td>
              <td><?php echo $bk['waktu_booking'];?></td>
              <td><?php $tanggal2 = $bk['tanggal_selesai']; echo longdate_indo($tanggal2);?>
              <td><?php echo $bk['waktu_selesai'];?></td>
              <td class="<?php if(empty($bk['status'])) echo 'kosong';
              elseif ($bk['status'] == 'Disetujui' ){echo "Disetujui";}
              elseif ($bk['status'] == 'Ditolak' ) {echo "Ditolak";}?>">
              <?php if(empty($bk['status'])) echo 'kosong';
              elseif ($bk['status'] == 'Disetujui' ){echo "Disetujui";}
              elseif ($bk['status'] == 'Ditolak' ) {echo "Ditolak";}?>
            </td>
            <td>
              <center>
                <a href="<?= base_url(); ?>mobil/status/ubah/<?= $bk['id_booking']; ?> " class="btn btn-sm btn-primary btn-circle ">Beri status</a>
              </center>
            </td>
            <td>
              <a href="<?= base_url(); ?>mobil/admin/hapus/<?= $bk['id_booking']; ?>" class="btn btn-sm btn-danger btn-circle " onclick="return confirm('Yakin data akan dihapus?');" ><li class="fa  fa-trash"></li> </a>
              <p></p>
              <a href="<?= base_url(); ?>mobil/admin/ubah/<?= $bk['id_booking']; ?>" class="btn btn-sm btn-success btn-circle "><li class="fa fa-pencil"></li> </a>
              <p></p>
              <a href="<?= base_url(); ?>mobil/admin/detail/<?= $bk['id_booking']; ?> " class="btn btn-sm btn-warning btn-circle "><li class="fa fa-list-alt"></li> </a>
              <p></p>
              
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- /.panel-->
   <!-- data table JS
    ============================================ -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
      $(document).ready( function () {
        $('#table_id').DataTable();
      } );
    </script>
    