<?php
class Pengaturan_Model extends CI_Model
{
    public $table = 'pengaturan';

    public function create($data)
    {
        $data = [
            'tipe' => $data['tipe'],
            'pesan' => $data['pesan'],
            'jatuh_tempo' => $data['jatuh_tempo'],
        ];
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->delete($this->table, ['id' => $id]);
    }

    public function update($id, $data)
    {
        $data = [
            'tipe' => $data['tipe'],
            'pesan' => $data['pesan'],
            'jatuh_tempo' => $data['jatuh_tempo'],
        ];
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
}