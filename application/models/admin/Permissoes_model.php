<?php

class Permissoes_model extends CI_Model
{

  public function busca_permissoes($id_funcionario)
  {

    $this->db->select('cadastrar_funcionario, cadastrar_refeicao', FALSE);
    $this->db->from('tb_permissoes');
    $this->db->where('id_funcionario', $id_funcionario);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function updatePermissao($update, $id)
  {

    $this->db->where('id_funcionario', $id);
    $this->db->update('tb_permissoes', $update);
    $result = $this->db->affected_rows();
    return $result;
  }
}
