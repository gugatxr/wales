<?php

class Principal extends CI_Controller
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
    }
    public function index()
    {
        $data['title'] = 'Loja Wales';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-home');
        // $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
}
