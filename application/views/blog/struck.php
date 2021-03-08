<!-- general form elements disabled -->
<section class="pt-2 content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h5 class="card-title">RESI PENGIRIMAN BARANG</h5>
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <div class="row">
          <?= $this->session->flashdata('massage'); ?>
          <div class="col-sm-6">
            <!-- logo & barcode-->
            <div class="row pr-3">
              <div class="col-6 text-center">
                <img src="<?= base_url() ?>assets/img/logo.png" alt="logo argopuro kurir" class="img-fluid" width="60%">
              </div>
              <div class="card col-6">
                barcode
              </div>
            </div><br>
            <!-- /.logo & barcode-->
            <div class="pl-2 card">
              <h5>PENGIRIM</h5>
              <div class="row">
                <div class="col-4">NAMA</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['nm_pengirim'] ?></div>
              </div>
              <div class="row">
                <div class="col-4">ALAMAT</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['alamat_pengirim'] ?></div>
              </div>
              <div class="row">
                <div class="col-4">NOMOR HP</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['no_HP_pengirim'] ?></div>
              </div>
              <div class="row">
                <div class="col-4">KETERANGAN ALAMAT</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['ket_alamat_pengirim'] ?></div>
              </div>
              <div class="row">
                <div class="col-4">NOMOR REKENING</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['no_rek'] ?></div>
              </div>
            </div><br>
          </div>
          <div class="col-sm-6">
            <div class="pl-2 card">
              <h5>Penerima</h5>
              <div class="row">
                <div class="col-4">NAMA</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['nm_penerima'] ?></div>
              </div>
              <div class="row">
                <div class="col-4">ALAMAT</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['alamat_penerima'] ?></div>
              </div>
              <div class="row">
                <div class="col-4">NOMOR HP</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['no_HP_penerima'] ?></div>
              </div>
              <div class="row">
                <div class="col-4">KETERANGAN ALAMAT</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['ket_alamat_penerima'] ?></div>
              </div>
            </div><br>
            <div class="pl-2 card ">
              <h5>DESKRIPSI PENGIRIMAN</h5>
              <div class="row">
                <div class="col-4">KETERANGAN BARANG</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['ket_barang'] ?></div>
              </div>
              <div class="row">
                <div class="col-4">HARGA BARANG</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : 'Rp. ' . number_format($resi['harga'], 0, ',', '.') ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-6">
        status :
        <?php
        if ($resi == null) {
          echo 'Data Tidak Ditemukan';
        } else {
          switch ($resi['status']) {
            case 1:
              '<input type="radio" class="form-check-input" checked>pending';
              break;
            case 2:
              '<input type="radio" class="form-check-input" checked>Diterima Kantor';
              break;
            case 3:
              '<input type="radio" class="form-check-input" checked>Dalam Pengiriman';
              break;
            case 4:
              '<input type="radio" class="form-check-input" checked>Pengiriman Sukses';
              break;
          }
        }
        ?>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</section>