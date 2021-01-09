<?php

class Home extends Funcionario_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('funcionario/home');
    }
}
