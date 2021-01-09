<?php

class Orcamento extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Orcamento_model');
        $this->load->view('orcamento');

    }

    public function index(){

    }
}
