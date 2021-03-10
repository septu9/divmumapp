<table><th><h4>Data Peminjaman Mobil</h4></th></table>
<table border="1" >
        <thead>
              <th width="5%">No</th>
              <th>Nama Divisi</th>
                <th>Nama Lengkap</th>
                <th>Nama Mobil</th>
                <th>Tanggal Pemesanan</th>
                <th>Waktu Pemesanan</th>
                <th>Tanggal Selesai</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
        </thead>
        <tbody>
          <?php 
          $no=1;
            foreach ($booking as $bk ) :?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $bk['nama_divisi']; ?></td>
              <td><?php echo $bk['nama_lengkap'] ?></td>
              <td><?php echo $bk['nama_mobil']; ?></td>
              <td><?php $tanggal1 = $bk['tanggal_booking']; echo longdate_indo($tanggal1);?></td>
              <td><?php echo $bk['waktu_booking'];?></td>
              <td><?php $tanggal2 = $bk['tanggal_selesai']; echo longdate_indo($tanggal2);?>
              <td><?php echo $bk['waktu_selesai'];?></td>
              <td><?php echo $bk['status'];?></td>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>