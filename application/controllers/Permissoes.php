<?php

  class Permissoes extends CI_Controller{
    function __CONSTRUCT(){
      parent::__CONSTRUCT();
      $this->load->model('permissoes_model');
      $this->load->helper('url');
      $this->load->library(['session', 'permissoes']);
      if ($this->session->has_userdata('usuario')) {
        $this->session->mark_as_temp('usuario', 600);
      }else {
        redirect('login');
      }
    }
    public function index()
    {
        $data['title'] = 'Gerenciador permissões';
        $data['cabecalho'] = '<div class="page-header">
                                <h1>Gerenciamento <small> Permissões</small></h1>
                              </div>';
        $data['permissoes'] = $this->permissoes_model->get_permissoes();

        $this->load->view('templates/header', $data);
        $this->load->view('permissoes/index', $data);
        $this->load->view('templates/footer');

    }
    function inserir(){
      $data['title'] = 'Gerenciador permissões';
      $data['cabecalho'] = '<div class="page-header">
                              <h1> Inserir <small> Permissões</small></h1>
                            </div>';

      $this->load->helper('form');
      $this->load->library('form_validation');

      if($this->input->post('descricao') === null)
      {
        // var_dump($this->input->post('descricao'));
          $this->load->view('templates/header', $data);
          $this->load->view('permissoes/inserir', $data);
          $this->load->view('templates/footer');
      }else
      {
          $this->permissoes_model->inserir();
          $this->load->view('templates/header', $data);
          $this->load->view('permissoes/index', $data);
          $this->load->view('templates/footer');
      }
    }
    public function excluir()
    {
      $data['title'] = 'Gerenciador permissões';
      $data['cabecalho'] = '<div class="page-header">
                              <h1>Gerenciamento <small> Permissões</small></h1>
                            </div>';
      $this->pemrissoes_model->exluir();
      $this->load->view('templates/header', $data);
      $this->load->view('permissoes/index', $data);
      $this->load->view('templates/footer');
    }
    

  }
