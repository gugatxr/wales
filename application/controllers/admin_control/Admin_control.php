<?php

class Admin_control extends CI_Controller
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->load->model('admin_control_model');
        if (!$this->session->has_userdata('nome')) {
          unset($_COOKIE);
          $this->session->sess_destroy();
          redirect('admin_control/login');
        }else{
          $this->session->mark_as_temp(['nome' => 600, 'permissao' => 600]);
        }
    }
    public function index()
    {
        $data['title'] = 'iN informática';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav');
        $this->load->view('admin_control/home/index', $data);
        $this->load->view('templates/footer');
    }
}
