<?php
  class Usuarios extends CI_Controller
  {
      public function __CONSTRUCT()
      {
          parent::__construct();
          $this->load->model('usuarios_model');
          if ($this->session->has_userdata('usuario')) {
            $this->session->mark_as_temp('usuario', 600);
          }else {
            redirect('login');
          }
      }
      public function index()
      {
        $data['cabecalho'] = '<div class="page-header">
        <h1>Gerenciamento <small> Usuários</small></h1>
        </div>';

        $data['title'] = 'Gerenciador usuários';
        $data['usuarios'] = $this->usuarios_model->get_usuarios();

        $this->load->view('templates/header', $data);
        $this->load->view('usuarios/index', $data);
        $this->load->view('templates/footer');
      }

      public function excluir()
      {
        if($this->input->get('id') == '1')
        {
            $data['excluir'] = '<div class="alert alert-danger" role="alert">Usuário administrador não pode ser excluído</div>';
        }else
        {
            $resultado = $this->usuarios_model->excluir();
            if($resultado === TRUE)
            {
              $data['excluir'] = '<div class="alert alert-success " role="alert">Excluído com sucesso</div>';
            }elseif($resultado === FALSE)
            {
              $data['excluir'] = '<div class="alert alert-danger" role="alert">Erro ao excluir</div>';

            }
        }

        $data['cabecalho'] = '<div class="page-header">
                                <h1>Gerenciamento <small> Usuários</small></h1>
                              </div>';

        $data['title'] = 'Gerenciador usuários';
        $data['usuarios'] = $this->usuarios_model->get_usuarios();
        $this->load->view('templates/header', $data);
        $this->load->view('usuarios/index', $data);
        $this->load->view('templates/footer');
      }

      function adicionar(){

        $data['title'] = 'Adicionar usuários';
        $permissoes = $this->permissoes->prepara_permissoes($this->session->permissoes);
        if ($permissoes['usuarios']['inserir']) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['permissoes'] = $this->usuarios_model->get_permissoes();

            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('usuario', 'Usuário', 'required');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('id_permissoes', 'Permissão', 'required');

            if($this->form_validation->run() === false)
            {
              $this->load->view('templates/header', $data);
              $this->load->view('usuarios/adicionar');
              $this->load->view('templates/footer');
            }else
            {

                $this->usuarios_model->set_usuarios();

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/adicionar');
                $this->load->view('templates/footer');
          }}else{
            $this->load->view('templates/header', $data);
            $this->load->view('templates/permissao', $data);
            $this->load->view('templates/footer');
          }
        }


        public function editar(){
          $this->load->helper('form');
          $this->load->library('form_validation');

          $data['title'] = 'Editar usuários';

          if($this->input->get('id'))
          {
            $data['permissoes'] = $this->usuarios_model->get_permissoes();
            $data['usuario'] = $this->usuarios_model->get_one_usuario();
          }

          $this->form_validation->set_rules('nome', 'Nome', 'required');
          $this->form_validation->set_rules('usuario', 'Usuário', 'required');
          $this->form_validation->set_rules('email', 'Email', 'required');
          $this->form_validation->set_rules('id_permissoes', 'Permissão', 'required');

          if($this->form_validation->run() === false)
          {
            $data['usuario'] = $this->usuarios_model->get_one_usuario();
            $this->load->view('templates/header', $data);
            $this->load->view('usuarios/editar');
            $this->load->view('templates/footer');
          }else
          {
              $this->usuarios_model->edita_usuario();
              redirect('usuarios/index');
        }
      }
  }
