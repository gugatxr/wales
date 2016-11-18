<?php

class Marcas extends MY_Controller
{

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->load->model('admin_control/marcas_model');
    }
    public function index()
    {
        $this->data['title']    = 'Marcas';
        $this->data['marcas']   = $this->marcas_model->get_marcas();
        $this->load->view('admin_control/templates/header', $this->data);
        $this->load->view('admin_control/templates/nav');
        $this->load->view('admin_control/marcas/consultar', $this->data);
        $this->load->view('admin_control/templates/footer');
    }
    public function inserir()
    {
        $this->data['title'] = 'Inserir Produtos';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('descricao', 'Descrição', 'required');

        if($this->form_validation->run() === false)
        {
          $this->load->view('admin_control/templates/nav');
          $this->load->view('admin_control/templates/header', $this->data);
          $this->load->view('admin_control/marcas/inserir', $this->data);
          $this->load->view('admin_control/templates/footer');
        }else
        {
            $dados = array(
              'descricao' => $this->input->post('descricao')
            );
            $result = $this->marcas_model->inserir($dados);
            $this->verifica_sucesso($result);
            redirect('admin_control/marcas');
        }
    }
    public function editar()
    {



        $this->data['title'] = 'Inserir Produtos';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $id                  = ['id' => $this->uri->segment('4', 0)];
        $this->data['dados'] = $this->marcas_model->get_one($id);

        $this->ativa_debugbar([$this->data, 'id' =>$id]);

        if($this->form_validation->run() === false)
        {
          $this->load->view('admin_control/templates/nav');
          $this->load->view('admin_control/templates/header', $this->data);
          $this->load->view('admin_control/marcas/editar', $this->data);
          $this->load->view('admin_control/templates/footer');
        }else
        {
            $dados = array(
              'descricao' => $this->input->post('descricao')
            );
            $id     = $this->uri->segment('4', 0);
            $result = $this->marcas_model->editar($dados, $id);
            $this->verifica_sucesso($result);
            redirect('admin_control/marcas');
        }
    }
    public function excluir()
    {
      $id     = $this->uri->segment('4', 0);
      $result = $this->marcas_model->excluir($id);
      $this->verifica_sucesso($result);
      redirect('admin_control/marcas');
    }
}
