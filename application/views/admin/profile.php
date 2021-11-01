<section class="content">
  <div class="container-fluid">

    <div class="row gutters-sm">

      <!-- USER CARD -->
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="http://placehold.it/150x100" class="card-img-top img-fluid" alt="ini foto">

              <div class="mt-3">
                <h4><?= $user['username'] ?></h4>
                <p class="text-secondary mb-1"><?= $user['email'] ?></p>
                <p class="text-muted font-size-sm">Akun dibuat pada <?= date('d-m-Y', $user['date_create'])  ?></p>
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#editPass">Ganti Password</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END USER CARD -->

      <!-- PROFILE -->
      <div class="col-md-8">
        <div class="card card-primary mb-3">
          <div class="card-header py-3">
            <h3 class="card-title"><i class="fas fa-user mr-1"></i>Profil</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Username</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $user['username'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $user['email'] ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Role</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?= $user['level'] == 1 ? 'Admin' : 'Kurir' ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <a href="<?= base_url('kurir/editProfile') ?>" class="btn btn-warning py-2"><i class="fas fa-edit"></i> Edit Profile</a>
            </div>
          </div>
        </div>
      </div>
      <!-- END PROFILE -->

    </div>
  </div>
  <div class="row">
    <!-- tambah modal  -->
    <div class="modal fade" id="editPass" tabindex="-1" aria-labelledby="edit_SiswaLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_SiswaLabel">Ganti Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="mb-3">
                <strong>Password Baru</strong>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Password</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="password" class="form-control <?= form_error('password1') != null ? "is-invalid" : "" ?>" name="password1" id="password1" placeholder="Masukkan Password Baru Anda" value="<?= set_value('password1') ?>">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label>Konfirmasi Password</label>
                </div>
                <div class="col-sm-10">
                  <div class="form-group">
                    <input type="password" class="form-control<?= form_error('password2') != null ? "is-invalid" : "" ?>" name="password2" id="password2" placeholder="Konfirmasi Password Baru Anda">
                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <input type="submit" name="tambahModal" class="btn bg-danger" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>