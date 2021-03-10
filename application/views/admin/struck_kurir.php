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
                <p class="text-center">
                  <?= $resi == null ? 'Data Tidak Ditemukan' : $resi['id_pesanan'] ?>
                </p>
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
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : "Rp. " . number_format($resi['harga_barang'], 0, ',', '.') ?></div>
              </div>
              <div class="row">
                <div class="col-4">BIAYA ONKIR</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : 'Rp. ' . number_format($resi['onkir'], 0, ',', '.') ?></div>
              </div>
              <div class="row">
                <div class="col-4">JENIS ANTAR</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : ($resi['jenis_antar'] == 'E' ? 'EKSPEDISI' : 'EKSPRESS') ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <?php if ($resi != null) { ?>
      <form action="" method="POST">
        <div class="row">
          <div class="col-6">
            <div class="form-check-inline">
              <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="radio1" name="changeStatus" value="1" <?= $resi['status'] == 1 ? 'checked' : '' ?>>pending
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label" for="radio2">
                <input type="radio" class="form-check-input" id="radio2" name="changeStatus" value="2" <?= $resi['status'] == 2 ? 'checked' : '' ?>>Diterima Kantor
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label" for="radio3">
                <input type="radio" class="form-check-input" id="radio3" name="changeStatus" value="3" <?= $resi['status'] == 3 ? 'checked' : '' ?>>Dalam Pengiriman
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label" for="radio4">
                <input type="radio" class="form-check-input" id="radio4" name="changeStatus" value="4" <?= $resi['status'] == 4 ? 'checked' : '' ?>>Pengiriman Sukses
              </label>
            </div>
          </div>
          <div class="col-6 text-right">
            <button type="submit" class="btn btn-primary">KONFIRMASI</button>
          </div>
        </div>
      </form>
    <?php } ?>
  </div>
  <!-- /.card-body -->
</section>