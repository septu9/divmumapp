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
      <div class="panel panel-default ">
        <div class="panel-heading">
          Data Ruang Rapat
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
          <div class="panel-body timeline-container">
            <ul class="timeline">
              <li>
                <?php foreach($detail as $b) :?>
                  <div class="timeline-badge success"><i class="glyphicon glyphicon-briefcase"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h5 class="timeline-title">Divisi</h5>
                    </div>
                    <div class="timeline-body">
                      <h4> <?= $b['nama_divisi'];?></h4>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge primary"><i class="glyphicon glyphicon-user"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h5 class="timeline-title">Nama Lengkap</h5>
                    </div>
                    <div class="timeline-body">
                      <h4><?= $b['nama_lengkap'];?></h4>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge danger"><i class="glyphicon glyphicon-list"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h5 class="timeline-title">Agenda Rapat</h5>
                    </div>
                    <div class="timeline-body">
                      <h4> <?= $b['agenda_meeting'];?></h4>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge info"><i class="glyphicon glyphicon-calendar"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h5 class="timeline-title">Tanggal Peminjaman</h5>
                    </div>
                    <div class="timeline-body">
                      <h4><?php $tanggal1 = $b['tanggal_booking']; echo longdate_indo($tanggal1);?></h4>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge warning"><i class="glyphicon glyphicon-time"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h5 class="timeline-title">Waktu Peminjaman</h5>
                    </div>
                    <div class="timeline-body">
                      <h4> <?= $b['waktu_booking'];?></h4>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge info"><i class="glyphicon glyphicon-calendar"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h5 class="timeline-title">Tanggal Selesai</h5>
                    </div>
                    <div class="timeline-body">
                      <h4><?php $tanggal2 = $b['tanggal_selesai']; echo longdate_indo($tanggal2);?></h4>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge warning"><i class="glyphicon glyphicon-time"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h5 class="timeline-title">Waktu Selesai</h5>
                    </div>
                    <div class="timeline-body">
                      <h4><?= $b['waktu_selesai'];?> </h4>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-badge success"><i class="glyphicon glyphicon-ok"></i></div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h5 class="timeline-title">Status</h5>
                    </div>
                    <div class="timeline-body">
                      <h4><?= $b['status'];?></h4>
                    </div>
                  </div>
                </li>
              </ul>
            <?php endforeach;?>
            <a href="<?= base_url(); ?>ruangrapat/penghimpunan/table" class="btn btn-warning pull-right">Kembali</a>
            
          </div>
        </div>
      </div>
    </div>
    
    