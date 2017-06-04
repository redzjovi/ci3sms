<?php
class Admin_Model extends CI_Model
{
    public $table = 'admin';
    
    public $username = '';
    public $password;

    public function login_check()
    {
        $this->db->from($this->table);
        $this->db->where('username', $this->username);
        $this->db->where('password', md5($this->password));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
}
