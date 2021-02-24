<div class="card-body">
  <p class="login-box-msg">login untuk memulai</p>

  <?= $this->session->flashdata('message') ?>

  <form action="<?= base_url('auth') ?>" method="post">
    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="input-group mb-3">
      <input type="text" id="email" name="email" class="form-control" placeholder="email" value="<?= set_value('email'); ?>">
      <div class=" input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
    </div>
    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
    <div class="input-group mb-3">
      <input type="password" name="password" id="password" class="form-control" placeholder="Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <p class="mb-1">
    <a href="#">Lupa Password</a>
  </p>
  <p class="mb-0">
    <a href="<?= base_url('auth/registrasi') ?>" class="text-center">daftar anggota baru</a>
  </p>
</div>
<!-- /.card-body -->