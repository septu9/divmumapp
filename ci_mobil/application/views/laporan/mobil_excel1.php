<table><th><h4>Data Siswa</h4></th></table>
<table border="1" >
        <thead>
          <th>No</th>
          <th>Nama Mobil</th>
        </thead>
        <tbody>
          <?php 
          $no=1;
            foreach ($mobil as $m ) :?>
          <tr>
            <td><?php echo $no++?>.</td>
            <td><?= $m['nama_mobil']?></td>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>