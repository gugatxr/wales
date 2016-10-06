<?php
class Login extends CI_Controller
{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->model('login_model');
        if ($this->session->has_userdata('usuario')) {
          $this->session->mark_as_temp('usuario', 600);
        }
    }
    public function index()
    {
        $data['title'] = 'iN informática';
        //verifica se foi recebido do formulario os dados para verificar a senha
        if(null !== $this->input->post('login')){
            $numero_usuarios = $this->login_model->valida_login();
            if($numero_usuarios === true){

              $dados_usuario = $this->login_model->get_usuario_sessao();
              // $this->session->sess_destroy();
              $dados_usuario = array('usuario' => $dados_usuario[0]['usuario'], 'nome' => $dados_usuario[0]['nome'], 'permissoes' => $dados_usuario[0]['permissoes']);
              // exit();
              $this->session->set_userdata($dados_usuario);
              $this->session->mark_as_temp('usuario', 600);
              session_write_close();
              redirect('');
            }elseif($numero_usuarios === false)
            {
              $data['resultado'] = '<div class="alert alert-danger" role="alert">Usuário ou senha incorretos</div>';
              $this->load->view('templates/header', $data);
              $this->load->view('home/login', $data);
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
      $this->session->sess_destroy();
      redirect('login');
    }
}
