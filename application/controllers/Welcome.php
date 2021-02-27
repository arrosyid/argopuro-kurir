<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

  // Mencegah inputan berulang by name and nomor
  // 


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

    $nama_pengirim = htmlspecialchars($this->input->post('nm_pengirim', true));
    $no_hp_pengirim = htmlspecialchars($this->input->post('no_pengirim', true));

    $data_pengirim = [
      'nama' => $nama_pengirim,
      'alamat' => htmlspecialchars($this->input->post('alamat_pengirim', true)),
      'no_HP' => $no_hp_pengirim,
      'ket_alamat' => htmlspecialchars($this->input->post('ancer_pengirim', true)),
      'no_rek' => htmlspecialchars($this->input->post('no_rek', true))
    ];
    $data_penerima = [
      'nama' => htmlspecialchars($this->input->post('nm_penerima', true)),
      'alamat' => htmlspecialchars($this->input->post('alamat_penerima', true)),
      'no_HP' => htmlspecialchars($this->input->post('no_penerima', true)),
      'ket_alamat' => htmlspecialchars($this->input->post('ancer_penerima', true))
    ];
    $data_pesanan = [
      'id_pengirim' => $this->input->post('id_pengirim', true),
      'id_penerima' => $this->input->post('id_penerima', true),
      'id_pesanan' => uniqid(true),
      'keterangan' => htmlspecialchars($this->input->post('ket_barang', true)),
      'harga_barang' => htmlspecialchars($this->input->post('harga', true)),
      'status' => 1,
      'date_created' => time()
    ];
    // disini cegah untuk tidak memasukkan data duplikat
    // $this->Pengirim_model->getPengirimByNamaNomor($nama_pengirim, $no_hp_pengirim);
    // opsi satu

    // // input data pengirim
    // if ($this->Pengirim_model->insertPengirim($data_pengirim)) {
    //   // input berhasil
    //   $this->session->set_flashdata(
    //     'message1',
    //     '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                 Berhasil menginputkan data Pengirim</div>'
    //   );
    //   // input data penerima
    //   if ($this->Penerima_model->insertPenerima($data_penerima)) {
    //     $this->session->set_flashdata(
    //       'message2',
    //       '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                   Berhasil menginputkan data Penerima</div>'
    //     );
    //     redirect('welcome');
    //     // // input data pesanan
    //     // if ($this->Pesanan_model->insertPesanan($data_pesanan)) {
    //     //   // input berhasil
    //     //   $this->session->set_flashdata(
    //     //     'message3',
    //     //     '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //     //                   Berhasil menginputkan data Pesanan</div>'
    //     //   );
    //     //   redirect('welcome');
    //     // } else {
    //     //   // jika input pesananan gagal
    //     //   $this->session->set_flashdata(
    //     //     'message3',
    //     //     '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //     //                   Gagal menginputkan data Pesanan</div>'
    //     //   );
    //     // }
    //   } else {
    //     // jika input penerima gagal
    //     $this->session->set_flashdata(
    //       'message2',
    //       '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //       Gagal menginputkan data Penerima</div>'
    //     );
    //     redirect('welcome');
    //   }
    // } else {
    //   // jika input pengirim gagal
    //   $this->session->set_flashdata(
    //     'message1',
    //     '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                 Gagal menginputkan data Pengirim</div>'
    //   );
    //   redirect('welcome');
    // }



    // opsi dua
    // mencegah user melakukan inputan dengan data yang sama
    $data['pengirim'] = $this->Pengirim_model->getPengirimByNamaNomor($nama_pengirim, $no_hp_pengirim);
    if ($nama_pengirim == $data['pengirim']['nama'] and $no_hp_pengirim == $data['pengirim']['no_HP']) {
      // jika sudah ada
      $this->session->set_flashdata(
        'message1',
        '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Daata Sudah terdapat Pada data Pengirim</div>'
      );
      redirect('welcome');
    } else {
      // jika data tidak ditemukan
      if ($this->Pengirim_model->insertPengirim($data_pengirim)) {
        //input Pengirim
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Berhasil menginputkan data Pengirim</div>'
        );
        redirect('welcome');
      } else {
        $this->session->set_flashdata(
          'message1',
          '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Gagal menginputkan data Pengirim</div>'
        );
        redirect('welcome');
      }
    }

    // // // mencegah user melakukan inputan dengan data yang sama
    // // if ($this->Penerima_model->getPenerimaById('isi dengan id')) {
    // //   // jika data sudah ada
    // //   $this->session->set_flashdata(
    // //     'message2',
    // //     '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    // //                 Berhasil menginputkan data Penerima</div>'
    // //   );
    // //   redirect('welcome');
    // // } else {
    // // jika data tidak ditemukan
    // if ($this->Penerima_model->insertPenerima($data_penerima)) {
    //   //input Penerima
    //   $this->session->set_flashdata(
    //     'message2',
    //     '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                   Berhasil menginputkan data Penerima</div>'
    //   );
    //   redirect('welcome');
    // } else {
    //   $this->session->set_flashdata(
    //     'message2',
    //     '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                   Gagal menginputkan data Penerima</div>'
    //   );
    //   redirect('welcome');
    // }
    // // }

    // // // jika data tidak ditemukan
    // // if ($this->Pesanan_model->insertPesanan($data_pesanan)) {
    // //   //input Pesanan
    // //   $this->session->set_flashdata(
    // //     'message3',
    // //     '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    // //                   Berhasil menginputkan data Pesanan</div>'
    // //   );
    // //   redirect('welcome');
    // // } else {
    //   $this->session->set_flashdata(
    //     'message3',
    //     '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    //                   Gagal menginputkan data Pesanan</div>'
    //   );
    //   redirect('welcome');
    // // }
  }
  public function struck($id_Pesanan = null)
  {
    $data['pesanan'] = $this->model->getPesananById($id_Pesanan);
    $this->load->view('templates/blog_header');
    $this->load->view('struck');
    $this->load->view('templates/blog_footer');
  }
}
