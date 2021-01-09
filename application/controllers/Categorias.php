<?php

class Categorias extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categorias_model');
    }
    public function formatura()
    {
        $this->load->view('categorias/formatura');
    }
    public function aia()
    {
        $this->load->view('categorias/aia');
    }
    public function noiva()
    {
        $this->load->view('categorias/noiva');
    }
    public function infantil()
    {
        $this->load->view('categorias/infantil');
    }
}
