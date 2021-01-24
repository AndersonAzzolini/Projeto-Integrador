<?php

class Permissoes extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Permissoes_model');
    }
    public function index()
    {
    }
    public function buscaPermissao()
    {
        if ($_POST) {
            extract($_POST);
            $permissao =  $this->Permissoes_model->busca_permissoes($id);
            foreach ($permissao as $row) {
                $permissaoRefeicao = $row['cadastrar_refeicao'];
                $permissaoCadastro = $row['cadastrar_funcionario'];
                $retorno = array(
                    'permissaoCadastro' => $permissaoCadastro,
                    'permissaoRefeicao' => $permissaoRefeicao
                );
                echo json_encode($retorno);
            }
        }
    }

    public function AtualizaPermissao()
    {
        if ($_POST) {
            extract($_POST);
            $updatePermissoes = array(
                'cadastrar_funcionario' => $permissaoCadastrar,
                'cadastrar_refeicao' => $permissaoRefeissoes
            );
            $atualizaPermissoes = $this->Permissoes_model->updatePermissao($updatePermissoes, $id);
            if ($atualizaPermissoes > 0) {
                $retornoPermissoes = true;
            } else {
                $retornoPermissoes = false;
            }
            echo json_encode($retornoPermissoes);
        }
    }
}
