<?php
    
    class Cadastro extends Admin_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Funcionario_model');
            $this->load->view('admin/funcionarios/index');

        }
        public function index()
        {
            if($_POST){
                echo 'entrou na função de registro';
            }
        }
        
        public function registerFuncionario()
        {
            if($_POST){
                echo 'entrou na função de registro';
            }
        }

    }
    