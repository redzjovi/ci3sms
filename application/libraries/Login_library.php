<?php
class Login_Library
{
    private $CI;

    public function is_guest($redirect = false)
    {
        $this->CI =& get_instance();
        if ($this->CI->session->has_userdata('admin')) {
            return true;
        } else {
            if ($redirect === true) {
                redirect('backend/admin/login');
            }
            return false;
        }
    }
}