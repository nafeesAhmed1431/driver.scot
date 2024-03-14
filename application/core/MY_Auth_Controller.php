<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Auth_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    
    protected function load_model($alias, $table)
    {
        $this->load->model("MY_Model", $alias);
        $this->$alias->set_table($table);
    }


    function load_view($view, $data = null, $meta = null)
    {
        $this->load->view('auth/auth_header');
        $this->load->view("auth/$view", $data);
        $this->load->view('auth/auth_footer');
    }
}
