<!-- Main content -->
<section class="content" id="container">
  <div class="container-fluid">
    <div class="card card-primary">
      <!-- /.card-header -->
      <div class="card-header">
        <h3 class="card-title">Daftar Seluruh Paket</h3>
      </div>
      <div class="card-body">
        <a href="<?= base_url('kurir/tambahPesanan') ?>" class="mb-5 btn btn-primary">Tambah Pengiriman Paket</a>
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('message1'); ?>
        <table id="Tables" class="table table-bordered table-striped" style="width: 100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pengirim</th>
              <th>Alamat Pengirim</th>
              <th>No HP Pengirim</th>
              <th>Nama Penerima</th>
              <th>Alamat Penerima</th>
              <th>No HP Penerima</th>
              <th>Keterangan barang</th>
              <th>Harga barang</th>
              <th>Berat barang</th>
              <th>Onkir</th>
              <th>Jenis Antar</th>
              <th>Rekening Talangan</th>
              <th>Tanggal Dibuat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($resi as $R) : ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $R['nm_pengirim'] ?></td>
                <td><?= $R['alamat_pengirim'] ?></td>
                <td><?= $R['no_HP_pengirim'] ?></td>
                <td><?= $R['nm_penerima'] ?></td>
                <td><?= $R['alamat_penerima'] ?></td>
                <td><?= $R['no_HP_penerima'] ?></td>
                <td><?= $R['ket_barang'] ?></td>
                <td><?= $R['harga_barang'] ?></td>
                <td><?= $R['berat_barang'] ?> KG</td>
                <td><?= $R['ongkir'] ?></td>
                <td><?= $R['jenis_antar'] == 'E' ? 'Ekspedisi' : '' ?></td>
                <td><?= $R['no_rek'] == null ? '-' : $R['bank'] . ', ' . $R['no_rek'] . ', ' . $R['atas_nama'] ?></td>
                <td><?= date('d-m-Y', $R['date_created']) ?></td>
                <td>
                  <!-- <a href="#" data-url="<?= base_url('kurir/delete_resi/' . $R['id_pesanan']) ?>" class="btn btn-danger">Hapus</a> -->
                  <a href="<?= base_url('kurir/edit_resi/' . $R['id_pesanan']) ?>" class="btn btn-warning">Edit</a>
                  <a href="<?= base_url('kurir/struck/' . $R['id_pesanan']) ?>" class="btn btn-primary">Detail</a>
                </td>
              </tr>
            <?php $i++;
            endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No</th>
              <th>Nama Pengirim</th>
              <th>Alamat Pengirim</th>
              <th>No HP Pengirim</th>
              <th>Nama Penerima</th>
              <th>Alamat Penerima</th>
              <th>No HP Penerima</th>
              <th>Keterangan barang</th>
              <th>Harga barang</th>
              <th>Berat barang</th>
              <th>Onkir</th>
              <th>Jenis Antar</th>
              <th>Rekening Talangan</th>
              <th>Tanggal Dibuat</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- /.container fluid -->

</section>
<!-- /.content -->