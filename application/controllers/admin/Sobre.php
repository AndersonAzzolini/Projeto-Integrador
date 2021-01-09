<?php

class Sobre extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sobre_model');
    }
    public function index()
    {
        $sobre['sobre'] =  $this->Sobre_model->GetSobre();
        $imagem['imagem'] =  $this->Sobre_model->GetSobre();

        $this->load->view('admin/sobre', $sobre);
    }
    public function editSobre()
    {
        $sobre['sobre'] =  $this->Sobre_model->GetSobre();
        $this->load->view('admin/form', $sobre);
    }

    public function atualizar()
    {
        $assuntoSobre = $this->input->post("assunto_sobre");   
        $arquivo    = $_FILES['arquivo'];
        $configuracao = array(
            'upload_path'   => './public/uploads',
            'allowed_types' => 'jpeg',
            'file_name'     => $arquivo.'.jpeg',
        );
        $this->load->library('upload');
        $this->upload->initialize($configuracao);
        if ($this->upload->do_upload('arquivo')){
            echo 'Arquivo salvo com sucesso.';
        }
            
        else{
            echo $this->upload->display_errors();
        }
       /* $sql = "UPDATE sobre SET descricao = '$assuntoSobre'";
        $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('mensagem', 'Atualizado com sucesso');
            redirect(base_url('admin/home'));
        } else {
            $this->session->set_flashdata('mensagem', 'Erro ao Atualizar');
        } 
    */
    }
}
