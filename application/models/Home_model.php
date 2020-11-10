<?php

class Home_model extends CI_Model
{
    public function GetCards($categoria="")
    {
        
        $this->db->select('imagens.arquivo, categorias.descricao,categorias.titulo');
        $this->db->from(' imagens');
        $this->db->join('categorias', 'categorias.id = imagens.id_categorias', 'inner');
        $this->db->where('imagens.capa', 1);
        if($categoria != ""){
            $this->db->where('categorias.id', $categoria);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getHome()
    {
        $query =  $this->db->get('home');
        return $query->result();
    }

    
}
