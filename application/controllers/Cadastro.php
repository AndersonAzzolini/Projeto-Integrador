<?php

class Cadastro extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cadastro_model');
        $this->load->view('cadastro');
    }
    public function index()
    {
        if ($_POST) {
            $email = $this->input->post('email');
            $verificaEmail = $this->Cadastro_model->verificaEmpresa($email);
            if ($verificaEmail > 0) {
                $retorno = array(
                    'result' => 'cadastrado'
                );
           
                echo 'email ja cadastrado no sistema';
               // exit();
                //redirect(base_url('admin/login'));     
            } else {
                echo 'caiu no else, segue no cadastro..';
                $insert = array(
                    'nome' => $this->input->post('nome'),
                    'nome_empresa' => $this->input->post('nomeEmpresa'),
                    'email' => $this->input->post('email'),
                    'senha' => $this->input->post('senha'),
                );
                $registerEmpresa = $this->Cadastro_model->registerEmpresa($insert);
                if ($registerEmpresa > 0) {
                    $retorno = array(
                        'result' => true
                    );
                } else {
                    $retorno = array(
                        'result' => false
                    );
                };
                echo json_encode($retorno);
            }
        }
    }
}
