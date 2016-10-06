<?php
class Home extends CI_Controller
{
    public function __CONSTRUCT(){
        parent::__CONSTRUCT();
        $this->load->model('home_model');
        if ($this->session->has_userdata('usuario')) {
          $this->session->mark_as_temp('usuario', 600);
        }else
        {
          redirect('login');
        }
    }
    public function index()
    {
        $data['title'] = 'iN informática';
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
