<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Argopuro Kurir</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-2 mb-2 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>assets/dist/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Usaylatul Atiqah</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('kurir') ?>" class="nav-link 
                    <?php if ($title == 'Dashboard') echo 'active'; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('kurir') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Pengiriman</p>
              </a>
            </li>
          </ul>
          <!-- <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Pengiriman</p>
              </a>
            </li>
          </ul> -->
        </li>
        <li class="nav-header">RESI</li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('kurir/pending') ?>" class="nav-link 
                    <?php if ($title == 'pending') echo 'active'; ?>">
            <i class="nav-icon far fa-clock"></i>
            <p>pending</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('kurir/sent') ?>" class="nav-link 
                    <?php if ($title == 'Diterima Kantor') echo 'active'; ?>">
            <i class="nav-icon fas fa-truck-loading"></i>
            <p>Diterima Kantor</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('kurir/process') ?>" class="nav-link 
                    <?php if ($title == 'Dalam Proses') echo 'active'; ?>">
            <i class="nav-icon fas fa-paper-plane"></i>
            <p>Dalam Proses</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= $user['level'] == 1 ? base_url('admin') : base_url('kurir/success') ?>" class="nav-link 
                    <?php if ($title == 'Pengiriman Sukses') echo 'active'; ?>">
            <i class="nav-icon fas fa-tasks"></i>
            <p>Pengiriman Sukses</p>
          </a>
        </li>
        <li class="nav-header">Setting</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-id-card-alt"></i>
            <p>My Profile</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="<?= base_url() ?>auth/logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Keluar</p>
          </a>
        </li>
      </ul>
      </li>
      </ul>
    </nav>
  </div>
</aside>