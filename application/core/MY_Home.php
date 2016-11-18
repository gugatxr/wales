<?php
if ( ! defined('BASEPATH')) exit('Sem acesso direto ao script');

class MY_Home extends CI_Controller{
  public $this->data;
  public function __CONSTRUCT(){
    parent::__CONSTRUCT();
    $this->_quantidade_carrinho();
  }
  private function _quantidade_carrinho()
  {
    $quantidade_carrinho = count($this->session->carrinho);
    $this->data['quantidade_carrinho'] = $quantidade_carrinho;
    return $quantidade_carrinho;
  }

}
