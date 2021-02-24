<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 2) {
      //untuk memverifikasi sesi login
      verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Token_model');
    $this->load->helper('captcha');
  }
  // edit fungsi untuk daftar koperasi

  public function index()
  {
    $this->load->view('templates/admin_header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
}
