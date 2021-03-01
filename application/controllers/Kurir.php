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
    $this->load->model('Pesanan_model');
    // $this->load->helper('captcha');
  }
  // edit fungsi untuk daftar koperasi

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['subtitle'] = 'Dashboard Kurir';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['resi'] = $this->Pesanan_model->getAllPesanan('all data');

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
  public function process()
  {
    $data['title'] = 'Dalam Proses';
    $data['subtitle'] = 'Resi Yang Sedang Diproses';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['resi'] = $this->Pesanan_model->getAllPesanan('proses');

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
  public function sent()
  {
    $data['title'] = 'Diterima Kantor';
    $data['subtitle'] = 'Resi Diterima Kantor';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['resi'] = $this->Pesanan_model->getAllPesanan('diterima');

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
  public function success()
  {
    $data['title'] = 'Pengiriman Sukses';
    $data['subtitle'] = 'Pengiriman Telah Sukses';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['resi'] = $this->Pesanan_model->getAllPesanan('sukses');

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/dashboard');
    $this->load->view('templates/admin_footer');
  }
  public function struck($id_pesanan = null)
  {
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    if ($id_pesanan == null) {
      $data['resi'] = null;
    } else
      $data['resi'] = $this->Pesanan_model->getPesananById($id_pesanan);
    $data['title'] = 'Resi' . $data['pesanan']['nama'];
    switch ($data['pesanan']['status']) {
      case 1:
        $data['subtitle'] = 'Resi Dipending';
        break;
      case 2:
        $data['subtitle'] = 'Resi Diterima Kantor';
        break;
      case 3:
        $data['subtitle'] = 'Resi Dalam Pengiriman';
        break;
      default:
        $data['subtitle'] = 'Pengiriman Telah Sukses';
    }

    $this->load->view('templates/admin_header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/struck_kurir');
    $this->load->view('templates/admin_footer');


    $data = [
      'status' => $this->post->input('changeStatus')
    ];
    if ($this->Pesanan_model->updatePesananById(1, $id_pesanan, $data)) {
      //input Pesanan
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Berhasil Mengubah Status Pesanan</div>'
      );
      redirect('kurir/struck');
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Gagal Mengubah Status Pesanan</div>'
      );
      redirect('kurir/struck');
    }
  }
}
