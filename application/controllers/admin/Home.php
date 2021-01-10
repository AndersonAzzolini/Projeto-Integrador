<?php

class Home extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index()
    {

        $this->load->view('admin/home/index');
    }
}
