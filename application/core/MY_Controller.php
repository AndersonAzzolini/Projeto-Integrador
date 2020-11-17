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
        $this->_header();
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
                $sessao = array('logado' => true, 'nome' => $busca->nome);
                $this->session->set_userdata($sessao);
                redirect(base_url('contatos'));
            } else {
                $this->session->set_flashdata('mensagem', 'Login inválido');
                redirect(base_url('login'));
            }
        }
    }
    public function __destruct()
    {
        $this->_footer();
    }
    public function _header()
    {
        $this->load->view('admin/includes/header');
    }
    public function _footer()
    {
        ##faz a inclusão do arquivo do modo tradicional pois não tem mais acesso a CI_Controller
        require_once(APPPATH . 'views/admin/includes/footer.php');
    }
}

class Public_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_header();
    }
    public function __destruct()
    {
        $this->_footer();
    }
    public function _header()
    {
        $this->load->view('includes/header');
    }
    public function _footer()
    {
        ##faz a inclusão do arquivo do modo tradicional pois não tem mais acesso a CI_Controller
        require_once(APPPATH . 'views/includes/footer.php');
    }
}
