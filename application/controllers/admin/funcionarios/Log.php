<?php

class Log extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcionario_model');
        $this->load->model('admin/log_model');
    }
    public function index()
    {
        $this->load->view('admin/includes/header');
        $this->load->view('admin/funcionarios/log');
        $this->load->view('admin/includes/footer');
    }

    public function lista_logs()
    {
        
    }
}
