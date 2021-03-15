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
      (new Auth)->verified_access(false);
    }
    $this->load->model('User_model');
    $this->load->model('Token_model');
    $this->load->model('Pesanan_model');
    // $this->load->helper('captcha');
  }

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
  public function pending()
  {
    $data['title'] = 'pending';
    $data['subtitle'] = 'Resi Yang masih berada di customer/pengirim';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['resi'] = $this->Pesanan_model->getAllPesanan('pending');

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
    $this->form_validation->set_rules('changeStatus', 'Ubah Status', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      if ($id_pesanan == null) {
        $data['resi'] = null;
        $data['title'] = 'Resi Tidak Ditemukan';
        $data['subtitle'] = 'Resi telah terhapus atau tidak ada dalam database';
      } else {
        $data['resi'] = $this->Pesanan_model->getPesananById($id_pesanan);
        $data['title'] = 'Resi ' . $data['resi']['nm_pengirim'];
        switch ($data['resi']['status']) {
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
      }
      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/struck_kurir', $data);
      $this->load->view('templates/admin_footer');
    } else {
      $data_status = [
        'status' => $this->input->post('changeStatus', true)
      ];
      if ($this->Pesanan_model->updatePesananById($id_pesanan, $data_status)) {
        //input Pesanan
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Berhasil Mengubah Status Pesanan</div>'
        );
        redirect('kurir');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Gagal Mengubah Status Pesanan</div>'
        );
        redirect('kurir');
      }
    }
  }
}
