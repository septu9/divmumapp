<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<style>
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


    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"><center><i class="fa fa-table">
        Table Data Mobil</center></i>
      </div>
      <div class="panel-body">
        <fieldset>
          <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                <th>Action</th>
              </tr>
            </thead>
            <?php $no=1; foreach($booking as $bk) :?>
            <tbody>
              <tr>
                <th><?php echo $no++; ?>.</th>
                <td><?php echo $bk['nama_divisi']; ?></td>
                <td><?php echo $bk['nama_lengkap'];?></td>
                <td><?php echo $bk['tujuan']; ?></td>
                <td><?php $tanggal1 = $bk['tanggal_booking']; echo longdate_indo($tanggal1);?>
              </td>
              <td><?php echo $bk['waktu_booking']; ?></td>
              <td><?php $tanggal2 = $bk['tanggal_selesai']; echo longdate_indo($tanggal2);?>
            </td>
            <td><?php echo $bk['waktu_selesai']; ?></td>
            <td class="<?php if(empty($bk['status'])) echo 'kosong';
            elseif ($bk['status'] == 'Disetujui' ){echo "Disetujui";}
            elseif ($bk['status'] == 'Ditolak' ) {echo "Ditolak";}?>">
            <?php if(empty($bk['status'])) echo 'kosong';
            elseif ($bk['status'] == 'Disetujui' ){echo "Disetujui";}
            elseif ($bk['status'] == 'Ditolak' ) {echo "Ditolak";}?>
          </td>
          <td>
            <h4>
              <a href="<?= base_url(); ?>mobil/Kepatuhan/detail/<?= $bk['id_booking']; ?>"><span class="label label-info"><i class="fa fa-info"></i></span></a>
              <a href="<?= base_url(); ?>mobil/Kepatuhan/ubah/<?= $bk['id_booking']; ?>"><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
            </h4>
            
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
    $(document).ready( function () {
      $('#table_id').DataTable();
    } );
  </script>