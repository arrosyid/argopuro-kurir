<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
  public function getAllPesanan($type)
  {
    if ($type == 'all data') {
      $this->db->select("pengirim.*, penerima.* , pesanan.*");
      $this->db->from('pesanan');
      $this->db->join('pesanan', 'pesanan.id_pengirim = pengirim.id_pengirim, pesanan.id_penerima=penerima.id_penerima');
      $this->db->order_by('date_create', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'proses') {
      $this->db->select("pengirim.*, penerima.* , pesanan.*");
      $this->db->from('pesanan');
      $this->db->join('pesanan', 'pesanan.id_pengirim = pengirim.id_pengirim, pesanan.id_penerima=penerima.id_penerima');
      $this->db->where('pesanan', 'status = 2');
      $this->db->order_by('date_create', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'diterima') {
      $this->db->select("pengirim.*, penerima.* , pesanan.*");
      $this->db->from('pesanan');
      $this->db->join('pesanan', 'pesanan.id_pengirim = pengirim.id_pengirim, pesanan.id_penerima=penerima.id_penerima');
      $this->db->where('pesanan', 'status = 3');
      $this->db->order_by('date_create', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'sukses') {
      $this->db->select("pengirim.*, penerima.* , pesanan.*");
      $this->db->from('pesanan');
      $this->db->join('pesanan', 'pesanan.id_pengirim = pengirim.id_pengirim, pesanan.id_penerima=penerima.id_penerima');
      $this->db->where('pesanan', 'status = 4');
      $this->db->order_by('date_create', 'DESC');
      return $this->db->get()->result_array();
    }
  }
  public function getAllPesananById($id)
  {
    $this->db->select("pengirim.*, penerima.* , pesanan.*");
    $this->db->from('pesanan');
    $this->db->join('pesanan', 'pesanan.id_pengirim = pengirim.id_pengirim, pesanan.id_penerima=penerima.id_penerima');
    $this->db->order_by('date_create', 'DESC');
    $this->db->where('pesanan', ['id_pesanan' => $id]);
    return $this->db->get()->result_array();
  }
  public function getPesananById($id)
  {
    $this->db->select("pengirim.*, penerima.* , pesanan.*");
    $this->db->from('pesanan');
    $this->db->join('pesanan', 'pesanan.id_pengirim = pengirim.id_pengirim, pesanan.id_penerima=penerima.id_penerima');
    $this->db->where('pesanan', ['id_pesanan' => $id]);
    return $this->db->get()->row_array();
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
