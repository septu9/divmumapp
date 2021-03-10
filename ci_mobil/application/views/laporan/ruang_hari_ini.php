<table><th><h4>Data Peminjaman Ruang Rapat</h4></th></table>
<table border="1" >
  <thead>
    <th>No</th>
    <th width="15%">Divisi</th>
    <th>Nama Lengkap</th>
    <th>Agenda Rapat</th>
    <th >Tanggal Booking</th>
    <th >Jam Booking</th>
    <th>Tanggal Selesai</th>
    <th >Jam Selesai</th>
    <th >Status</th>
  </thead>
  <tbody>
    <?php 
    $no=1;
    foreach ($booking as $bk ) :?>
      <tr>
        <td><?php echo $no++;?>.</td>
        <td><?= $bk['nama_divisi'];?></td>
        <td><?= $bk['nama_lengkap'];?></td>
        <td><?= $bk['agenda_meeting'];?></td>
        <td><?php $tanggal1 = $bk['tanggal_booking']; echo longdate_indo($tanggal1);?></td>
      </td>
      <td><?= $bk['waktu_booking'];?> 
      <td><?php $tanggal2 = $bk['tanggal_selesai']; echo longdate_indo($tanggal2);?></td>
      <td><?= $bk['waktu_selesai'];?> 
    </td>
    <td><?php echo $bk['status'];?></td>
  </tr>
<?php endforeach;?>
</tbody>
</table>