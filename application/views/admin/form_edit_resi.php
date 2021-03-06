<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Masukkan Deskripsi Pengiriman</h3>
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <form role="form" action="" method="POST">
          <?= $this->session->flashdata('message'); ?>
          <!-- section -->
          <div class="mb-3">
            <strong>Pengirim</strong>
          </div>
          <!-- isi section -->
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Pengirim</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_pengirim') != null ? "is-invalid" : "" ?>" name="nm_pengirim" id="nm_pengirim" placeholder="Isi Nama Pengirim" value="<?= set_value('nm_pengirim') != null ? set_value('nm_pengirim') : $resi['nm_pengirim'] ?>">
                <?= form_error('nm_pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Alamat Pengirim</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('alamat_pengirim') != null ? "is-invalid" : "" ?>" name="alamat_pengirim" id="alamat_pengirim" placeholder="Isi Alamat Pengirim" value="<?= set_value('alamat_pengirim') != null ? set_value('alamat_pengirim') : $resi['alamat_pengirim'] ?>">
                <?= form_error('alamat_pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor HP Pengirim</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="number" class="form-control <?= form_error('no_pengirim') != null ? "is-invalid" : "" ?>" name="no_pengirim" id="no_pengirim" placeholder="Isi Nomor HP Pengirim" value="<?= set_value('no_pengirim') != null ? set_value('no_pengirim') : $resi['no_HP_pengirim'] ?>">
                <?= form_error('no_pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Ancer-Ancer Alamat Pengirim</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="ancer_pengirim" id="ancer_pengirim" placeholder="Isi Ancer-Ancer Alamat Pengirim" value="<?= set_value('ancer_pengirim') != null ? set_value('ancer_pengirim') : $resi['ket_alamat_pengirim'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor Rekening</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('bank') != null ? "is-invalid" : "" ?>" name="bank" id="bank" placeholder="Isi Nama Bank Jika Butuh Ditalangi" value="<?= set_value('bank') != null ? set_value('bank') : $resi['bank'] ?>">
                <?= form_error('bank', '<small class="text-danger pl-3">', '</small>'); ?>
                <input type="number" class="form-control" name="no_rek" id="no_rek" placeholder="Isi No. Rekening Jika Butuh Ditalangi" value="<?= set_value('no_rek') != null ? set_value('no_rek') : $resi['no_rek'] ?>">
                <input type="text" class="form-control <?= form_error('atas_nama') != null ? "is-invalid" : "" ?>" name="atas_nama" id="atas_nama" placeholder="Isi Nama Pada No. Rekening Jika Butuh Ditalangi" value="<?= set_value('atas_nama') != null ? set_value('atas_nama') : $resi['atas_nama'] ?>">
                <?= form_error('atas_nama', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <hr>

          <!-- section -->
          <div class="mb-3">
            <strong>Penerima</strong>
          </div>
          <!-- isi section -->
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Penerima</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('nm_penerima') != "" ? "is-invalid" : "" ?>" name="nm_penerima" id="nm_penerima" placeholder="Isi Nama Penerima" value="<?= set_value('nm_penerima') != null ? set_value('nm_penerima') : $resi['nm_penerima'] ?>">
                <?= form_error('nm_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Alamat Penerima</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('alamat_penerima') != "" ? "is-invalid" : "" ?>" name="alamat_penerima" id="alamat_penerima" placeholder="Isi Alamat Penerima" value="<?= set_value('alamat_penerima') != null ? set_value('alamat_penerima') : $resi['alamat_penerima'] ?>">
                <?= form_error('alamat_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor HP Penerima</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="number" class="form-control <?= form_error('no_penerima') != "" ? "is-invalid" : "" ?>" name="no_penerima" id="no_penerima" placeholder="Isi Nomor HP Penerima" value="<?= set_value('no_penerima') != null ? set_value('no_penerima') : $resi['no_HP_penerima'] ?>">
                <?= form_error('no_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Ancer-Ancer Alamat Penerima</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="ancer_penerima" id="ancer_penerima" placeholder="Isi Ancer-Ancer Alamat Penerima" value="<?= set_value('ancer_penerima') != null ? set_value('ancer_penerima') : $resi['ket_alamat_penerima'] ?>">
              </div>
            </div>
          </div>
          <hr>

          <!-- section -->
          <div class="mb-3">
            <strong>Deskripsi</strong>
          </div>
          <!-- isi section -->
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor Resi</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="id" id="id" value="<?= $resi['id_pesanan'] ?>" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Keterangan Barang</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control <?= form_error('ket_barang') != "" ? "is-invalid" : "" ?>" name="ket_barang" id="ket_barang" placeholder="Isi Barang Dalam Paket" value="<?= set_value('ket_barang') != null ? set_value('ket_barang') : $resi['ket_barang'] ?>">
                <?= form_error('ket_barang', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Harga Barang</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="number" class="form-control <?= form_error('harga') != "" ? "is-invalid" : "" ?>" name="harga" id="harga" placeholder="Isi Harga Barang Dalam Paket" value="<?= set_value('harga') != null ? set_value('harga') : $resi['harga_barang'] ?>">
                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Berat Barang</label>
            </div>
            <div class="col-8">
              <div class="form-group">
                <input type="number" class="form-control <?= form_error('berat') != "" ? "is-invalid" : "" ?>" name="berat" id="berat" max="999" placeholder="Isi Berat Barang/Paket" value="<?= set_value('berat') != null ? set_value('berat') : $resi['berat_barang'] ?>">
                <?= form_error('berat', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-2">
              <p class="pt-1">KG</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Ongkir</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="number" class="form-control" name="ongkir" id="ongkir" value="<?= set_value('ongkir') != null ? set_value('ongkir') : $resi['ongkir'] ?>" readonly>
              </div>
            </div>
          </div>

          <hr>
          <div class="row">
            <div class="col-8">
              <!-- captcha -->
              <!-- <div class="g-recaptcha" data-sitekey="isi_dengan_site_key_nya"></div> -->
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>