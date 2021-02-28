<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  // kekuranagn:
  // memanggil data pada session
  // mengambil id pengirim dan penerima
  // memasukkan id pengirim dan penerima jika baru
  // rubah dari session menjadi ajax


  public function __construct()
  {
    parent::__construct();
    verified_access(true);
    $this->load->model('Pengirim_model');
    $this->load->model('Penerima_model');
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
      $this->load->view('templates/blog_header');
      $this->load->view('blog/form_customer');
      $this->load->view('templates/blog_footer');
    } else $this->_inputan();
  }
  private function _inputan()
  {
    // simpan inputan penerima pada session

    // variable untuk input dan cek double data
    $nama_pengirim = htmlspecialchars($this->input->post('nm_pengirim', true));
    $no_hp_pengirim = htmlspecialchars($this->input->post('no_pengirim', true));

    $nama_penerima = htmlspecialchars($this->input->post('nm_penerima', true));
    $no_hp_penerima = htmlspecialchars($this->input->post('no_penerima', true));

    $data['pengirim'] = $this->Pengirim_model->getPengirimByNamaNomor($nama_pengirim, $no_hp_pengirim);
    $data['penerima'] = $this->Penerima_model->getPenerimaByNamaNomor($nama_penerima, $no_hp_penerima);

    if ($data['pengirim'] == null) {
      $id_pengirim = $this->input->post('id_pengirim', true);
    } else {
      $id_pengirim = $data['pengirim']['id_pengirim'];
    }
    if ($data['penerima'] == null) {
      $id_penerima = $this->input->post('id_penerima', true);
    } else {
      $id_penerima = $data['penerima']['id_penerima'];
    }

    $data_pengirim = [
      'nm_pengirim' => $nama_pengirim,
      'alamat_pengirim' => htmlspecialchars($this->input->post('alamat_pengirim', true)),
      'no_HP_pengirim' => $no_hp_pengirim,
      'ket_alamat_pengirim' => htmlspecialchars($this->input->post('ancer_pengirim', true)),
      'no_rek' => htmlspecialchars($this->input->post('no_rek', true))
    ];
    // // menyimpan data pada session
    // $this->session->set_userdata('nama', $nama_pengirim);
    // $data['simpanDataPengirim'] = $this->session->userdata('nama');
    // var_dump($data['simpanDataPengirim']);
    // die;

    $data_penerima = [
      'nm_penerima' => $nama_penerima,
      'alamat_penerima' => htmlspecialchars($this->input->post('alamat_penerima', true)),
      'no_HP_penerima' => $no_hp_penerima,
      'ket_alamat_penerima' => htmlspecialchars($this->input->post('ancer_penerima', true))
    ];
    $data_pesanan = [
      'id_pengirim' => $id_pengirim,
      'id_penerima' => $id_penerima,
      'id_pesanan' => uniqid(true),
      'keterangan' => htmlspecialchars($this->input->post('ket_barang', true)),
      'harga_barang' => htmlspecialchars($this->input->post('harga', true)),
      // 1 = pending, 2 = proses/dikirim, 3 = diterima kantor, 4 = sukses
      'status' => 1,
      'date_created' => time()
    ];

    // mencegah user melakukan inputan dengan data yang sama
    if ($nama_pengirim == $data['pengirim']['nm_pengirim'] and $no_hp_pengirim == $data['pengirim']['no_HP_pengirim']) {
      // jika sudah ada
      $this->session->set_flashdata(
        'message1',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data Sudah terdapat Pada data Pengirim</div>'
      );
      // redirect('welcome');
    } else {
      // jika data tidak ditemukan
      if ($this->Pengirim_model->insertPengirim($data_pengirim)) {
        //input Pengirim
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Berhasil menginputkan data Pengirim</div>'
        );
        // redirect('welcome');
      } else {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Gagal menginputkan data Pengirim</div>'
        );
        // redirect('welcome');
      }
    }

    // mencegah user melakukan inputan dengan data yang sama
    if ($nama_penerima == $data['penerima']['nm_penerima'] and $no_hp_penerima == $data['penerima']['no_HP_penerima']) {
      // jika data sudah ada
      $this->session->set_flashdata(
        'message2',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Data Sudah terdapat Pada data Penerima</div>'
      );
      redirect('welcome');
    } else {
      // jika data tidak ditemukan
      if ($this->Penerima_model->insertPenerima($data_penerima)) {
        //input Penerima
        $this->session->set_flashdata(
          'message2',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil menginputkan data Penerima</div>'
        );
        // redirect('welcome');
      } else {
        $this->session->set_flashdata(
          'message2',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal menginputkan data Penerima</div>'
        );
        // redirect('welcome');
      }
    }

    // jika data tidak ditemukan
    if ($this->Pesanan_model->insertPesanan($data_pesanan)) {
      //input Pesanan
      $this->session->set_flashdata(
        'message3',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Berhasil menginputkan data Pesanan</div>'
      );
      redirect('welcome');
    } else {
      $this->session->set_flashdata(
        'message3',
        '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      Gagal menginputkan data Pesanan</div>'
      );
      redirect('welcome');
    }
  }
  public function struck($id_Pesanan = null)
  {
    $data['resi'] = $this->model->getPesananById($id_Pesanan);
    $this->load->view('templates/blog_header');
    $this->load->view('struck');
    $this->load->view('templates/blog_footer');
  }
}
