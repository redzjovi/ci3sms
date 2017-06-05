<?php
class Barang_Model extends CI_Model
{
    public $table = 'barang';

    public function create($data)
    {
        $data = [
            'nama_barang' => $data['nama_barang'],
            'ukuran' => $data['ukuran'],
            'harga' => $data['harga'],
            'stok' => $data['stok'],
        ];
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->delete($this->table, ['id_barang' => $id]);
    }

    public function update($id, $data)
    {
        $data = [
            'nama_barang' => $data['nama_barang'],
            'ukuran' => $data['ukuran'],
            'harga' => $data['harga'],
            'stok' => $data['stok'],
        ];
        $this->db->where('id_barang', $id);
        $this->db->update($this->table, $data);
    }
}