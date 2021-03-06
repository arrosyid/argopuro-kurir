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
            <strong>Penerima</strong>
          </div>
          <!-- isi section -->
          <?= form_error('nm_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Nama Penerima</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="nm_penerima" id="nm_penerima" placeholder="Isi Nama Penerima">
              </div>
            </div>
          </div>
          <?= form_error('alamat_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Alamat Penerima</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="alamat_penerima" id="alamat_penerima" placeholder="Isi Alamat Penerima">
              </div>
            </div>
          </div>
          <?= form_error('no_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Nomor HP Penerima</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="number" class="form-control" name="no_penerima" id="no_penerima" placeholder="Isi Nomor HP Penerima">
              </div>
            </div>
          </div>
          <?= form_error('ancer_penerima', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Ancer-Ancer Alamat Penerima</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="ancer_penerima" id="ancer_penerima" placeholder="Isi Ancer-Ancer Alamat Penerima">
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