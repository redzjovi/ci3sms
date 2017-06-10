<?php
class Laporan_Form extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_Model');
        $this->load->model('Pelanggan_Model');
        $this->load->model('Pembelian_Model');
    }

    public function search($filter = [])
    {
        $this->db->select('pembelian.*');
        $this->db->select('barang.*');
        $this->db->select('pelanggan.*');
        $this->db->from($this->Pembelian_Model->table.' AS pembelian');
        $this->db->join($this->Barang_Model->table.' AS barang', 'barang.id_barang = pembelian.id_barang');
        $this->db->join($this->Pelanggan_Model->table.' AS pelanggan', 'pelanggan.id_pelanggan = pembelian.id_pelanggan');

        if ( ! empty($filter['tanggal_awal'])) {
            $this->db->where('tanggal_pembelian >=', $filter['tanggal_awal']);
        }

        if ( ! empty($filter['tanggal_akhir'])) {
            $this->db->where('tanggal_pembelian <=', $filter['tanggal_akhir']);
        }

        if ( ! empty($filter['status'])) {
            $this->db->where('status', $filter['status']);
        }

        return $this->db->get();
    }
}
