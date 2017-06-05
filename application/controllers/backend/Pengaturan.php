<?php
class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaturan_Model');
    }

    public function create()
    {
        $this->login_library->is_guest(true);

        $this->form_validation->set_rules('tipe', lang('type'), 'required|max_length[50]');
        $this->form_validation->set_rules('pesan', lang('message'), 'required');
        $this->form_validation->set_rules('jatuh_tempo', lang('due_date'), 'required|max_length[11]|numeric');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $this->Pengaturan_Model->create($data);
            $this->session->set_flashdata('message_success', lang('data_create_success'));
            redirect('backend/pengaturan');
        }

        $this->load->view('backend/pengaturan/create');
    }

    public function delete($id = NULL)
    {
        if ($id) {
            $this->Pengaturan_Model->delete($id);
            $this->session->set_flashdata('message_success', lang('data_delete_success'));
        }
        redirect('backend/pengaturan');
    }

    public function index()
    {
        $this->login_library->is_guest(true);

        $params['pengaturan'] = $this->db->get($this->Pengaturan_Model->table);
        $this->load->view('backend/pengaturan/index', $params);
    }

    public function update($id = NULL)
    {
        $this->login_library->is_guest(true);

        $id = $this->input->post('id') ? $this->input->post('id') : $id;

        $this->form_validation->set_rules('tipe', lang('type'), 'required|max_length[50]');
        $this->form_validation->set_rules('pesan', lang('message'), 'required');
        $this->form_validation->set_rules('jatuh_tempo', lang('due_date'), 'required|max_length[11]|numeric');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $this->Pengaturan_Model->update($id, $data);
            $this->session->set_flashdata('message_success', lang('data_update_success'));
            redirect('backend/pengaturan');
        }

        $pengaturan = $this->db->from($this->Pengaturan_Model->table)->where('id', $id)->get()->row();
        if ($pengaturan) {
            $params['pengaturan'] = $pengaturan;
            $this->load->view('backend/pengaturan/update', $params);
        } else {
            $this->session->set_flashdata('message_danger', lang('data_not_exist'));
            redirect('backend/pengaturan');
        }
    }
}