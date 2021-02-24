<?php

class Token_model extends CI_Model
{
  // untuk mendaftarkan token baru
  public function registerNewToken($data_token)
  {
    return $this->db->insert('token', $data_token);
  }

  // untuk get token by token
  public function getTokenByToken($token)
  {
    return $this->db->get_where('token', ['token' => $token])->row_array();
  }

  // untuk delete token by token
  public function deleteTokenByToken($token)
  {
    return $this->db->delete('token', ['token' => $token]);
  }
}
