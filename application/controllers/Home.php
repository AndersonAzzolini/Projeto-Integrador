<?php

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('home/index');
        $this->load->view('includes/footer');

    }
}
