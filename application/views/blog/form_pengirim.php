<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Masukkan Deskripsi Pengiriman</h3>
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <form role="form" action="" method="POST">
          <?= $this->session->flashdata('message1'); ?>
          <?= $this->session->flashdata('message2'); ?>
          <?= $this->session->flashdata('message3'); ?>
          <!-- section -->
          <div class="mb-3">
            <strong>Pengirim</strong>
          </div>
          <!-- isi section -->
          <?= form_error('nm_koperasi', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Pengirim</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="hidden" class="form-control" name="id_pengirim" id="id_pengirim">
                <input type="text" class="form-control" name="nm_pengirim" id="nm_pengirim" placeholder="Isi Nama Pengirim" value="<?= $simpanDataPengirim == null ? '' : $simpanDataPengirim['nm_pengirim'] ?>">
              </div>
            </div>
          </div>
          <?= form_error('alamat_pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Alamat Pengirim</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="alamat_pengirim" id="alamat_pengirim" placeholder="Isi Alamat Pengirim" value="<?= $simpanDataPengirim == null ? '' : $simpanDataPengirim['alamat_pengirim'] ?>">
              </div>
            </div>
          </div>
          <?= form_error('no_pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor HP Pengirim</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="no_pengirim" id="no_pengirim" placeholder="Isi Nomor HP Pengirim" value="<?= $simpanDataPengirim == null ? '' : $simpanDataPengirim['no_HP_pengirim'] ?>">
              </div>
            </div>
          </div>
          <?= form_error('ancer_pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Ancer-Ancer Alamat Pengirim</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="ancer_pengirim" id="ancer_pengirim" placeholder="Isi Ancer-Ancer Alamat Pengirim" value="<?= $simpanDataPengirim == null ? '' : $simpanDataPengirim['ket_alamat_pengirim'] ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor Rekening</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="number" class="form-control" name="no_rek" id="no_rek" placeholder="Isi No. Rekening Jika Butuh Ditalangi" value="<?= $simpanDataPengirim == null ? '' : $simpanDataPengirim['no_rek'] ?>">
              </div>
            </div>
          </div>
          <hr>
          <div class="col-5 float-right">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>