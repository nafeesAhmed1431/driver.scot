<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Request_model', 'request');
    }

    function index()
    {
        $data['requests'] = $this->request->all_requests();
        $data['total'] = $this->request->count();
        $data['approved'] = $this->request->count(['req_status' => 1]);
        $data['pending'] = $this->request->count(['req_status' => 0]);
        $this->load_view('request/index', [], $data);
    }
}
