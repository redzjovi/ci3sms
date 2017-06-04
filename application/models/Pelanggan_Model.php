<?php
class Pelanggan_Model extends CI_Model
{
    public $table = 'pelanggan';

    public function create($data)
    {
        $data = [
            'nama' => $data['nama'],
            'nomor_telepon' => $data['nomor_telepon'],
            'nomor_handphone' => $data['nomor_handphone'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
        ];
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->delete($this->table, ['id_pelanggan' => $id]);
    }

    public function update($id, $data)
    {
        $data = [
            'nama' => $data['nama'],
            'nomor_telepon' => $data['nomor_telepon'],
            'nomor_handphone' => $data['nomor_handphone'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
        ];
        $this->db->where('id_pelanggan', $id);
        $this->db->update($this->table, $data);
    }
}