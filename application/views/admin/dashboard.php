<!-- Main content -->
<section class="content" id="container">
  <div class="container-fluid">
    <div class="row mb-2">
      <?php foreach ($resi as $r) : ?>
        <div class="col-sm-6">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Title</h3>

              <div class="card-tools">
                <a href="<?= base_url('kurir/struck/' . $r['id_pesanan']) ?>" class="btn btn-tool" data-toggle="tooltip" title="Detail">
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
              <?php if ($title == 'Dashboard' and $r != null) : ?>
                <Strong>status : <?php switch ($r['status']) {
                                    case 1:
                                      echo 'Pending';
                                      break;
                                    case 2:
                                      echo 'Diterima Kantor';
                                      break;
                                    case 3:
                                      echo 'Dalam Pengiriman';
                                      break;
                                    case 4:
                                      echo 'Pengiriman Sukses';
                                      break;
                                    default:
                                      null;
                                  }
                                  echo '</Strong>';
                                endif; ?>
                <a href="<?= base_url('kurir/struck/' . $r['id_pesanan']) ?>" class="btn btn-primary float-right">Detail</a>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.coloumn -->
      <?php endforeach ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container fluid -->

</section>
<!-- /.content -->