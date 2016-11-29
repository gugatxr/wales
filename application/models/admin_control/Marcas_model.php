<?php
  class Marcas_model extends CI_Model
  {
    public $tabela = 'marcas';

    public function __construct(){
      $this->load->database();
    }
    function get_marcas()
    {
      $resultado = $this->db->get($this->tabela);
      return $resultado->result();
    }
    function get_one($id)
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
