<?php
defined ('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    public function index() {
        $this->load->view('Register');   
    }
    public function register() {
        $this->form_validation->set_rules('firstname', 'firstname', 'required');
        $this->form_validation->set_rules('lastname', 'lastname', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[page.email]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Register');
        } else {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'), 
                'email' => $this->input->post('email'),
                'createdon' => date('Y-m-d'));
            $this->User_model->insert_user($data);
            redirect('user/users');
        }
    }
    public function users()
    {
        $limit=10;
        $page=$this->input->get('page');
        if(!$page)
        {
            $page=1;
        }
        $page = (int)$page;
        if ($page < 1) {
            $page = 1;
        }
        $start=($page-1)* $limit;
        $data['users']=$this->User_model->get_users($limit,$start);
        $data['total_users']=$this->User_model->get_total_users();
        $data['total_pages']=ceil($data['total_users']/$limit);
        $data['current_page']=$page;
        $this->load->view('users', $data);
    }
    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('user/users');
    }
}