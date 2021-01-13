<?php

class Funcionario_model extends CI_Model
{
  const table = 'tb_funcionario';

  public function registerFuncionario($fields)
  {
    $this->db->insert(self::table, $fields);
    return $this->db->affected_rows();
  }

  public function verificaFuncionario($where)
  {
    $this->db->select('email');
    $this->db->where($where);
    $query = $this->db->get(self::table);
    return $query->num_rows();
  }
  public function BuscaFuncionario()
  {
    $this->db->select();
    $query = $this->db->get(self::table);
    return $query->result();
  }

  public function UpdateSituacao($id,$situacao)
  {
    
    $this->db->set('usuario_ativo', $situacao);
    $this->db->where('id', $id);
    $this->db->update('tb_funcionario'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
		return $this->db->affected_rows();
  }


}
