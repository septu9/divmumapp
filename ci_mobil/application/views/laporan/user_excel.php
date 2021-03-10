<table><th><h4>Data User</h4></th></table>
<table border="1" >
        <thead>
              <th width="5%">No</th>
              <th width="30%">Nama</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Divisi</th>
              <th>Alamat</th>
        </thead>
        <tbody>
          <?php 
          $no=1;
            foreach ($user as $m ) :?>
          <tr>
            <td><?php echo $no++?></td>
            <td><?= $m['nama_lengkap'];?></td>
            <td><?= $m['email'];?></td>
            <td><?= $m['telepon'];?>
            <td><?= $m['nama_divisi'];?></td>
            <td><?= $m['alamat'];?></td>  
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>