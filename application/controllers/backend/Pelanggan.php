<?php
class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pelanggan_Model');
    }

    public function create()
    {
        $this->login_library->is_guest(true);

        $this->form_validation->set_rules('nama', lang('name'), 'required|max_length[100]');
        $this->form_validation->set_rules('nomor_telepon', lang('phone_number'), 'required|max_length[20]|numeric');
        $this->form_validation->set_rules('nomor_handphone', lang('handphone_number'), 'required|max_length[20]|numeric');
        $this->form_validation->set_rules('alamat', lang('address'), 'required');
        $this->form_validation->set_rules('email', lang('email'), 'required|max_length[50]|valid_email');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $this->Pelanggan_Model->create($data);
            $this->session->set_flashdata('message_success', lang('data_create_success'));
            redirect('backend/pelanggan');
        }

        $this->load->view('backend/pelanggan/create');
    }

    public function delete($id = NULL)
    {
        if ($id) {
            $this->Pelanggan_Model->delete($id);
            $this->session->set_flashdata('message_success', lang('data_delete_success'));
        }
        redirect('backend/pelanggan');
    }

    public function index()
    {
        $this->login_library->is_guest(true);

        $params['pelanggan'] = $this->db->get($this->Pelanggan_Model->table);
        $this->load->view('backend/pelanggan/index', $params);
    }

    public function update($id = NULL)
    {
        $this->login_library->is_guest(true);

        $id = $this->input->post('id_pelanggan') ? $this->input->post('id_pelanggan') : $id;

        $this->form_validation->set_rules('nama', lang('name'), 'required|max_length[100]');
        $this->form_validation->set_rules('nomor_telepon', lang('phone_number'), 'required|max_length[20]|numeric');
        $this->form_validation->set_rules('nomor_handphone', lang('handphone_number'), 'required|max_length[20]|numeric');
        $this->form_validation->set_rules('alamat', lang('address'), 'required');
        $this->form_validation->set_rules('email', lang('email'), 'required|max_length[50]|valid_email');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $this->Pelanggan_Model->update($id, $data);
            $this->session->set_flashdata('message_success', lang('data_update_success'));
            redirect('backend/pelanggan');
        }

        $pelanggan = $this->db->from($this->Pelanggan_Model->table)->where('id_pelanggan', $id)->get()->row();
        if ($pelanggan) {
            $params['pelanggan'] = $pelanggan;
            $this->load->view('backend/pelanggan/update', $params);
        } else {
            $this->session->set_flashdata('message_danger', lang('data_not_exist'));
            redirect('backend/pelanggan');
        }
    }
}