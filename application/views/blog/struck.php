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
                <?= $resi == null ? 'Data Tidak Ditemukan' : $resi['id_pesanan'] ?>
              </div>
            </div><br>
            <!-- /.logo & barcode-->
            <div class="pl-2 card">
              <h5>PENGIRIM</h5>
              <div class="row">
                <div class="col-5">NAMA</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['nm_pengirim'] ?></div>
              </div>
              <div class="row">
                <div class="col-5">ALAMAT</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['alamat_pengirim'] ?></div>
              </div>
              <div class="row">
                <div class="col-5">NOMOR HP</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['no_HP_pengirim'] ?></div>
              </div>
              <div class="row">
                <div class="col-5">KETERANGAN ALAMAT</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['ket_alamat_pengirim'] ?></div>
              </div>
              <div class="row">
                <div class="col-5">NOMOR REKENING</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['no_rek'] ?></div>
              </div>
            </div><br>
          </div>
          <div class="col-sm-6">
            <div class="pl-2 card">
              <h5>Penerima</h5>
              <div class="row">
                <div class="col-5">NAMA</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['nm_penerima'] ?></div>
              </div>
              <div class="row">
                <div class="col-5">ALAMAT</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['alamat_penerima'] ?></div>
              </div>
              <div class="row">
                <div class="col-5">NOMOR HP</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['no_HP_penerima'] ?></div>
              </div>
              <div class="row">
                <div class="col-5">KETERANGAN ALAMAT</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['ket_alamat_penerima'] ?></div>
              </div>
            </div><br>
            <div class="pl-2 card ">
              <h5>DESKRIPSI PENGIRIMAN</h5>
              <div class="row">
                <div class="col-5">KETERANGAN BARANG</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : $resi['ket_barang'] ?></div>
              </div>
              <div class="row">
                <div class="col-5">HARGA BARANG</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : 'Rp. ' . number_format($resi['harga_barang'], 0, ',', '.') ?></div>
              </div>
              <div class="row">
                <div class="col-5">BERAT BARANG</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : 'Rp. ' . number_format($resi['berat_barang'], 0, ',', '.') ?></div>
              </div>
              <div class="row">
                <div class="col-5">ONKIR</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : 'Rp. ' . number_format($resi['onkir'], 0, ',', '.') ?></div>
              </div>
              <div class="row">
                <div class="col-5">STATUS</div>
                <div class="col-7"><?php
                                    if ($resi == null) {
                                      echo 'Data Tidak Ditemukan';
                                    } else {
                                      switch ($resi['status']) {
                                        case 1:
                                          echo 'pending';
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
                                      }
                                    }
                                    ?>
                </div>
              </div>
              <div class="row">
                <div class="col-5">JENIS ANTAR</div>
                <div class="col-7"><?= $resi == null ? 'Data Tidak Ditemukan' : ($resi['jenis_antar'] == 'E' ? 'EKSPEDISI' : 'EKSPRESS') ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- /.card-body -->
</section>