<?php

class Home_model extends CI_Model
{
  function __CONSTRUCT()
  {
    $this->load->database();
  }

  function valida_login()
  {
    // $usuario string
    // $usuario pode receber tanto o nome do usuario quanto o email
    $usuario = $this->input->post('usuario');
    $senha = $this->input->post('senha');

    $sql = "select senha from usuarios where (usuario='$usuario' OR email='$usuario')";
      $query = $this->db->query($sql);
      $query = $query->result_array();
      $resultado = password_verify($senha, $query[0]['senha']);
      // var_dump($resultado);
      // exit();
      return $resultado;
  }
  function get_usuario_sessao()
  {
    $usuario = $this->input->post('usuario');
    $senha = $this->input->post('senha');

    $query = "SELECT u.nome, p.permissoes, u.usuario
      FROM usuarios u
      INNER JOIN permissoes p ON (p.id=u.id_permissoes)
      WHERE usuario = '$usuario'";
    $query = $this->db->query($query);
    $query = $query->result_array();
    return $query;
  }
  function get_dados_depois_login($id_usuarios){

  }
}
