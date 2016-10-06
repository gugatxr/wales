<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Verifica permissões
*
* Author: Gustavo Teixeira
*		  gugatxr@gmail.com
*         @gugatxr
*
* Added Awesomeness: Phil Sturgeon
*
* Location: http://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  20.09.2016
*
* Description:  Modified auth system based on redux_auth with extensive customization.  This is basically what Redux Auth 2 should be.
* Original Author name has been kept but that does not mean that the method has not been modified.
*
* Requirements: PHP5 or above
*
*/
/**
 *
 */
class Permissoes
{

  function prepara_permissoes($permissoes)
  {
    //$permissoes em array a | e deixando cada tabela em posicao diferentes
    $permissoes = explode( '|' , $permissoes);
    foreach ($permissoes as $key => $value) {
      //separa o nome da tabela e as permissoes individuais
      $permissao[] = explode(",", $value);
      //adiciona o nome da tabela como indexador, e cria um outro array para indicando cada função como 0 ou 1
      $permissoes[$permissao[$key][0]] = array ('visualizar' => $permissao[$key][1],
      'inserir' => $permissao[$key][2],
      'editar' => $permissao[$key][3],
      'deletar' => $permissao[$key][4]);
      //exclui permissão antiga que estava no array
      unset($permissoes[$key]);
    }
    return $permissoes;
  }
  //
  function verifica_permissao_mostra_dados($permissao, $dado)
  {
    if($permissao === 0)
    {
      echo $dado;
    }
  }
}
