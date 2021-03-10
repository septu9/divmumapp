 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
 
 <style>
 .baten {
  float: right;
}
.baten1 {
  float: right;
  margin-right: 5px;
}

.tambahdatauser {
  float: right;
  margin-bottom: 10px;
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

</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="#">
        <em class="fa fa-building"></em>
      </a></li>
      <li class="active">User</li>
    </ol>
  </div><!--/.row-->
  <div class="row">
    <div class="col-lg-12">
      <h2 class="page-header">User</h2>
        <a href= "<?=base_url().'akunadmin/tambahdatauser';?>" class="btn btn-warning">Tambah User</a>
        <p></p>

    <?php if ( $this->session->flashdata('flash')): ?> 
      <div class="alert bg-teal" role="alert"><em class="fa fa-check">&nbsp;</em> Data User <?= $this->session->flashdata('flash'); ?><button type="button" class="close" data-dismiss="alert" onclick="this.parentElement.style.display='none';" aria-hidden="true">×</button></div>
    <?php endif; ?>
    <div class="panel panel-info">
      <div class="panel-heading"><center>
        <li class="fa fa-table"></li>
      Table User</center></div>
      
      <div class="panel-body btn-margins">
        <div class="col-md-12">
         <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Divisi</th>
              <th>Alamat</th>
              <th>Alat</th>
              
            </tr>
          </thead>
          <tbody>
           <?php
           $no=1;
           foreach ($datauser as $b) :?>
            <tr>
              <td><?php echo $no++;?>.</td>
              <td><?= $b['nama_lengkap'];?></td>
              <td><?= $b['email'];?></td>
              <td><?= $b['telepon'];?>
              <td><?= $b['nama_divisi'];?></td>
              <td><?= $b['alamat'];?></td>  
              <td>
                <a href="<?= base_url(); ?>akunadmin/hapus/<?= $b['id'] ?> " class="btn btn-sm btn-danger btn-circle " onclick="return confirm('Yakin data akan dihapus?');" ><li class="fa  fa-trash"></li> </a>
                
                <a href="<?= base_url(); ?>akunadmin/ubah/<?= $b['id'] ?> " class="btn btn-sm btn-success btn-circle "><li class="fa fa-pencil"></li></a>

                <a href="<?= base_url(); ?>akunadmin/detail/<?= $b['id'] ?> " class="btn btn-sm btn-info btn-circle "><li class="fa fa-book"></li></a>
                
                
              </td>
              


            </div>
            
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div><!-- /.panel-->
</td>
</tr>
</tbody>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#table_id').DataTable();
  } );
</script>