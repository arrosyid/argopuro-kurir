<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengirim_model extends CI_Model
{
  public function getAllPengirim()
  {
    return $this->db->get('pengirim')->result_array();
  }
  public function getAllPengirimById($id)
  {
    return $this->db->get('pengirim', ['id_pengirim' => $id])->result_array();
  }
  public function getPengirimById($id)
  {
    return $this->db->get('pengirim', ['id_pengirim' => $id])->row_array();
  }
  public function getPengirimByNamaNomor($nama, $nomor)
  {
    return $this->db->get('pengirim', ['nama' => $nama] and ['nomor' => $nomor])->row_array();
  }
  public function getPengirimByNomor($nomor)
  {
    return $this->db->get('pengirim', ['nomor' => $nomor])->row_array();
  }

  public function insertPengirim($data_Pengirim)
  {
    return $this->db->insert('pengirim', $data_Pengirim);
  }
  // delete all Pengirim
  public function deletePengirim($data_Pengirim)
  {
    return $this->db->delete('pengirim', $data_Pengirim);
  }
  // delete Pengirim with type by id
  public function deletePengirimById($type = 'id_pengirim', $param = null)
  {
    if ($type == 'id_pengirim')
      return $this->db->delete('pengirim', ['id_pengirim' => $param]);

    // if ($type == 'id_koperasi')
    //   return $this->db->delete('Pengirim', ['id_koperasi' => $param]);
  }

  public function updatePengirimById($type, $id, $data)
  {
    if ($type == 1)
      return $this->db->update('pengirim', $data, ['id_pengirim' => $id]);
    // if ($type == 2)
    //   return $this->db->update('Pengirim', $data, ['id_koperasi' => $id]);
  }
}
