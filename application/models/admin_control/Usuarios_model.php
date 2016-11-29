<?php

  class Usuarios_model extends CI_Model{
    private $tabela = 'usuarios';
    private $tabela_permissao = 'permissoes';

    public function __construct(){
      $this->load->database();
    }
    public function get_usuarios($usuario = FALSE){
      $this->db->select('u.id, u.email, u.usuario, u.nome, p.descricao as permissao');
      $this->db->from('usuarios u');
      $this->db->join('permissoes p', 'u.id_permissao=p.id', 'inner');
      $query = $this->db->get();

      return $query->result_array();
    }
    public function select_one_usuario(){
      $this->db->select('u.id, u.email, u.usuario, u.nome, p.descricao as permissao, p.id as id_permissao');
      $this->db->from('usuarios u');
      $this->db->join('permissoes p', 'u.id_permissao=p.id', 'inner');
      $this->db->where('u.id',$this->uri->segment('4', 0));
      $query = $this->db->get();
      return $query->result_array();
    }
    public function set_usuario(){
      //função para criar usuario
      // @var email string,
      // @par senha string,
      // @par nome string
      $dados = array(
        'nome'          => ucfirst($this->input->post('nome')),
        'usuario'       => strtolower($this->input->post('usuario')),
        'email'         => $this->input->post('email'),
        'senha'         => password_hash($this->input->post('senha'), PASSWORD_DEFAULT),
        'id_permissao'  => $this->input->post('permissao')
      );
      $resultado = $this->db->insert($this->tabela, $dados);
      return $resultado;
    }
    public function edita_usuario(){
      if($this->input->post('senha') === '')
      {
        $data = array(
          'nome' => ucfirst($this->input->post('nome')),
          'usuario' => $this->input->post('usuario'),
          'email' => $this->input->post('email'),
          'id_permissao' => $this->input->post('permissao')
        );

      }else{
        $data = array(
          'nome' => ucfirst($this->input->post('nome')),
          'usuario' => $this->input->post('usuario'),
          'email' => $this->input->post('email'),
          'senha' => $this->input->post('senha'),
          'id_permissao' => $this->input->post('permissao'),
        );
      }
      $this->db->where('id', $this->input->post('id_usuario'));
      $retorno = $this->db->update('usuarios', $data);
      // var_dump($retorno);
      // exit;
      return $retorno;

    }
    function delete(){
      $resultado = $this->db->delete($this->tabela, ['id' => $this->uri->segment('4', 0)]);
      return $resultado;
    }
    function get_permissoes(){
      $this->db->select('id, descricao');
      $query = $this->db->get($this->tabela_permissao);
      return $query->result();
    }
  }
