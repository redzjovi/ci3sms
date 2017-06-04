<?php
class MY_Controller extends CI_Controller
{
    public $layout = 'admin';

    public function view($page)
    {
        if ($layout == 'admin') {
            $this->load->view('backend/admin/index');
        } else {
            $this->load->view($page);
        }
    }
}