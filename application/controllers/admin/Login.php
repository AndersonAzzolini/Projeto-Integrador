<?php

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function action()
    {
        $this->form_validation->set_rules('loginEmail', 'loginEmail', 'required|valid_email');
        $this->form_validation->set_rules('loginSenha', 'loginSenha', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $where = array(
                'email' => $this->input->post('loginEmail'),
                'senha' => $this->input->post('loginSenha')
            );
            $busca = $this->Login_model->get($where);
            if ($busca) {
                $sessao = array('logado' => true, 'nome' => $busca->nome, 'email' => $busca->email, 'id' => $busca->id);
                $this->session->set_userdata($sessao);
                redirect(base_url('admin/home'));
            } else {
                $this->session->set_flashdata('mensagem', 'Login inválido');
                redirect(base_url('admin/login'));
            }
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('admin/login'));
    }
}
