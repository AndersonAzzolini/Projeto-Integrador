<?php

class Cardapio extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Cardapio_model');
    }
    public function index()
    {
        $this->load->view('admin/includes/header');
        $this->load->view('admin/cardapio/cardapio');
        $this->load->view('admin/includes/footer');
    }

    public function cadastro_refeicao()
    {
        if ($_POST) {
            extract($_POST);
            $retorno = 'caiu no cadastro';
            echo json_encode($retorno);
        }
    }
    public function list_refeicao()
    {
        $retorno = array(
            'title' => 'testesss',
            'start' => '2021-01-01',
            'color' => '#FF0000'
        );
        echo json_encode($retorno);
    }
}
