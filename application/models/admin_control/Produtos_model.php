<?php
  class Produtos_model extends CI_Model
  {
    private $tabela_marca = 'marcas';
    private $tabela = 'produtos';

    public function __construct()
    {
      $this->load->database();
    }
    function get_marcas()
    {
      $query = $this->db->get($this->tabela_marca);
      return $query->result();
    }
    public function get_produtos_basico()
    {
      $this->db->select("id, descricao, vlr_venda, quantidade,REPLACE(REPLACE(mostra_loja, 0, 'Não'), 1, 'Sim') as mostra_loja");
      $query = $this->db->get($this->tabela);
      return $query->result();
    }
    // função para buscar um produto para o add ao carrinho
    // retorna objeto
    public function get_one_produto_carrinho()
    {
      $this->db->select('p.id, p.descricao, m.descricao as marca ,p.vlr_venda as valor ');
      $this->db->join('marcas m', 'p.id_marca=m.id');
      $this->db->where(['p.id' => $this->uri->segment('3', 0)]);
      $query = $this->db->get('produtos p');
      return $query->result_array();
    }

    // retorna os produtos para serem exibidos na area
    public function get_produtos_vitrine()
    {
      $this->db->select('p.id, p.descricao, m.descricao as marca ,p.vlr_venda as valor ');
      $this->db->join('marcas m', 'p.id_marca=m.id');
      $this->db->where(['mostra_loja' => 1]);
      $query = $this->db->get('produtos p');
      // var_dump($this->db);
      // exit;
      return $query->result();
    }
    // retorna os produtos para serem exibidos na area
    public function get_one_produto($id)
    {
      $this->db->where(['id' => $id]);
      $query = $this->db->get('produtos p');
      return $query->result();
    }
    public function inserir(){
        $dados = array(
            'descricao' => $this->input->post('descricao'),
            'vlr_compra' => $this->input->post('vlr_compra'),
            'vlr_venda' => $this->input->post('vlr_venda'),
            'codigo_barras' => $this->input->post('codigo_barras'),
            'id_especie' => 1,
            'id_marca' => $this->input->post('marca'),
            'quantidade' => $this->input->post('quantidade'),
            'mostra_loja' => $this->input->post('mostra_loja'),
        );
        $resultado = $this->db->insert($this->tabela, $dados);
        return $resultado;
    }
    public function excluir($id)
    {
      $this->db->where(['id' => $id]);
      $result = $this->db->delete($this->tabela);
      return $result;
    }
    public function editar($dados, $id)
    {
      $this->db->where(['id' => $id]);
      $resultado = $this->db->update($this->tabela, $dados);
      return $resultado;
    }
    public function get_produtos_pesquisa($nome_produto)
    {
      $this->db->like('descricao', "$nome_produto");
      $resultado = $this->db->get($this->tabela);
      return $resultado->result();
    }
}

 ?>
