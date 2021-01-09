<?php
    
    class Produtos extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produtos_model');
    }
    public function index()
    {
        $this->load->view('admin/produtos');
    }
}
