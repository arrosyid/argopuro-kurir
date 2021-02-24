<div class="card-body">
  <p class="login-box-msg">Pulihkan Password anda</p>
  <?= $this->session->flashdata('message'); ?>
  <form action="" role="form" id="recoverForm" method="post">
    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
    <div class="input-group mb-3">
      <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="input-group mb-3">
      <input type="password" id="password2" name="password2" class="form-control" placeholder="konfirmasi Password">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block">Ganti password</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <p class="mt-3 mb-1">
    <a href="<?= base_url() ?>">Login</a>
  </p>
</div>
<!-- /.login-card-body -->