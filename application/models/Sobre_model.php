<?php

class Sobre_model extends CI_Model
{
    public function GetSobre()
    {
        $this->db->select('sobre.descricao,imagem_sobre.nome');
        $this->db->from('sobre');
        $this->db->join('imagem_sobre', 'sobre.id_imagem_sobre=imagem_sobre.id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }
    public function updateSobre(){
        
    }
}
