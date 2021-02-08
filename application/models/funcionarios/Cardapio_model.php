<?php

class Cardapio_model extends CI_Model
{
  const table = 'tb_calendario';

  public function get_cardapio($id_empresa)
  {
    $this->db->select('id, start, end, title, color');
    $this->db->from(self::table);
    $this->db->where('id_empresa', $id_empresa);
    $query = $this->db->get();
    return $query->result();
  }

  public function updateCardapio($id, $update)
  {

    $this->db->where('id', $id);
    $this->db->update('tb_calendario', $update);
    return $this->db->affected_rows();
  }

  public function cadastraCardapio($insert)
  {
    $this->db->insert(self::table, $insert);
    return $this->db->affected_rows();

  }

  public function get_datas($id)
  {
    $this->db->select('start,end,descricao');
    $this->db->from(self::table);
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->result();
  }
}
