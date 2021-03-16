<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  // task list:
  // captcha in registrasi

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Token_model');
    $this->load->helper('captcha');
  }
  // edit fungsi untuk daftar koperasi

  public function index()
  {
    //untuk memverifikasi sesi login
    (new Ionauth)->verified_access(true);

    //validation rules
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required');

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Login Kurir';

      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      //validasi sukses
      $this->_login(); //methode private
    }
  }

  private function _login()
  {

    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->User_model->getUserByEmail($email);

    if ($user) {
      if ($user['is_active'] == 1) {
        //cek password
        if (password_verify($password, $user['password'])) {
          //menyiapkan data pada session
          $data = [
            'id_user' => $user['id_user'],
            'email' => $user['email'],
            'level' => $user['level']
          ];
          //multiuser LOGIN
          $this->session->set_userdata($data);
          if ($user['level'] == '1') {
            redirect('admin');
          } else {
            redirect('kurir');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Password anda salah.</div>');
          redirect('Auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Email tidak aktif.</div>');
        redirect('Auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Email tidak terdaftar.</div>');
      redirect('Auth');
    }
  }

  //fungsi register
  public function registrasi()
  {
    //untuk memverifikasi sesi login
    (new Ionauth)->verified_access(true);

    //validation rules
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'valid_email' => 'email tidak cocok',
      'is_unique' => 'email sudah digunakan'
    ]);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
      'min_length' => 'password terlalu pendek!',
      'matches' => 'password tidak sama!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Regristrasi Kurir';

      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registrasi');
      $this->load->view('templates/auth_footer');
    } else {
      $email = $this->input->post('email', TRUE);
      // menyimpan data user
      $data_user = [
        // // mendapatkan id koperasi
        // 'id_koperasi' => htmlspecialchars($this->input->post('koperasi', TRUE)),
        'username' => $this->input->post('name', TRUE),
        'password' => password_hash(
          $this->input->post('password1'),
          PASSWORD_DEFAULT
        ),
        'email' => htmlspecialchars($email),
        'level' => 2,
        'is_active' => 0,
        'date_create' => time()
      ];
      // membuat token
      $token = uniqid(true);
      // input token
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time(),
      ];
      // view activation email
      $data['title'] = 'verify Password Akun Kurir Anda';
      $data['heading'] = 'Verifikasi Akun Kurir Anda';
      $data['body'] = 'Silahkan klik tombol dibawah untuk mendaftar akun anda yang terdaftar dengan email: ' . $email . '.';
      $data['url'] = base_url('index.php/auth/') . 'verify?email=' . $email . '&token=' . $token;
      $data['button'] = 'verify akun';

      // input data to database
      $this->db->insert('user', $data_user);
      $this->db->insert('token', $user_token);

      // send email activation
      // $this->_sendEmail($email, $data);

      // cek if email activation has sent
      if ($this->_sendEmail($email, $data)) {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Email untuk melakukan recovery password telah dikirim ke ' . $email . '.</div>'
        );

        redirect('auth/registrasi');
      } else {
        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Gagal mengirim Email.</div>'
        );

        redirect('auth/registrasi');
      }
    }
  }

  public function verify()
  {
    $email = htmlspecialchars($this->input->get('email'));
    $token = htmlspecialchars($this->input->get('token'));

    // get token by token
    $data_token = $this->Token_model->getTokenByToken($token);

    // jika token ada
    if ($data_token) {
      // cek jika token kadaluarsa (lebih dari 1 jam)
      if (time() - $data_token['date_created'] < 60 * 60 * 1) {
        // merubah status aktif user menjadi 1
        $this->User_model->setUserActiveStatus($email, 1);

        // menghapus token
        $this->Token_model->deleteTokenByToken($token);

        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-success alert-dismissible">
  				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  				Berhasil melakukan aktivasi. Silahkan Login.</div>'
        );

        redirect('Auth');
      } else {
        // jika token kadaluarsa
        // menghapus user dan token
        $this->User_model->deleteUserByEmail($email);
        $this->Token_model->deleteTokenByToken($token);

        $this->session->set_flashdata(
          'message',
          '<div class="alert alert-danger alert-dismissible">
  				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  				Gagal melakukan aktivasi. Token kadaluarsa. Harap melakukan registrasi ulang.</div>'
        );

        redirect('Auth');
      }
    } else {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible">
  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  			Gagal melakukan aktivasi. Token tidak valid. Harap melakukan registrasi ulang.</div>'
      );

      redirect('Auth');
    }
  }

  // fungsi proses send email
  private function _sendEmail($email, $data)
  {

    $config = [
      'protocol'      => 'smtp',
      'smtp_host'     => 'smtp.gmail.com',
      'smtp_user'     => '',
      'smtp_pass'     => '',
      'smtp_port'     => 465,
      'mailtype'      => 'html',
      'charset'       => 'utf-8',
      'smtp_crypto'   => 'ssl',
      'crlf'          => "\r\n",
      'newline'       => "\r\n"
    ];

    $this->load->library('email', $config);
    $this->email->initialize($config);
    $this->email->from('iqbal.rosyidi.32@gmail.com', 'ARGOPURO KURIR');
    $this->email->to('iqbal.rosyidi.32@gmail.com');

    $message = $this->load->view('email/email_view.php', $data, true);

    $this->email->subject($data['heading']);
    $this->email->message($message);

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      // die;
      return false;
    }
  }


  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('level');

    $this->session->set_flashdata('message', '<div class="alert alert-success" 
			role="alert alert-success"> Anda sudah keluar </div>');
    redirect('Auth');
  }
}
