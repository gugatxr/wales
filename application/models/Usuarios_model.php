<?php

  class Usuarios_model extends CI_Model
  {
    public function __construct(){
      $this->load->database();
    }
    public function get_usuarios($usuario = FALSE){
      $query = $this->db->query('SELECT u.id, u.nome, u.usuario,p.descricao FROM usuarios u INNER JOIN permissoes p ON (p.id=u.id_permissoes) ');
      return $query->result_array();
    }
    public function get_one_usuario(){
      $query = $this->db->query('SELECT u.id,u.senha, u.email, u.nome, u.usuario,p.descricao
        FROM usuarios u
        INNER JOIN permissoes p ON (p.id=u.id_permissoes)
        WHERE u.id = '.$this->input->get_post('id'));
      return $query->result_array();
    }

    public function set_usuarios(){
      $hash_senha = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);

      $dados = array(
        "nome" =>  $this->input->post('nome'),
        "usuario" =>  $this->input->post('usuario'),
        'email' => $this->input->post('email'),
        "senha" => $hash_senha,
        "id_permissoes" => $this->input->post('id_permissoes'),
      );
      $resultado = $this->db->insert('usuarios', $dados);
      return $resultado;

    }
    public function get_permissoes(){
      $query = $this->db->query('SELECT id, descricao FROM permissoes');
      return $query->result_array();
    }
    public function excluir(){
      $resultado = $this->db->delete('usuarios', ['id' => $this->input->get_post('id')]);
      return $resultado;
    }
    public function edita_usuario(){
      if($this->input->post('senha') === '')
      {
        $data = array(
          'nome' => $this->input->post('nome'),
          'usuario' => $this->input->post('usuario'),
          'email' => $this->input->post('email'),
          'id_permissoes' => $this->input->post('id_permissoes')
        );

      }else {
        $data = array(
          'nome' => $this->input->post('nome'),
          'usuario' => $this->input->post('usuario'),
          'email' => $this->input->post('email'),
          'senha' => $this->input->post('senha'),
          'id_permissoes' => $this->input->post('id_permissoes'),
        );
      }
      $this->db->where('id', $this->input->post('id_usuario'));
      $this->db->update('usuarios', $data);
    }
  }
