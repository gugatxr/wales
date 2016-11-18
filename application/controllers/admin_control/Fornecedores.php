<?php

class Fornecedores extends MY_Controller
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->load->model('admin_control/fornecedores_model');
    }
    public function index()
    {
        $this->data['title']          = 'Fornecedores';
        //é passado no parametro o tipo da pessoa.
        // tipo 1 é igual a fornecedor
        $this->data['fornecedores']   = $this->fornecedores_model->get_basico();
        $this->load->view('admin_control/templates/header', $this->data);
        $this->load->view('admin_control/templates/nav');
        $this->load->view('admin_control/fornecedores/consultar', $this->data);
        $this->load->view('admin_control/templates/footer');
    }
    public function inserir()
    {
        $this->data['title'] = 'Inserir Produtos';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('admin_control/marcas_model');
        $marcas = $this->marcas_model->get_marcas();

        $this->data['teste'] = json_encode($marcas);
        // var_dump($this->data);
        // exit;
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');

        if($this->form_validation->run() === false)
        {
          $this->load->view('admin_control/templates/nav');
          $this->load->view('admin_control/templates/header', $this->data);
          $this->load->view('admin_control/fornecedores/inserir', $this->data);
          $this->load->view('admin_control/templates/footer');
        }else
        {
            $dados = array(
              'descricao' => $this->input->post('descricao')
            );
            $result = $this->fornecedores_model->inserir($dados);
            $this->verifica_sucesso($result);
            redirect('admin_control/fornecedores');
        }
    }
    public function editar()
    {



        $this->data['title'] = 'Inserir Produtos';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $id                  = ['id' => $this->uri->segment('4', 0)];
        $this->data['dados'] = $this->fornecedores_model->get_one($id);

        $this->ativa_debugbar([$this->data, 'id' =>$id]);

        if($this->form_validation->run() === false)
        {
          $this->load->view('admin_control/templates/nav');
          $this->load->view('admin_control/templates/header', $this->data);
          $this->load->view('admin_control/fornecedores/editar', $this->data);
          $this->load->view('admin_control/templates/footer');
        }else
        {
            $dados = array(
              'descricao' => $this->input->post('descricao')
            );
            $id     = $this->uri->segment('4', 0);
            $result = $this->fornecedores_model->editar($dados, $id);
            $this->verifica_sucesso($result);
            redirect('admin_control/fornecedores');
        }
    }
    public function excluir()
    {
      $id     = $this->uri->segment('4', 0);
      $result = $this->fornecedores_model->excluir($id);
      $this->verifica_sucesso($result);
      redirect('admin_control/fornecedores');
    }
}
