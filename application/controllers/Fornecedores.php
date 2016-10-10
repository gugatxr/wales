<?php

class Fornecedores extends CI_Controller
{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        // $this->load->model('home_model');
        if (!$this->aauth->is_loggedin()) {
          redirect('login');
        }
    }
    public function index()
    {
        $data['title'] = 'iN informática';
        $data['cabecalho'] = '<div class="page-header">
        <h1>Fornecedores</h1>
        </div>';

        $this->load->view('templates/header', $data);
        $this->load->view('fornecedores/index', $data);
        $this->load->view('templates/footer');
    }
}
