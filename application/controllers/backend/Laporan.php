<?php
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_Form');
        $this->load->model('Pembelian_Model');
    }

    public function index()
    {
        $this->login_library->is_guest(true);

        $post = $this->input->post();
        $post['tanggal_awal'] = (empty($post['tanggal_awal']) ? '' : datetime_from_format($post['tanggal_awal'], 'd/m/Y', 'Y-m-d'));
        $post['tanggal_akhir'] = (empty($post['tanggal_akhir']) ? '' : datetime_from_format($post['tanggal_akhir'], 'd/m/Y', 'Y-m-d'));
        $params['laporan'] = $this->Laporan_Form->search($post);
        $params['status'] = $this->Pembelian_Model->get_status();
        $this->load->view('backend/laporan/index', $params);
    }
}
