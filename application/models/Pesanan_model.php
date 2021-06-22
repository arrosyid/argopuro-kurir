<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
  public function getAllPesanan($type)
  {
    if ($type == 'all data') {
      //Today's date.
      $currentDate = new DateTime();
      //Subtract a day using DateInterval
      $lastWeekDT = $currentDate->sub(new DateInterval('P1W'));
      //Get the date in a YYYY-MM-DD format.
      $lastWeek = $lastWeekDT->format('Y-m-d');

      $this->db->select("*")->from('awal_pesanan')->where(['date_created' => $lastWeek]);
      $this->db->order_by('date_created', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'pending') {
      $this->db->select("*")->from('awal_pesanan')->where('status = 1');
      $this->db->order_by('date_created', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'diterima') {
      $this->db->select("*")->from('awal_pesanan')->where('status = 2');
      $this->db->order_by('date_created', 'DESC');
      return $this->db->get()->result_array();
    }
    if ($type == 'proses') {
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
    return $this->db->get_where('awal_pesanan', ['id_pesanan' => $id])->row_array();
  }
  public function insertPesanan($data_Pesanan)
  {
    return $this->db->insert('awal_pesanan', $data_Pesanan);
  }
  // fungsi untuk get post by parameter
  public function getPesananByKeyword($keyword)
  {
    $this->db->like('id_pesanan', $keyword);
    $this->db->or_like('nm_pengirim', $keyword);
    $this->db->or_like('alamat_pengirim', $keyword);
    $this->db->or_like('no_HP_pengirim', $keyword);
    $this->db->or_like('nm_penerima', $keyword);
    $this->db->or_like('alamat_penerima', $keyword);
    $this->db->or_like('no_HP_penerima', $keyword);
    $this->db->or_like('ket_barang', $keyword);
    $this->db->order_by('date_created', 'DESC');
    return $this->db->get('awal_pesanan')->result_array();
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
