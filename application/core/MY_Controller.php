<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!isAuthenticated()) {
            return redirect('login');
        }
    }

    protected function load_model($alias, $table)
    {
        $this->load->model("MY_Model", $alias);
        $this->$alias->set_table($table);
    }

    public function pp()
    {
        exit("<pre>" . print_r(func_get_args(), true) . "</pre>");
    }

    function load_view($page, $meta = [], $data = [])
    {
        $meta['page_title'] = get_called_class();
        $this->load->view('commons/header', $meta);
        $this->load->view('commons/sidebar', $meta);
        $this->load->view('commons/navbar', $meta);
        $this->load->view($page, $data);
        $this->load->view('commons/footer');
    }
}
