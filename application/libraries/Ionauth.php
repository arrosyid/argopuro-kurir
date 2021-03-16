<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('test_method')) {
  class Ionauth
  {
    public function verified_access($public = false)
    {
      // menampung sesi login level user
      $level = null;

      // jika sudah ada session login maka simpan level login
      if (isset($_SESSION['level'])) {
        $level = $_SESSION['level'];
      }

      // jika level 1 diarahkan ke admin
      if ($level == 1) {
        redirect('admin');
      }

      // jika level 2 diarahkan ke user
      if ($level == 2) {
        redirect('kurir');
      }

      // jika level null/kosong/belum login
      if ($level == null || $level == '') {
        // jika ingin mengakses halaman admin/user maka dikembalikan ke laman utama
        if (!$public) {
          redirect(base_url('auth'));
        }
      }
    }
  }
}
