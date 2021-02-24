<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
  public function __construct()
  {
    // setiap mau push hapus akunnya
    parent::__construct();
    //untuk memverifikasi sesi login
    if ($this->session->userdata('level') != 2) {
      verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Token_model');
    // $this->load->helper('captcha');
  }
  // edit fungsi untuk daftar koperasi

  public function index()
  {
    $data['title'] = 'Dashboard Kurir';

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
  public function process()
  {
    $data['title'] = 'Resi Yang Sedang diproses';

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
  public function sent()
  {
    $data['title'] = 'Resi Dalam Pengiriman';

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
  public function success()
  {
    $data['title'] = 'Pengiriman Sukses';

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
}
