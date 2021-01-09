<?php

class Funcionario_model extends CI_Model
{
  const table = 'tb_funcionarios';

  public function registerFuncionario($fields)
  {
    $this->db->insert(self::table, $fields);
    return $this->db->affected_rows();
  }

  public function verificaEmpresa($email)
  {
    $this->db->select('email');
    $this->db->where('email', $email);
		$query = $this->db->get(self::table);
    return $query->num_rows();
  }
}
