<?php
class Login_Library
{
    private $CI;

    public function is_guest()
    {
        $this->CI =& get_instance();
        if ($this->CI->session->has_userdata('user')) {

        } else {
            redirect('backend/admin/login');
        }
    }
}