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
        $data['cards'] =  $this->Home_model->GetCards();
        $data['home'] =  $this->Home_model->getHome();
        $data['sobre'] =  $this->Home_model->GetSobre();

        $this->load->view('admin/home/index', $data);
    }
}
