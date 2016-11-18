<?php
if ( ! defined('BASEPATH')) exit('Sem acesso direto ao script');


function verifica_existe($variavel){
  if(isset($variavel)){
    echo $variavel;
  }
}
