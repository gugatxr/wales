<?php
  class Usuarios extends MY_Controller
  {
      public function __CONSTRUCT()
      {
          parent::__construct();
          $this->load->model('admin_control/usuarios_model');
            $this->permissoes->esta_logado();
            if(!$this->session->permissao['usuarios']['visualizar'] === TRUE ){
              $this->permissoes->nao_autorizado();
            }
            $this->data['resultado_excluir'] = FALSE;
      }
      public function index()
      {
        $this->load->library('pagination');
        $this->data['cabecalho'] = '<div class="page-header">
        <h1>Gerenciamento <small> Usuários</small></h1>
        </div>';

        $this->data['title']    = 'Gerenciador usuários';
        // retorna os usuarios.
        // return array objeto
        $this->data['usuarios'] = $this->usuarios_model->get_usuarios();

        $this->load->view('admin_control/templates/nav', $this->data);
        $this->load->view('admin_control/templates/header', $this->data);
        $this->load->view('admin_control/usuarios/index', $this->data);
        // $this->load->view('admin_control/templates/footer');
      }
      public function excluir()
      {
        if($this->input->get('id') == '1')
        {
            $this->data['excluir'] = '<div class="alert alert-danger" role="alert">Usuário administrador não pode ser excluído</div>';
        }else
        {
            $id_usuario = $this->input->get_post('id');
            $resultado  = $this->usuarios_model->delete();
            if($resultado === TRUE)
            {
              $this->data['resultado_excluir'] = '<div class="alert alert-success " role="alert">Excluído com sucesso</div>';
            }elseif($resultado === FALSE)
            {
              // $this->session->set_userdata('resultado_excluir') = '<div class="alert alert-danger" role="alert">Erro ao excluir</div>';
            }
        }

        $this->data['cabecalho'] = '<div class="page-header">
                                <h1>Gerenciamento <small> Usuários</small></h1>
                              </div>';

        $this->data['title'] = 'Gerenciador usuários';
        $this->data['usuarios'] = $this->usuarios_model->get_usuarios();
        $this->load->view('admin_control/templates/header', $this->data);
        $this->load->view('admin_control/templates/nav', $this->data);
        $this->load->view('admin_control/usuarios/index', $this->data);
        $this->load->view('admin_control/templates/footer');
      }
      public function adicionar()
      {

            $this->data['title'] = 'Adicionar usuários';
            $this->load->helper('form', 'mostra_info');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('permissao', 'Permissão', 'required');
            $this->ativa_debugbar;
            $this->data['resultado_inserir'] = '';
            if($this->form_validation->run() === false)
            {
              //recupera a lista de groupos de permissões
              $this->load->model('admin_control/permissoes_model');

              $this->data['permissoes'] = $this->usuarios_model->get_permissoes();
              $this->load->view('admin_control/templates/header', $this->data);
              $this->load->view('admin_control/templates/nav');
              $this->load->view('admin_control/usuarios/adicionar', $this->data);
              $this->load->view('admin_control/templates/footer');
            }else
            {
                //recupera a lista de groupos de permissões
                $resultado_inserir = $this->usuarios_model->set_usuario();
                if($resultado_inserir === TRUE){
                  $this->data['resultado_inserir'] = '
                    <div class="alert alert-success text-center">
                      <strong>Successo!</strong> Registro inserido sem erros.
                    </div>';
                }else{
                  $this->data['resultado_inserir'] = '
                    <div class="alert alert-danger text-center">
                      <strong>Erro!</strong> Verifique os dados e tente inserir novamente.
                    </div>
                  ';
                }
                $this->data['permissoes'] = $this->usuarios_model->get_permissoes();

                $this->load->view('admin_control/templates/header', $this->data);
                $this->load->view('admin_control/templates/nav');
                $this->load->view('admin_control/usuarios/adicionar');
                $this->load->view('admin_control/templates/footer');
          }
        }
      public function editar()
      {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->data['title'] = 'Editar usuários';

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('usuario', 'Usuário', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('permissao', 'Permissão', 'required');

        if($this->form_validation->run() === false)
        {
          $this->data['permissoes'] = $this->usuarios_model->get_permissoes();
          $this->data['usuario'] = $this->usuarios_model->select_one_usuario();

          $this->load->view('admin_control/templates/header', $this->data);
          $this->load->view('admin_control/usuarios/editar');
          $this->load->view('admin_control/templates/footer');
        }else
        {
            $this->usuarios_model->edita_usuario();
            redirect('admin_control/usuarios/');
        }
      }
  }
