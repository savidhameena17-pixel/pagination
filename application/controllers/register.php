<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends CI_Controller {
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
    public function submit() {
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
            redirect('register');
        }
    }
}