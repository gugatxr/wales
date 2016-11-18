<?php

class Cliente extends MY_home{
  public function __CONSTRUCT()
  {
    parent::__CONSTRUCT();
  }
  public function index()
  {
  }
  public function cadastrar()
  {
    $this->data['title'] = 'Cadastre-se com a gente';
    $this->load->helper('form', 'mostra_info');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nome', 'Nome', 'required');
    $this->form_validation->set_rules('senha', 'Senha', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('permissao', 'Permissão', 'required');

    $this->data['resultado_inserir'] = '';
    if($this->form_validation->run() === false)
    {
      //recupera a lista de groupos de permissões

      $this->load->view('home/templates/header', $this->data);
      $this->load->view('home/templates/nav');
      $this->load->view('home/cliente/cadastrar', $this->data);
      $this->load->view('home/templates/footer');
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


}
