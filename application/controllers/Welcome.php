<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  // Cara mencegah inputan berulang agar tidak sama inputannya(by name/by id/by email/by no_rek)


  public function __construct()
  {
    parent::__construct();
    verified_access(true);
    $this->load->model('pengirim_model');
    $this->load->model('penerima_model');
    $this->load->model('Pesanan_model');
  }

  public function index()
  {
    //rules form validation pengirim
    $this->form_validation->set_rules('nm_pengirim', 'Nama Pengirim', 'required|trim');
    $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required|trim');
    $this->form_validation->set_rules('no_pengirim', 'Nomor Pengirim', 'required|trim');
    $this->form_validation->set_rules('ancer_pengirim', 'Acer-ancer Pengirim', 'required|trim');
    $this->form_validation->set_rules('no_rek', 'nomor rekening Pengirim', 'required|trim');
    //rules form validation penerima
    $this->form_validation->set_rules('nm_penerima', 'Nama Penerima', 'required|trim');
    $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'required|trim');
    $this->form_validation->set_rules('no_penerima', 'Nomor Penerima', 'required|trim');
    $this->form_validation->set_rules('ancer_penerima', 'Acer-ancer Penerima', 'required|trim');
    //rules form validation deskripsi (pesanan)
    $this->form_validation->set_rules('ket_barang', 'Keterangan Barang', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/blog_header');
      $this->load->view('blog/form_customer');
      $this->load->view('templates/blog_footer');
    } else $this->_inputan();
  }
  private function _inputan()
  {
    // simpan inputan penerima pada session

    $data_pengirim = [
      'nm_pengirim' => htmlspecialchars($this->input->post('nama')),
      'alamat_pengirim' => htmlspecialchars($this->input->post('alamat')),
      'no_pengirim' => htmlspecialchars($this->input->post('nomor')),
      'ancer_pengirim' => htmlspecialchars($this->input->post('ket_alamat')),
      'no_rekening' => htmlspecialchars($this->input->post('no_rek'))
    ];
    $data_penerima = [
      'nm_penerima' => htmlspecialchars($this->input->post('nama')),
      'alamat_penerima' => htmlspecialchars($this->input->post('alamat')),
      'no_penerima' => htmlspecialchars($this->input->post('nomor')),
      'ancer_penerima' => htmlspecialchars($this->input->post('ket_alamat'))
    ];
    $data_pesanan = [
      'id_pesanan' => uniqid(true),
      'ket_barang' => htmlspecialchars($this->input->post('keterangan')),
      'harga' => htmlspecialchars($this->input->post('harga_barang')),
      'status' => 1
    ];
    // mencegah user melakukan inputan dengan data yang sama
    if ($this->pengirim_model->getPengirimById('isi dengan id')) {
      // jika sudah ada
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Berhasil menginputkan data Pengirim</div>'
      );
      redirect('admin');
    } else {
      // jika data tidak ditemukan
      if ($this->Pengirim_model->insertPengirim($data_pengirim)) {
        //input Pengirim
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil menginputkan data Pengirim</div>'
        );
        redirect('admin');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal menginputkan data Pengirim</div>'
        );
        redirect('admin');
      }
    }

    // mencegah user melakukan inputan dengan data yang sama
    if ($this->penerima_model->getPenerimaById('isi dengan id')) {
      // jika data sudah ada
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Berhasil menginputkan data Penerima</div>'
      );
      redirect('admin');
    } else {
      // jika data tidak ditemukan
      if ($this->Penerima_model->insertPenerima($data_penerima)) {
        //input Penerima
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil menginputkan data Penerima</div>'
        );
        redirect('admin');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal menginputkan data Penerima</div>'
        );
        redirect('admin');
      }
    }
    // jika data tidak ditemukan
    if ($this->Pesanan_model->insertPesanan($data_pesanan)) {
      //input Pesanan
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil menginputkan data Pesanan</div>'
      );
      redirect('admin');
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal menginputkan data Pesanan</div>'
      );
      redirect('admin');
    }
  }
  public function struck($id_Pesanan = null)
  {
    $data['pesanan'] = $this->model->getPesananById($id_Pesanan);
    $this->load->view('templates/blog_header');
    $this->load->view('struck');
    $this->load->view('templates/blog_footer');
  }
}
