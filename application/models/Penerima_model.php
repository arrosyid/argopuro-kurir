<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerima_model extends CI_Model
{
  public function getAllPenerima()
  {
    return $this->db->get('penerima')->result_array();
  }
  public function getAllPenerimaById($id)
  {
    return $this->db->get('penerima', ['id_penerima' => $id])->result_array();
  }
  public function getPenerimaById($id)
  {
    return $this->db->get('penerima', ['id_penerima' => $id])->row_array();
  }
  public function getPenerimaByNamaNomor($nama, $nomor)
  {
    return $this->db->get('penerima', ['nama' => $nama] and ['nomor' => $nomor])->row_array();
  }
  public function getPenerimaByNomor($nomor)
  {
    return $this->db->get('penerima', ['nomor' => $nomor])->row_array();
  }

  public function insertPenerima($data_Penerima)
  {
    return $this->db->insert('penerima', $data_Penerima);
  }
  // delete all Penerima
  public function deletePenerima($data_Penerima)
  {
    return $this->db->delete('penerima', $data_Penerima);
  }
  // delete Penerima with type by id
  public function deletePenerimaById($type = 'id_penerima', $param = null)
  {
    if ($type == 'id_Penerima')
      return $this->db->delete('penerima', ['id_penerima' => $param]);

    // if ($type == 'id_koperasi')
    //   return $this->db->delete('penerima', ['id_koperasi' => $param]);
  }

  public function updatePenerimaById($type, $id, $data)
  {
    if ($type == 1)
      return $this->db->update('penerima', $data, ['id_penerima' => $id]);
    // if ($type == 2)
    //   return $this->db->update('penerima', $data, ['id_koperasi' => $id]);
  }
}
