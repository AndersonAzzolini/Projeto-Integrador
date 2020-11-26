<?php

class Home extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index()
    {
        $data['cards'] =  $this->Home_model->GetCards();
        $data['home'] =  $this->Home_model->getHome();
        $data['sobre'] =  $this->Home_model->GetSobre();
        $this->load->view('home/index', $data);
    }
}
