<?php

class Home extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('home/index');

    }
}
