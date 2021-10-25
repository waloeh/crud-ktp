<?php defined('BASEPATH') or exit('No direct script access allowed');

class Toastr
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    public function success($msg)
    {
        $this->CI->session->set_flashdata('success', $msg);
        return true;
    }

    public function error($msg)
    {
        $this->CI->session->set_flashdata('error', $msg);
        return true;
    }
}
