<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
    }

    public function index()
    {
        $this->login_library->is_guest();
        $this->load->view('backend/admin/index');
    }

    public function login()
    {
        $this->form_validation->set_rules('username', lang('admin_username'), 'required');
        $this->form_validation->set_rules('password', lang('password'), 'required');
        $this->form_validation->set_rules('login', lang('login'), 'callback_login_check');

        if ($this->form_validation->run() === true) {
            $data['admin'] = $this->db->from($this->Admin_Model->table)
                ->where('username', $this->input->post('username'))
                ->get()
                ->row_array();

            $this->session->set_userdata($data);
            redirect('backend/admin');
        }

        $this->load->view('backend/admin/login');
    }

    public function login_check()
    {
        $this->Admin_Model->username = $this->input->post('username');
        $this->Admin_Model->password = $this->input->post('password');

        if ($this->Admin_Model->login_check() === false) {
            $this->form_validation->set_message('login_check', ucfirst(lang('username_or_password_invalid')));
            return false;
        }

        return true;
    }
}