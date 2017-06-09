<?php
class Pembayaran_Model extends CI_Model
{
    public $table = 'pembayaran';

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Barang_Model',
            'Pelanggan_Model',
        ]);
    }

    public function create($data)
    {
        $data = [
            'tanggal_pembayaran' => $data['tanggal_pembayaran'],
            'total' => $data['total'],
            'id_pembelian' => $data['id_pembelian']
        ];
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->delete($this->table, ['id_pembayaran' => $id]);
    }

    public function find_by_id_pembelian($id_pembelian)
    {
        $this->db->where('id_pembelian', $id_pembelian);
        $this->db->order_by('tanggal_pembayaran', 'desc');
        return $this->db->get($this->table);
    }
}
