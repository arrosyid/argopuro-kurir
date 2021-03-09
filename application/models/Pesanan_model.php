<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
  public function getAllPesanan($type)
  {
    if ($type == 'all data') {
      $this->db->select("*")->from('awal_pesanan');
      $this->db->order_by('date_created', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'pending') {
      $this->db->select("*")->from('awal_pesanan')->where('status = 1');
      $this->db->order_by('date_created', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'proses') {
      $this->db->select("*")->from('awal_pesanan')->where('status = 2');
      $this->db->order_by('date_created', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'diterima') {
      $this->db->select("*")->from('awal_pesanan')->where('status = 3');
      $this->db->order_by('date_created', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'sukses') {
      $this->db->select("*")->from('awal_pesanan')->where('status = 4');
      $this->db->order_by('date_created', 'DESC');
      return $this->db->get()->result_array();
    }
  }
  public function getPesananById($id)
  {
    return $this->db->get('awal_pesanan', ['id_pesanan' => $id])->row_array();
  }
  public function insertPesanan($data_pengirim, $data_Pesanan)
  {
    return $this->db->insert('awal_pesanan', $data_pengirim, $data_Pesanan);
  }
  // delete Pesanan with type by id
  public function deletePesananById($param = null)
  {
    return $this->db->delete('awal_pesanan', ['id_Pesanan' => $param]);
  }

  public function updatePesananById($id, $data)
  {
    return $this->db->update('awal_pesanan', $data, ['id_Pesanan' => $id]);
  }
}
