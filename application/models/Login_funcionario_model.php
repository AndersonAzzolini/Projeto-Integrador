<?php

class Login_funcionario_model extends CI_Model{
    public function get($where){
        $this->db->where($where);
        return $this->db->get('tb_funcionario')->row();
    }
}