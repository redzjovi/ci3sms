<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Users_Model');
    }

    public function index()
    {
        $this->login_library->is_guest();
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('login', 'Login', 'callback_login_check');

        if ($this->form_validation->run() === true) {
            // login
        }

        $this->load->view('backend/admin/login');
    }

    public function login_check()
    {
        // $this->User_Model->email = $this->input->post('email');
        // $this->User_Model->password = $this->input->post('password');

        // if ($this->Users_model->login_check() === false) {
            $this->form_validation->set_message('login_check', 'Email or password is invalid');
            return false;
        // }

        return true;
    }
}