<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logado') != true) {
            $this->session->set_flashdata('mensagem', 'Realize o login primeiro');
            redirect(base_url('admin/login'));
        }
    }
    public function action()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $where = array(
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha')
            );
            $busca = $this->Login_model->get($where);
            if ($busca) {
                $sessao = array('logado' => true, 'nome' => $busca->nome, 'id' => $busca->id, 'email' => $busca->email);
                $this->session->set_userdata($sessao);
                redirect(base_url('contatos'));
            } else {
                $this->session->set_flashdata('mensagem', 'Login inválido');
                redirect(base_url('login'));
            }
        }
    }
}

class Funcionario_Controller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logado') != true) {
            $this->session->set_flashdata('mensagem', 'Realize o login primeiro');
            redirect(base_url('funcionarios/login'));
        }
    }
    public function index()
    {
        $this->load->view('funcionario/login');
    }

    public function action()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $where = array(
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha')
            );
            $busca = $this->Login_model->get($where);
            if ($busca) {
                $sessao = array('logado' => true, 'nome' => $busca->nome);
                $this->session->set_userdata($sessao);
                redirect(base_url('funcionarios/home'));
            } else {
                $this->session->set_flashdata('mensagem', 'Login inválido');
                redirect(base_url('funcionarios/login'));
            }
        }
    }

}

