<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <!-- Default box -->
        <?php foreach ($resi as $r) : ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Title</h3>

              <div class="card-tools">
                <a href="<?= $r != null ? base_url('kurir/struck/' . $r['id_pesanan']) : '#' ?>" class="btn btn-tool" data-toggle="tooltip" title="Detail">
                  <i class="fas fa-share-square"></i></a>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url() ?>assets/img/logo.png" alt="logo Argopuro Kurir" class="img-fluid">
                </div>
                <div class="col-sm-9">
                  <h5>PENERIMA</h5>
                  <div class="row">
                    <div class="col-5">NAMA</div>
                    <div class="col-7"><?= $r == null ? 'Data Tidak Ditemukan' : $r['nm_penerima'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">ALAMAT</div>
                    <div class="col-7"><?= $r == null ? 'Data Tidak Ditemukan' : $r['alamat_penerima'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">NOMOR HP</div>
                    <div class="col-7"><?= $r == null ? 'Data Tidak Ditemukan' : $r['no_HP_penerima'] ?></div>
                  </div>
                  <div class="row">
                    <div class="col-5">KET ALAMAT</div>
                    <div class="col-7"><?= $r == null ? 'Data Tidak Ditemukan' : $r['ket_alamat_penerima'] ?></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?= $r != null ? base_url('kurir/struck/' . $r['id_pesanan']) : '#' ?>" class="btn btn-primary float-right">Detail</a>
            </div>
          </div>
        <?php endforeach ?>
        <!-- /.card -->
      </div>
      <!-- /.coloumn -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container fluid -->

</section>
<!-- /.content -->