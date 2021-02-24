<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  // mengambil user berdasarkan email
  public function getUserByEmail($email)
  {
    return $this->db->get_where('user', ['email' => $email])->row_array();
  }
  // mengambil user berdasarkan id
  public function getUserById($id)
  {
    return $this->db->get_where('user', ['id_user' => $id])->row_array();
  }
  // mengambil user berdasarkan koperasi
  public function getAllUser()
  {
    $this->db->select('user.*, data_kooperasi.nm_koperasi');
    $this->db->from('user');
    $this->db->join('data_kooperasi', 'user.id_koperasi = data_kooperasi.id_koperasi');
    return $this->db->get()->result_array();
  }

  // untuk merubah status aktiv user
  public function setUserActiveStatus($email, $status)
  {
    return $this->db->update('user', ['is_active' => $status], ['email' => $email]);
  }
  // untuk delete user by email
  public function deleteUserByEmail($email)
  {
    return $this->db->delete('user', ['email' => $email]);
  }
  // delete kooperasi by parameter
  public function deleteUserById($type = 'id_user', $param = null)
  {
    if ($type == 'id_user') {
      return $this->db->delete('user', ['id_user' => $param]);
    }

    // if ($type == 'id_koperasi') {
    //   return $this->db->delete('user', ['id_koperasi' => $param]);
    // }
  }

  // get latest login with LIMIT
  public function getAllUserActivation($aktif)
  {
    $this->db->select("user.*, data_kooperasi.nm_koperasi , FROM_UNIXTIME(login.created_at, '%Y %M %d %H:%i') AS login_time");
    $this->db->from('user');
    $this->db->join('user', 'user.id_koperasi = koperasi.id_koperasi');
    $this->db->where('user', ['is_active' => $aktif]);
    $this->db->order_by('login.created_at', 'DESC');
  }

  // update user by email
  public function updateUserByEmail($email, $data)
  {
    return $this->db->update('user', $data, ['email' => $email]);
  }
  public function updateUserById($data, $id)
  {
    return $this->db->update('user', $data, ['id_user' => $id]);
  }
}
