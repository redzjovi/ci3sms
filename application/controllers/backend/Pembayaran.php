<?php
class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Pembelian_Model',
            'Pembayaran_Model'
        ]);
    }

    public function delete($id = NULL, $id_pembelian)
    {
        if ($id) {
            $this->Pembayaran_Model->delete($id);
            $this->Pembelian_Model->is_paid($id_pembelian);
            $this->session->set_flashdata('message_success', lang('data_delete_success'));
        }
        redirect('backend/pembayaran/history/'.$id_pembelian);
    }

    public function history($id)
    {
        $this->login_library->is_guest(true);

        $id = $this->input->post('id_pembelian') ? $this->input->post('id_pembelian') : $id;

        $this->form_validation->set_rules('tanggal_pembayaran', lang('payment_date'), 'required');
        $this->form_validation->set_rules('total', lang('total'), 'required|max_length[11]|numeric');

        if ($this->form_validation->run() === true) {
            $data = $this->input->post();
            $data['tanggal_pembayaran'] = datetime_from_format($data['tanggal_pembayaran'], 'd/m/Y', 'Y-m-d');
            $this->Pembayaran_Model->create($data);
            $this->Pembelian_Model->is_paid($id);
            $this->session->set_flashdata('message_success', lang('data_create_success'));
            redirect('backend/pembayaran/history/'.$id);
        }

        $pembelian = $this->Pembelian_Model->find_by_pk($id)->row();
        if ($pembelian) {
            $params['status'] = $this->Pembelian_Model->get_status();
            $params['pembayaran'] = $this->Pembayaran_Model->find_by_id_pembelian($id)->result();
            $params['pembelian'] = $pembelian;
            $params['pembelian']->tanggal_pembelian = datetime_from_format($params['pembelian']->tanggal_pembelian, 'Y-m-d H:i:s', 'd/m/Y');
            $params['pembelian']->tanggal_jatuh_tempo = datetime_from_format($params['pembelian']->tanggal_jatuh_tempo, 'Y-m-d H:i:s', 'd/m/Y');
            $this->load->view('backend/pembayaran/history', $params);
        } else {
            $this->session->set_flashdata('message_danger', lang('data_not_exist'));
            redirect('backend/pembayaran');
        }
    }

    public function index()
    {
        $this->login_library->is_guest(true);

        $params['pembelian'] = $this->Pembelian_Model->get_purchases(false);
        $params['status'] = $this->Pembelian_Model->get_status();
        $this->load->view('backend/pembayaran/index', $params);
    }
}
