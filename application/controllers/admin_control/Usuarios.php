<?php
  class Usuarios extends CI_Controller
  {
      public function __CONSTRUCT()
      {
          parent::__construct();
          $this->load->model('usuarios_model');
          if (!$this->session->has_userdata('nome')) {
            unset($_COOKIE);
            $this->session->sess_destroy();
            redirect('admin_control/login');
          }else{
            $this->session->mark_as_temp(['nome' => 600, 'permissao' => 600]);
          }
      }
      public function index()
      {
        $this->load->library('pagination');
        $data['cabecalho'] = '<div class="page-header">
        <h1>Gerenciamento <small> Usuários</small></h1>
        </div>';

        $data['title']    = 'Gerenciador usuários';
        // retorna os usuarios.
        // return array objeto
        $data['usuarios'] = $this->usuarios_model->get_usuarios();
        // var_dump($data['usuarios']);
        // exit();


        $this->load->view('templates/nav', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('admin_control/usuarios/index', $data);
        // $this->load->view('templates/footer');
      }

      public function excluir()
      {
        if($this->input->get('id') == '1')
        {
            $data['excluir'] = '<div class="alert alert-danger" role="alert">Usuário administrador não pode ser excluído</div>';
        }else
        {
            $id_usuario = $this->input->get_post('id');
            $resultado  = $this->aauth->delete_user($id_usuario);
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
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('permissao', 'Permissão', 'required');

            if($this->form_validation->run() === false)
            {
              //recupera a lista de groupos de permissões
              $this->load->model('permissoes_model');

              $data['permissoes'] = $this->permissoes->get_permissoes();

              $this->load->view('templates/header', $data);
              $this->load->view('usuarios/adicionar', $data);
              $this->load->view('templates/footer');
            }else
            {
                //recupera a lista de groupos de permissões
                $data['permissoes'] = $this->aauth->list_groups();

                $this->usuarios_model->set_usuarios();

                $this->load->view('templates/header', $data);
                $this->load->view('usuarios/adicionar');
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
