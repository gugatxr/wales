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
            if($this->login_model->valida_login()){

              $dados = $this->login_model->get_dados_depois_login();
              $this->session->nome = $dados[0]['nome'];
              $this->session->permissao = $this->tratar_permissao($dados[0]['permissao']);
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
      $this->session->sess_destroy();
      redirect('login');
    }
    //tratar as permissoes que estão salvas no banco de dados no formato TABLE,SELECT,INSERT,UPDATE,DELETE,|TABLE,SELECT,INSERT,UPDATE,DELETE,
    private function tratar_permissao($permissoes)
    {
      //$permissoes em array a | e deixando cada tabela em posicao diferentes
      $permissoes = explode( '|' , $permissoes);
      foreach ($permissoes as $key => $value) {
        //separa o nome da tabela e as permissoes individuais
        $permissao[] = explode(",", $value);
        //adiciona o nome da tabela como indexador, e cria um outro array para indicando cada função como 0 ou 1
        $permissoes[$permissao[$key][0]] = array ('visualizar' => $permissao[$key][1],
        'inserir' => $permissao[$key][2],
        'editar' => $permissao[$key][3],
        'deletar' => $permissao[$key][4]);
        //exclui permissão antiga que estava no array
        unset($permissoes[$key]);
      }
      return $permissoes;
    }

}
