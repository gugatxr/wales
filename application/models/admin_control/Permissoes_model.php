<?php
  class Permissoes_model extends CI_Model
  {
    public function __construct(){
      $this->load->database();
    }
    function get_permissoes()
    {
      $query = $this->db->get('permissoes');
      return $query->result_array();
    }
    public function inserir(){
        $dados = array(
          'descricao' => $this->input->post('descricao'),
          'permissoes' => 'usuarios,'.
          $this->input->post('usuarios_visualizar').','.
          $this->input->post('usuarios_inserir').','.
          $this->input->post('usuarios_editar').','.
          $this->input->post('usuarios_excluir').','.
          '|permissoes'.
          $this->input->post('usuarios_visualizar').','.
          $this->input->post('usuarios_inserir').','.
          $this->input->post('usuarios_editar').','.
          $this->input->post('usuarios_excluir').','
        );
        $resultado = $this->db->insert('permissoes', $dados);
        return $resultado;
    }
    public function excluir()
    {
      $this->db->where(['id' => $this->input->get('id')]);
      $this->db->delete('permissoes');
    }
  }

 ?>
