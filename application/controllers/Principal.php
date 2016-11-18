<?php

class Principal extends MY_Home
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        // var_dump($this->data);
        // exit;
    }
    public function index()
    {
        $this->data['title'] = 'Loja Wales';

        $this->load->model('admin_control/produtos_model');
        $this->data['produtos'] = $this->produtos_model->get_produtos_vitrine();
        // var_dump($data);
        // exit;
        $this->load->view('home/templates/header', $this->data);
        $this->load->view('home/templates/nav', $this->data);
        $this->load->view('principal', $this->data);
        $this->load->view('home/templates/footer');
    }
}
