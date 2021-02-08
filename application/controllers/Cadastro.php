<?php

class Cadastro extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cadastro_model');
    }
    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('cadastro');
        $this->load->view('includes/footer');
    }

    public function cadastroEmpresa()
    {
        if ($_POST) {
            $email = $this->input->post('email');
            $verificaEmail = $this->Cadastro_model->verificaEmpresa($email);
            if ($verificaEmail > 0) {
                $retorno = array(
                    'result' => 'cadastrado'
                );
            } else {
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
            }
            echo json_encode($retorno);
        }
    }
}
