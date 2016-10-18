<?php

  class Usuarios_model extends CI_Model
  {
    public function __construct(){
      $this->load->database();
    }
    public function get_usuarios($usuario = FALSE){
      $query = $this->db->query('SELECT u.id, u.email, u.usuario, p.descricao as permissao FROM usuarios u
              INNER JOIN permissoes p ON (p.id=u.id_permissao)  ');
      return $query->result_array();
    }
    public function get_one_usuario(){
      $query = $this->db->query('SELECT u.id, u.email, u.username as nome, p.name as permissao FROM aauth_users u
              INNER JOIN aauth_user_to_group g ON (u.id= g.user_id)
              INNER JOIN aauth_groups p ON (p.id=g.group_id)
        WHERE u.id = '.$this->input->get_post('id'));
      return $query->result_array();
    }
    public function set_usuarios(){
      //função para criar usuario
      // @var email string,
      // @par senha string,
      // @par nome string
      $email      = $this->input->post('email');
      $senha      = $this->input->post('senha');
      $nome       = $this->input->post('nome');
      $id_usuario = $this->aauth->create_user($email, $senha, $nome);

      //addiciona usuario a um grupo de permissoes
      //add_member($id_usuario, $id ou nome do grupo);
      //retorna true ou falsa
      $id_permissao = $this->input->post('permissao');
      $resultado    = $this->aauth->add_member($id_usuario, $id_permissao);

      return $id_usuario;
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
