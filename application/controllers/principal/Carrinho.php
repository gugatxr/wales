<?php

class Carrinho extends CI_Controller{

  function index()
  {
    $data['title'] = 'Carrinho de compras ';
    $this->load->view('templates/header', $data);
    $this->load->view('templates/nav-home');
    $this->load->view('templates/desenvolvimento', $data);
    $this->load->view('templates/footer');  }
}
