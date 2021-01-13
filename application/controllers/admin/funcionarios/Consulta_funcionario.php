<?php

class Consulta_funcionario extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcionario_model');
    }
    public function index()
    {
        $funcionario['funcionario'] = $this->Funcionario_model->BuscaFuncionario();
        $this->load->view('admin/includes/header');

        $this->load->view('admin/funcionarios/consulta_funcionarios', $funcionario);
        $this->load->view('admin/includes/footer');
    }
    public function AlteraSituacao()
    {
        if ($_POST) {
            extract($_POST);
            if ($situacao == 0) {
                $update = $this->Funcionario_model->UpdateSituacao($id, $situacao);
                if ($update > 0) {
                    $retorno = array(
                        'result' => true,
                        'mensagem' => 'Usuario desativado com sucesso!'
                    );
                } else {
                    $retorno = array(
                        'result' => false,
                        'mensagem' => 'Erro ao desativar usuario!'
                    );
                }
            } else {
                $update = $this->Funcionario_model->UpdateSituacao($id, $situacao);
                if ($update > 0) {
                    $retorno = array(
                        'result' => 'desativado',
                        'mensagem' => 'Usuario ativado com sucesso!'
                    );
                } else {
                    $retorno = array(
                        'result' => 'falseDesativado',
                        'mensagem' => 'Erro ao ativar usuario!'
                    );
                }
            }
            echo json_encode($retorno);
        }
    }
}
