<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
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
    $this->load->view('templates/blog_header');
    $this->load->view('blog/form_customer');
    $this->load->view('templates/blog_footer');
  }
  private function _inputan()
  {
    // simpan inputan penerima pada session

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
    } else
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
      'ket_barang' => htmlspecialchars($this->input->post('keterangan')),
      'harga' => htmlspecialchars($this->input->post('harga_barang')),
      'status' => 1
    ];
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
  public function struck($id_Pesanan)
  {
    // $data['pesanan'] = $this->model->getPesananById($id_Pesanan);
    $this->load->view('templates/blog_header');
    $this->load->view('struck');
    $this->load->view('templates/blog_footer');
  }
}
