<?php

class Cadastro_funcionario extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcionario_model');
        $this->load->model('Login_model');
    }
    public function index()
    {
        $this->load->view('admin/includes/header');
        $this->load->view('admin/funcionarios/index');
        $this->load->view('admin/includes/footer');
    }

    public function registerFuncionario()
    {
        if ($_POST) {
            $where = array(
                'email' => $this->input->post('emailFuncionario'),
                'id_empresa' => $this->session->userdata('id')
            );
            $verificaEmail = $this->Funcionario_model->verificaFuncionario($where);
            if ($verificaEmail > 0) {
                $retorno = array(
                    'result' => 'cadastrado'
                );
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
                    $buscaEmail = $this->Funcionario_model->buscaEmail($this->input->post('emailFuncionario'));
                    foreach ($buscaEmail as $row) {
                        $insertPermissoes = array(
                            'id_funcionario' => $row->id
                        );
                        $CadastraTabelaPermissao = $this->Funcionario_model->insert_funcionario_permissao($insertPermissoes);
                        if ($CadastraTabelaPermissao > 0) {
                            $retorno = array(
                                'result' => true
                            );
                        }
                    }
                }
            }
            echo json_encode($retorno);
        }
    }
}
