<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
  public function getAllPesanan()
  {
    return $this->db->get('pesanan')->result_array();
  }
  public function getAllPesananById($id)
  {
    return $this->db->get('pesanan', ['id_pesanan' => $id])->result_array();
  }
  public function getPesananById($id)
  {
    return $this->db->get('pesanan', ['id_pesanan' => $id])->row_array();
  }
  public function insertPesanan($data_Pesanan)
  {
    return $this->db->insert('Pesanan', $data_Pesanan);
  }
  // delete all Pesanan
  public function deletePesanan($data_Pesanan)
  {
    return $this->db->delete('Pesanan', $data_Pesanan);
  }
  // delete Pesanan with type by id
  public function deletePesananById($type = 'id_Pesanan', $param = null)
  {
    if ($type == 'id_Pesanan')
      return $this->db->delete('Pesanan', ['id_Pesanan' => $param]);

    // if ($type == 'id_koperasi')
    //   return $this->db->delete('Pesanan', ['id_koperasi' => $param]);
  }

  public function updatePesananById($type, $id, $data)
  {
    if ($type == 1)
      return $this->db->update('Pesanan', $data, ['id_Pesanan' => $id]);
    // if ($type == 2)
    //   return $this->db->update('Pesanan', $data, ['id_koperasi' => $id]);
  }
}
