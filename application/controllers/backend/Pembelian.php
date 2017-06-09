<?php
class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Barang_Model',
            'Pelanggan_Model',
            'Pembelian_Model'
        ]);
    }

    public function create()
    {
        $this->login_library->is_guest(true);

        $this->form_validation->set_rules('tanggal_pembelian', lang('purchase_date'), 'required');
        $this->form_validation->set_rules('tanggal_jatuh_tempo', lang('due_date'), 'required');
        $this->form_validation->set_rules('id_pelanggan', lang('customer'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('id_barang', lang('goods'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('kuantitas', lang('quantity'), 'required|greater_than[0]|max_length[11]|numeric');
        $this->form_validation->set_rules('harga', lang('price'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('total', lang('total'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('status', lang('status'), 'required|numeric');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $data['tanggal_pembelian'] = datetime_from_format($data['tanggal_pembelian'], 'd/m/Y', 'Y-m-d');
            $data['tanggal_jatuh_tempo'] = datetime_from_format($data['tanggal_jatuh_tempo'], 'd/m/Y', 'Y-m-d');
            $this->Pembelian_Model->create($data);
            $this->session->set_flashdata('message_success', lang('data_create_success'));
            redirect('backend/pembelian');
        }

        $params['barang'] = $this->db->get($this->Barang_Model->table)->result_array();
        $params['pelanggan'] = $this->db->get($this->Pelanggan_Model->table)->result_array();
        $params['status'] = $this->Pembelian_Model->get_status();
        $this->load->view('backend/pembelian/create', $params);
    }

    public function delete($id = NULL)
    {
        if ($id) {
            $this->Pembelian_Model->delete($id);
            $this->session->set_flashdata('message_success', lang('data_delete_success'));
        }
        redirect('backend/pembelian');
    }

    public function index()
    {
        $this->login_library->is_guest(true);

        $params['pembelian'] = $this->Pembelian_Model->get_purchases();
        $params['status'] = $this->Pembelian_Model->get_status();
        $this->load->view('backend/pembelian/index', $params);
    }

    public function update($id = NULL)
    {
        $this->login_library->is_guest(true);

        $id = $this->input->post('id_pembelian') ? $this->input->post('id_pembelian') : $id;

        $this->form_validation->set_rules('tanggal_pembelian', lang('purchase_date'), 'required');
        $this->form_validation->set_rules('tanggal_jatuh_tempo', lang('due_date'), 'required');
        $this->form_validation->set_rules('id_pelanggan', lang('customer'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('id_barang', lang('goods'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('kuantitas', lang('quantity'), 'required|greater_than[0]|max_length[11]|numeric');
        $this->form_validation->set_rules('harga', lang('price'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('total', lang('total'), 'required|max_length[11]|numeric');
        $this->form_validation->set_rules('status', lang('status'), 'required|numeric');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $this->Pembelian_Model->update($id, $data);
            $this->session->set_flashdata('message_success', lang('data_update_success'));
            redirect('backend/pembelian');
        }

        $pembelian = $this->db->from($this->Pembelian_Model->table)->where('id_pembelian', $id)->get()->row();
        if ($pembelian) {
            $params['barang'] = $this->db->get($this->Barang_Model->table)->result_array();
            $params['pelanggan'] = $this->db->get($this->Pelanggan_Model->table)->result_array();
            $params['status'] = $this->Pembelian_Model->get_status();
            $params['pembelian'] = $pembelian;
            $params['pembelian']->tanggal_pembelian = datetime_from_format($params['pembelian']->tanggal_pembelian, 'Y-m-d H:i:s', 'd/m/Y');
            $params['pembelian']->tanggal_jatuh_tempo = datetime_from_format($params['pembelian']->tanggal_jatuh_tempo, 'Y-m-d H:i:s', 'd/m/Y');
            $this->load->view('backend/pembelian/update', $params);
        } else {
            $this->session->set_flashdata('message_danger', lang('data_not_exist'));
            redirect('backend/pembelian');
        }
    }
}
