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
    <div class="panel-heading"><center>
      <li class="fa fa-table"></li>
    Table Booking Ruang Rapat</center></div>
    <div class="panel-body btn-margins">
     <div class="col-md-12">
      <table class="table table-bordered">
       <thead>
        <tr>
         <th>No</th>
         <th>Divisi</th>
         <th>Penanggung Jawab</th>
         <th>Agenda Rapat</th>
         <th>Tanggal Booking</th>
         <th>Jam Booking</th>
         <th>Tanggal Selesai</th>
         <th>Jam Selesai</th>
         <th>Status</th>
       </tr>
     </thead>
     <tbody>
      <?php
      $no=1;
      foreach ($detail as $b) :?>
        <tr>
         <td><?php echo $no++;?>.</td>
         <td><?= $b['nama_divisi'];?></td>
         <td><?= $b['nama_lengkap'];?></td>
         <td><?= $b['agenda_meeting'];?></td>
         <td><?php $tanggal1 = $b['tanggal_booking']; echo longdate_indo($tanggal1);?>
       </td>
       <td><?= $b['waktu_booking'];?> 
       <td><?php $tanggal2 = $b['tanggal_selesai']; echo longdate_indo($tanggal2);?>
     </td>
     <td><?= $b['waktu_selesai'];?> 
   </td>
   <td><?= $b['status'];?></td>
   
 </td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<a href="<?= base_url(); ?>ruangrapat/admin/table" class="btn btn-warning">Kembali</a>
</div>
</div>
</div>
</div>

