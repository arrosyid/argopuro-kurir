<!-- general form elements disabled -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Masukkan Deskripsi Pengiriman</h3>
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form role="form" action="" method="POST">
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
                <input type="text" class="form-control" name="nomor_resi" id="nomor_resi" value="Nomor Resi" disabled>
              </div>
            </div>
          </div>
          <?= form_error('ket_barang', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="row">
            <div class="col-sm-2">
              <label>Keterangan Barang</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="text" class="form-control" name="ket_barang" id="ket_barang" placeholder="Isi Barang Dalam Paket">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>Harga Barang</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <input type="number" class="form-control" name="harga" id="harga" placeholder="Isi Harga Barang Dalam Paket">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
              <label>ongkir</label>
            </div>
            <div class="col-sm-10">
              <div class="form-group">
                <p>Rp. 6000</p>
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