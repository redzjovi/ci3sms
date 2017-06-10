<?php
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
        $this->load->model('Barang_Model');
        $this->load->model('Pelanggan_Model');
        $this->load->model('Pembelian_Model');
    }

    public function index()
    {
        $this->login_library->is_guest(true);

        $params['barang_jumlah'] = $this->db->select('COUNT(*) AS total')->from($this->Barang_Model->table)->get()->row()->total;
        $params['pelanggan_jumlah'] = $this->db->select('COUNT(*) AS total')->from($this->Pelanggan_Model->table)->get()->row()->total;
        $params['pembelian_jumlah'] = $this->db->select('COUNT(*) AS total')->from($this->Pembelian_Model->table)->get()->row()->total;
        $params['pembelian_total'] = $this->db->select_sum('total')->from($this->Pembelian_Model->table)->get()->row()->total;
        $params['pembelian_jumlah_paid'] = $this->db->select('COUNT(*) AS total')->from($this->Pembelian_Model->table)->where('status', '1')->get()->row()->total;
        $params['pembelian_total_paid'] = $this->db->select_sum('total')->from($this->Pembelian_Model->table)->where('status', '1')->get()->row()->total;
        $params['pembelian_jumlah_unpaid'] = $this->db->select('COUNT(*) AS total')->from($this->Pembelian_Model->table)->where('status', '0')->get()->row()->total;
        $params['pembelian_total_unpaid'] = $this->db->select_sum('total')->from($this->Pembelian_Model->table)->where('status', '0')->get()->row()->total;
        $this->load->view('backend/admin/index', $params);
    }

    public function login()
    {
        $this->form_validation->set_rules('username', lang('admin_username'), 'required');
        $this->form_validation->set_rules('password', lang('password'), 'required');
        $this->form_validation->set_rules('login', lang('login'), 'callback_login_check');

        if ($this->form_validation->run() === true) {
            $data['admin'] = $this->db->from($this->Admin_Model->table)->where('username', $this->input->post('username'))->get()->row_array();

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

    public function logout()
    {
        $this->session->unset_userdata('admin');
        redirect('backend/admin');
    }
}
