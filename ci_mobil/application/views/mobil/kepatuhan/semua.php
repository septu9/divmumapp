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
      <div class="panel-heading"><center>
        <li class="fa fa-table"></li>
      Table Booking Mobil</center></div>
      
      <div class="panel-body btn-margins">
       <div class="col-md-12">
        <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead>
          <tr>
           <th>No</th>
           <th width="15%">Divisi</th>
           <th>Nama Lengkap</th>
           <th>Tujuan</th>
           <th >Tanggal Booking</th>
           <th >Jam Booking</th>
           <th>Tanggal Selesai</th>
           <th >Jam Selesai</th>
           <th >Status</th>
           
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
           <td><?= $b['tujuan'];?></td>
           <td><?php $tanggal1 = $b['tanggal_booking']; echo longdate_indo($tanggal1);?>
         </td>
         <td><?= $b['waktu_booking'];?> 
         <td><?php $tanggal2 = $b['tanggal_selesai']; echo longdate_indo($tanggal2);?>
       </td>
       <td><?= $b['waktu_selesai'];?> 
     </td>
     <td class="<?php if(empty($b['status'])) echo 'kosong';
     elseif ($b['status'] == 'Disetujui' ){echo "Disetujui";}
     elseif ($b['status'] == 'Ditolak' ) {echo "Ditolak";}?>">
     <?php if(empty($b['status'])) echo 'kosong';
     elseif ($b['status'] == 'Disetujui' ){echo "Disetujui";}
     elseif ($b['status'] == 'Ditolak' ) {echo "Ditolak";}?>
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