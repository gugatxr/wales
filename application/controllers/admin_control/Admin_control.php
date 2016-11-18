<?php

class Admin_control extends MY_Controller
{
    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->load->model('admin_control/admin_control_model');
    }
    public function index()
    {
        $this->data['title'] = 'iN informática';
        $this->load->view('admin_control/templates/header', $this->data);
        $this->load->view('admin_control/templates/nav');
        $this->load->view('admin_control/home/index', $this->data);
        $this->load->view('admin_control/templates/footer');
    }
}
