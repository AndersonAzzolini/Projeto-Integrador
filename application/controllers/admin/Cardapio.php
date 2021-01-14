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
}
