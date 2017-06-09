<?php
class Pembelian_Model extends CI_Model
{
    public $table = 'pembelian';

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Barang_Model',
            'Pelanggan_Model',
            'Pembayaran_Model'
        ]);
    }

    public function create($data)
    {
        $data = [
            'tanggal_pembelian' => $data['tanggal_pembelian'],
            'tanggal_jatuh_tempo' => $data['tanggal_jatuh_tempo'],
            'id_pelanggan' => $data['id_pelanggan'],
            'id_barang' => $data['id_barang'],
            'harga' => $data['harga'],
            'kuantitas' => $data['kuantitas'],
            'total' => $data['total'],
            'status' => $data['status']
        ];
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->delete($this->table, ['id_pembelian' => $id]);
    }

    public function find_by_pk($id)
    {
        $this->db->select('pembelian.*');
        $this->db->select('barang.*');
        $this->db->select('pelanggan.*');
        $this->db->from($this->table.' AS pembelian');
        $this->db->join($this->Barang_Model->table.' AS barang', 'barang.id_barang = pembelian.id_barang');
        $this->db->join($this->Pelanggan_Model->table.' AS pelanggan', 'pelanggan.id_pelanggan = pembelian.id_pelanggan');
        $this->db->where('pembelian.id_pembelian', $id);
        return $this->db->get();
    }

    public function get_purchases($paid = null)
    {
        $this->db->select('pembelian.*');
        $this->db->select('barang.*');
        $this->db->select('pelanggan.*');
        $this->db->from($this->table.' AS pembelian');
        $this->db->join($this->Barang_Model->table.' AS barang', 'barang.id_barang = pembelian.id_barang');
        $this->db->join($this->Pelanggan_Model->table.' AS pelanggan', 'pelanggan.id_pelanggan = pembelian.id_pelanggan');

        if ($paid === true) {
            $this->db->where('status', '1');
        }

        return $this->db->get();
    }

    public function get_status()
    {
        return [
            '0' => ucfirst(lang('unpaid')),
            '1' => ucfirst(lang('paid'))
        ];
    }

    public function is_paid($id)
    {
        $this->db->select_sum('total');
        $this->db->from($this->table);
        $this->db->where('id_pembelian', $id);
        $pembelian_total = $this->db->get()->row();

        $this->db->select_sum('total');
        $this->db->from($this->Pembayaran_Model->table);
        $this->db->where('id_pembelian', $id);
        $pembayaran_total = $this->db->get()->row();

        if ($pembelian_total > $pembayaran_total) {
            $this->db->set('status', '0');
            $this->db->where('id_pembelian', $id);
            $this->db->update($this->table);
            return false;
        } else {
            $this->db->set('status', '1');
            $this->db->where('id_pembelian', $id);
            $this->db->update($this->table);
            return true;
        }
    }

    public function update($id, $data)
    {
        $data = [
            'tanggal_pembelian' => $data['tanggal_pembelian'],
            'tanggal_jatuh_tempo' => $data['tanggal_jatuh_tempo'],
            'id_pelanggan' => $data['id_pelanggan'],
            'id_barang' => $data['id_barang'],
            'harga' => $data['harga'],
            'kuantitas' => $data['kuantitas'],
            'total' => $data['total'],
            'status' => $data['status']
        ];
        $this->db->where('id_pembelian', $id);
        $this->db->update($this->table, $data);
    }
}
