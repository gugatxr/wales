<?php
class Login extends CI_Controller
{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->model('login_model');

    }
    public function index()
    {
        $data['title'] = 'iN informática';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('usuario','Usuário', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        //verifica se foi recebido do formulario os dados para verificar a senha
        if(!$this->form_validation->run() === false){
            if($this->aauth->login($this->input->post('usuario'),$this->input->post('senha'))){
              redirect('');
            }else
            {
              $data['resultado'] = '<div class="alert alert-danger" role="alert">Usuário ou senha incorretos</div>';
              $this->load->view('templates/header', $data);
              $this->load->view('login/login', $data);
              $this->load->view('templates/footer');
            }
        //carrega a tela de login
        }else
        {
          $this->load->view('templates/header', $data);
          $this->load->view('login/login', $data);
          $this->load->view('templates/footer');
        }
    }
    function logout(){
      $this->aauth->logout();
      redirect('login');
    }
}
