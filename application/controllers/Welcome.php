<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  // kekurangan:


  public function __construct()
  {
    parent::__construct();
    (new Ionauth)->verified_access(true);
    $this->load->model('Pesanan_model');
  }

  public function index()
  {
    //rules form validation pengirim
    $this->form_validation->set_rules('nm_pengirim', 'Nama Pengirim', 'required|trim');
    $this->form_validation->set_rules('alamat_pengirim', 'Alamat Pengirim', 'required|trim');
    $this->form_validation->set_rules('no_pengirim', 'Nomor Pengirim', 'required|trim');
    $this->form_validation->set_rules('ancer_pengirim', 'Acer-ancer Pengirim', 'required|trim');
    //rules form validation penerima
    $this->form_validation->set_rules('nm_penerima', 'Nama Penerima', 'required|trim');
    $this->form_validation->set_rules('alamat_penerima', 'Alamat Penerima', 'required|trim');
    $this->form_validation->set_rules('no_penerima', 'Nomor Penerima', 'required|trim');
    $this->form_validation->set_rules('ancer_penerima', 'Acer-ancer Penerima', 'required|trim');
    //rules form validation deskripsi (pesanan)
    $this->form_validation->set_rules('ket_barang', 'Keterangan Barang', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      if ($this->session->userdata('nm_pengirim') == null)
        $data['simpanDataPengirim'] = null;
      else
        $data['simpanDataPengirim'] = $this->session->userdata();
      // var_dump($data['simpanDataPengirim']);
      // die;

      $this->load->view('templates/blog_header');
      $this->load->view('blog/form_customer', $data);
      $this->load->view('templates/blog_footer');
    } else {

      $data_pengirim = [
        'nm_pengirim' => htmlspecialchars($this->input->post('nm_pengirim', true)),
        'alamat_pengirim' => htmlspecialchars($this->input->post('alamat_pengirim', true)),
        'no_HP_pengirim' => htmlspecialchars($this->input->post('no_pengirim', true)),
        'ket_alamat_pengirim' => htmlspecialchars($this->input->post('ancer_pengirim', true)),
        'no_rek' => htmlspecialchars($this->input->post('no_rek', true))
      ];
      // dihapus sessionnya dulu
      $this->session->unset_userdata($data_pengirim);
      // menyimpan data pada session
      $this->session->set_userdata($data_pengirim);
      // var_dump($data['simpanDataPengirim']);
      // die;

      $data_pesanan = [
        'id_pesanan' => htmlspecialchars($this->input->post('id', true)),
        'nm_penerima' => htmlspecialchars($this->input->post('nm_penerima', true)),
        'alamat_penerima' => htmlspecialchars($this->input->post('alamat_penerima', true)),
        'no_HP_penerima' => htmlspecialchars($this->input->post('no_penerima', true)),
        'ket_alamat_penerima' => htmlspecialchars($this->input->post('ancer_penerima', true)),
        'ket_barang' => htmlspecialchars($this->input->post('ket_barang', true)),
        'harga_barang' => htmlspecialchars($this->input->post('harga', true)),
        // 1 = pending, 2 = proses/dikirim, 3 = diterima kantor, 4 = sukses
        'onkir' => 6000,
        'jenis_antar' => "E",
        'status' => 1,
        'date_created' => time()
      ];
      // var_dump($data_pesanan);
      // die;

      if ($this->Pesanan_model->insertPesanan($data_pengirim + $data_pesanan)) {
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
  public function struck($id_pesanan = null)
  {
    if ($id_pesanan == null) {
      $data['resi'] = null;
    } else
      $data['resi'] = $this->Pesanan_model->getPesananById($id_pesanan);
    // var_dump($data['resi']);
    $this->load->view('templates/blog_header');
    $this->load->view('blog/struck', $data);
    $this->load->view('templates/blog_footer');
  }
}
