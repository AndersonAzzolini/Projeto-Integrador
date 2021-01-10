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
  public function VerificaIdEmpresa()
  {
    $this->db->select('id');
    $this->db->where('email', $this->session->userdata('email'));
    $this->db->get('tb_login_empresa');
    
    
  }
}
