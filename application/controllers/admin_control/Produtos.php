<?php

class Produtos extends MY_Controller
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->load->model('admin_control/produtos_model');
        $this->load->helper('form');

    }
    public function index()
    {
        $this->data['title']    = 'Produtos';
        $this->data['produtos'] = $this->produtos_model->get_produtos_basico();
        $this->load->view('admin_control/templates/header', $this->data);
        $this->load->view('admin_control/templates/nav');
        $this->load->view('admin_control/produtos/consultar', $this->data);
        $this->load->view('admin_control/templates/footer');
    }
    public function inserir()
    {
        $this->data['title'] = 'Inserir Produtos';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('vlr_venda', 'Valor de venda', 'required');

        $this->data['marcas'] = $this->produtos_model->get_marcas();
        if($this->form_validation->run() === false)
        {
          $this->load->view('admin_control/templates/nav', $this->data);
          $this->load->view('admin_control/templates/header', $this->data);
          $this->load->view('admin_control/produtos/inserir', $this->data);
          $this->load->view('admin_control/templates/footer');
        }else
        {
            $this->produtos_model->inserir();
            $this->load->view('admin_control/templates/header', $this->data);
            $this->load->view('admin_control/templates/nav', $this->data);
            $this->load->view('admin_control/produtos/inserir');
            $this->load->view('admin_control/templates/footer', $this->data);
        }
    }
    public function excluir()
    {
      $id     = $this->uri->segment('4', 0);
      $result = $this->produtos_model->excluir($id);
      $this->verifica_sucesso($result);
      redirect('admin_control/produtos');
    }
    public function editar()
    {
        $this->data['title'] = 'Inserir Produtos';
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('vlr_venda', 'Valor de venda', 'required');
        $id = $this->uri->segment('4', 0);

        $this->data['dados_produto'] = $this->produtos_model->get_one_produto($id);
        $this->data['marcas'] = $this->produtos_model->get_marcas();

        if($this->form_validation->run() === false)
        {
          $this->load->view('admin_control/templates/nav');
          $this->load->view('admin_control/templates/header', $this->data);
          $this->load->view('admin_control/produtos/editar', $this->data);
          $this->load->view('admin_control/templates/footer');
        }else
        {
          $dados  = array(
              'descricao' => $this->input->post('descricao'),
              'vlr_compra' => $this->input->post('vlr_compra'),
              'vlr_venda' => $this->input->post('vlr_venda'),
              'codigo_barras' => $this->input->post('codigo_barras'),
              'id_especie' => 1,
              'id_marca' => $this->input->post('marca'),
              'quantidade' => $this->input->post('quantidade'),
              'mostra_loja' => $this->input->post('mostra_loja'),
          );
            $result = $this->produtos_model->editar($dados, $id);
            $this->verifica_sucesso($result, 'Produto editado com sucesso');
            redirect('admin_control/produtos');
        }
    }
    public function pesquisa()
    {
      $this->data['title']    = 'Resultado pesquisa produtos';

      $nome_produto           =  $this->input->get('descricao');
      $this->data['produtos'] = $this->produtos_model->get_produtos_pesquisa($nome_produto);

      $this->load->view('admin_control/templates/header', $this->data);
      $this->load->view('admin_control/templates/nav', $this->data);
      $this->load->view('admin_control/produtos/pesquisa', $this->data);
      $this->load->view('admin_control/templates/footer');
    }
    public function fotos()
    {
      $this->data['title']            = 'Adicionar Foto | Produtos';
      $config['upload_path']          = './assets/img/produtos';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1000;
      $config['max_width']            = 2000;
      $config['max_height']           = 1500;

      $this->load->library('upload', $config);

      $this->data['id'] = $this->uri->segment('4', 0);
      $this->data['error'] = '';

      $this->data['dados_produto'] = $this->produtos_model->get_one_produto($this->data['id']);


      if ( ! $this->upload->do_upload('userfile'))
      {
              $error = array('error' => $this->upload->display_errors());
              $this->load->view('admin_control/templates/header', $this->data);
              $this->load->view('admin_control/templates/nav');
              $this->load->view('admin_control/produtos/foto', $error);
              $this->load->view('admin_control/templates/footer');
      }
      else
      {
              $this->data['upload_data'] = $this->upload->data();

              $dados = array(
                'nome_arquivo'  => $this->data['upload_data']['file_name'],
                'descricao'     => $this->input->post('descricao'),
                'id_produto'    => $this->data['id']
              );

              $this->load->view('admin_control/templates/header', $this->data);
              $this->load->view('admin_control/templates/nav');
              $this->load->view('admin_control/produtos/adicionar_fotos', $this->data);
              $this->load->view('admin_control/templates/footer');
      }
    }
    public function adicionar_fotos()
    {
                $this->data['title']            = ' Produtos|Wales';
                $config['upload_path']          = './assets/img/produtos';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('admin_control/templates/header', $this->data);
                        $this->load->view('admin_control/templates/nav');
                        $this->load->view('admin_control/produtos/foto', $error);
                        $this->load->view('admin_control/templates/footer');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('admin_control/templates/header', $this->data);
                        $this->load->view('admin_control/templates/nav');
                        $this->load->view('admin_control/produtos/fotos', $data);
                        $this->load->view('admin_control/templates/footer');
                }
    }
}
