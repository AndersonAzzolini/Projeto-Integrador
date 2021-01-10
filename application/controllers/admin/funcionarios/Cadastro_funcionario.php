<?php

class Cadastro_funcionario extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcionario_model');
        $this->load->model('Login_model');
        $this->load->view('admin/funcionarios/index');
    }
    public function index()
    {
    }

    public function registerFuncionario()
    {
        if ($_POST) {
            $where = array(
                'email' => $this->input->post('emailFuncionario'),
                'id_empresa'=> $this->session->userdata('id')
            );
            $verificaEmail = $this->Funcionario_model->verificaFuncionario($where);
            if ($verificaEmail > 0) {
                $retorno = array(
                    'result' => 'cadastrado'
                );
                echo 'email ja cadastrado no sistema';
            } else {
                $insert = array(
                    'nome' => $this->input->post('nomeFuncionario'),
                    'sobrenome' => $this->input->post('sobrenomeFuncionario'),
                    'email' => $this->input->post('emailFuncionario'),
                    'senha' => $this->input->post('senhaFuncionario'),
                    'id_empresa' => $this->session->userdata('id'),
                    'usuario_ativo' => 1

                );
                $registerFuncionario = $this->Funcionario_model->registerFuncionario($insert);
                if ($registerFuncionario > 0) {
                    echo 'Fúncionario Cadastrado com sucesso..';

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
