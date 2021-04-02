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
      (new Ionauth)->verified_access(false);
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
    if (isset($_POST['search'])) {
      $data['resi'] =  $this->Pesanan_model->getPesananByKeyword($this->input->post('keyword'));
    }

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

  public function edit_resi($id_pesanan)
  {
    $data['title'] = 'Diterima Kantor';
    $data['subtitle'] = 'Resi Diterima Kantor';
    $data['user'] = $this->User_model->getUserByEmail($this->session->userdata['email']);
    $data['resi'] = $this->Pesanan_model->getPesananById($id_pesanan);


    $no_rek = htmlspecialchars($this->input->post('no_rek', true));
    //rules form validation pengirim
    $this->form_validation->set_rules('nm_pengirim', 'Nama Pengirim', 'required|trim', [
      'required' => 'Harap Mengisi Form ini'
    ]);
    $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required|trim', [
      'required' => 'Harap Mengisi Form ini'
    ]);
    $this->form_validation->set_rules('no_pengirim', 'Nomor Pengirim', 'required|trim', [
      'required' => 'Harap Mengisi Form ini'
    ]);
    if ($no_rek != null) {
      $this->form_validation->set_rules('bank', 'Acer-ancer Pengirim', 'required|trim', [
        'required' => 'Harap Mengisi Form ini jika anda ingin memakai jasa TALANGI'
      ]);
      $this->form_validation->set_rules('atas_nama', 'Acer-ancer Pengirim', 'required|trim', [
        'required' => 'Harap Mengisi Form ini jika anda ingin memakai jasa TALANGI'
      ]);
    }

    //rules form validation penerima
    $this->form_validation->set_rules('nm_penerima', 'Nama Penerima', 'required|trim', [
      'required' => 'Harap Mengisi Form ini'
    ]);
    $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'required|trim', [
      'required' => 'Harap Mengisi Form ini'
    ]);
    $this->form_validation->set_rules('no_penerima', 'Nomor Penerima', 'required|trim', [
      'required' => 'Harap Mengisi Form ini'
    ]);

    //rules form validation deskripsi (pesanan)
    $this->form_validation->set_rules('ket_barang', 'Keterangan Barang', 'required|trim', [
      'required' => 'Harap Mengisi Form ini'
    ]);
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim', [
      'required' => 'Harap Mengisi Form ini'
    ]);
    $this->form_validation->set_rules('berat', 'Berat', 'required|trim|max_length[3]', [
      'required' => 'Harap Mengisi Form ini',
      'max_length' => 'barang terlalu berat!'
    ]);

    if ($this->form_validation->run() == FALSE) {
      $data['uri'] = $this->uri->segment(2);

      $this->load->view('templates/admin_header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/form_edit_resi', $data);
      $this->load->view('templates/admin_footer');
    } else {

      $data_pesanan = [
        'nm_pengirim' => htmlspecialchars($this->input->post('nm_pengirim', true)),
        'alamat_pengirim' => htmlspecialchars($this->input->post('alamat_pengirim', true)),
        'no_HP_pengirim' => htmlspecialchars($this->input->post('no_pengirim', true)),
        'ket_alamat_pengirim' => htmlspecialchars($this->input->post('ancer_pengirim', true)),
        'bank' => htmlspecialchars($this->input->post('bank', true)),
        'no_rek' => $no_rek,
        'atas_nama' => htmlspecialchars($this->input->post('atas_nama', true)),
        'id_pesanan' => htmlspecialchars($this->input->post('id', true)),
        'nm_penerima' => htmlspecialchars($this->input->post('nm_penerima', true)),
        'alamat_penerima' => htmlspecialchars($this->input->post('alamat_penerima', true)),
        'no_HP_penerima' => htmlspecialchars($this->input->post('no_penerima', true)),
        'ket_alamat_penerima' => htmlspecialchars($this->input->post('ancer_penerima', true)),
        'ket_barang' => htmlspecialchars($this->input->post('ket_barang', true)),
        'harga_barang' => htmlspecialchars($this->input->post('harga', true)),
        'berat_barang' => htmlspecialchars($this->input->post('berat', true)),
        'ongkir' => htmlspecialchars($this->input->post('ongkir', true)),
        // E = ekspedisi, Ex = Express
        'jenis_antar' => "E",
        // 1 = pending, 2 = proses/dikirim, 3 = diterima kantor, 4 = sukses
        'status' => 1,
        'date_created' => time()
      ];
      // var_dump($data_pesanan);
      // die;

      if ($this->Pesanan_model->insertPesanan($data_pesanan)) {
        //input Pesanan
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil menginputkan data Pesanan</div>'
        );
        redirect('welcome');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal menginputkan data Pesanan</div>'
        );
        redirect('welcome');
      }
    }
  }
  public function delete_resi($id_pesanan, $menu)
  {
    if ($this->Pesanan_model->deletePesananById($$id_pesanan)) {
      //input Pesanan
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Berhasil menginputkan data Pesanan</div>'
      );
      redirect('welcome/' . $menu);
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Gagal menginputkan data Pesanan</div>'
      );
      redirect('welcome/' . $menu);
    }
  }
  public function ajax()
  {
    // $ajax_menu = $this->input->get('search');

    // // ajax edit category
    // if ($ajax_menu == 'search') {

    $keyword = $this->input->get('keyword');

    $data['resi'] = $this->Pesanan_model->getPesananByKeyword($keyword);
    // var_dump($data['resi']);
    // die;

    $this->load->view('admin/ajax/search', $data);
    // }
  }
}
