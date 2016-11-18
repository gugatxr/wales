<?php
if ( ! defined('BASEPATH')) exit('Sem acesso direto ao script');
/**
* Name:  Verifica permissões
*
* Author: Gustavo Teixeira
*		  gugatxr@gmail.com
*         @gugatxr
**
* Created:  20.09.2016
*
* Requirements: PHP5 or above
*
*/
/**
 *
 */
class Permissoes{
    /*
    *Função que verifica se está logado o usuario verificando se existe algo salvo na sessão.
    *retorna Boolean
    * TRUE se está logado
    * FALSE se não está logado.
    */
    public function esta_logado(){
      $CI =& get_instance();
      $CI->load->library('session');
      if (!$CI->session->has_userdata('nome')) {
        unset($_COOKIE);
        $CI->session->sess_destroy();
        redirect('admin_control/login');
        $resultado = FALSE;
      }else{
        $CI->session->mark_as_temp(['nome' => 600, 'permissao' => 600]);
        $resultado = TRUE;
      }
      return $resultado;
    }
    /*
    * Encaminha para a págna de não autorizado. carrega templates armazenado e views/admin_control/templates
    * return true
    */
    public function nao_autorizado(){
    $data['title'] = 'Acesso não autorizado';

    $CI =& get_instance();
    $CI->load->view('admin_control/templates/nav');
    $CI->load->view('admin_control/templates/header');
    $CI->load->view('admin_control/templates/nao_autorizado', $data);
    $CI->load->view('admin_control/templates/footer', $data);
    return TRUE;
  }
}
