<?php
  class Fornecedores_model extends CI_Model
  {
    public $tabela = 'pessoas';

    public function __construct(){
      $this->load->database();
    }
    function get_tudo($tipo_pessoa)
    {
      $this->db->where('id_tipo', $tipo_pessoa);
      $resultado = $this->db->get('fornecedores');
      return $resultado->result_array();
    }
    function get_basico()
    {
      $this->db->select('nome, telefone, endereco, email');
      $resultado = $this->db->get('fornecedores');
      return $resultado->result();
    }
    function get_um($id)
    {
      $this->db->where($id);
      $resultado = $this->db->get($this->tabela);
      return $resultado->result();
    }
    public function inserir($dados){
      $resultado = $this->db->insert($this->tabela, $dados);
      return $resultado;
    }
    public function excluir($id)
    {
      $this->db->where(['id' => $id]);
      $resultado = $this->db->delete($this->tabela);
      return $resultado;
    }
    public function editar($data, $id)
    {
      $this->db->where('id', $id);
      $resultado = $this->db->update($this->tabela, $data);
      return $resultado;
    }
  }

 ?>
