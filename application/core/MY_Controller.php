<?php
if ( ! defined('BASEPATH')) exit('Sem acesso direto ao script');

use DebugBar\StandardDebugBar;

class MY_Default extends CI_Controller{

  public $data = array();

  public function __CONSTRUCT(){
    parent::__CONSTRUCT();

    $this->data = array(
      'debugbar_render'   => NULL,
      'debugbar_head'     => NULL,
    );
  }
}
class MY_Controller extends MY_Default{

  public function __CONSTRUCT(){
    parent::__CONSTRUCT();
    $this->permissoes->esta_logado();

    $this->data['resultado_excluir'] = $this->session->resultado_excluir;
    $this->data['permissao'] = $this->session->permissao;
    $this->session->unset_userdata('resultado_excluir');
  }
  protected function verifica_sucesso($resultado, $mensagem_sucesso = 'Ação concluída com sucesso', $mensagem_falha = 'Erro ao processo')
  {
    if($resultado === TRUE)
    {
      $resultado = '<div class="alert alert-success " role="alert">'.$mensagem_sucesso.'</div>';
    }else
    {
      $resultado = '<div class="alert alert-danger" role="alert">'.$mensagem_falha.'</div>';
    }
    $this->session->set_userdata(['resultado_excluir' => $resultado]);
    return $resultado;
  }
  public function ativa_debugbar($mensagem = 'Sou lindão')
  {
    $debugbar = new StandardDebugBar();
    $debugbarRenderer               = $debugbar->getJavascriptRenderer();
    $debugbar["messages"]->addMessage($this->data);
    $this->data['debugbar_render']  = $debugbarRenderer->render();
    $this->data['debugbar_head']    = $debugbarRenderer->renderHead();
    $this->debugbar                 = $debugbar;
  }
}


class MY_Home extends MY_Default{

  public function __CONSTRUCT(){
    parent::__CONSTRUCT();
    $this->_quantidade_carrinho();
  }
  private function _quantidade_carrinho()
  {
    $quantidade_carrinho = count($this->session->carrinho);
    $this->data['quantidade_carrinho'] = "<span class='badge'>{$quantidade_carrinho}</span>";
    return $quantidade_carrinho;
  }
}
class MY_Login extends MY_Default{
  public function __CONSTRUCT(){
    parent::__CONSTRUCT();
  }
}
