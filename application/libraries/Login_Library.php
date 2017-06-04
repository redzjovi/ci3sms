<?php
class Login_Library
{
    private $CI;

    public function is_guest()
    {
        $this->CI =& get_instance();
        if ($this->CI->session->has_userdata('admin')) {

        } else {
            redirect('backend/admin/login');
        }
    }
}