<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Driver_model', 'driver');
    }

    function index()
    {
        $this->load_view('driver/index', ['html' => $this->get_content()]);
    }

    function get_content()
    {
        $data['drivers'] = $this->driver->all();
        $data['total'] = $this->driver->count();
        $data['active'] = $this->driver->count(['enable_bit' => 1]);
        $data['inactive'] = $this->driver->count(['enable_bit' => 0]);
        $res = $this->load->view('driver/main_content', $data, TRUE);
        if ($this->input->is_ajax_request()) {
            return $this->response($res, 200, false);
        } else {
            return $res;
        }
    }

    function driver_details($driver_id = null)
    {
        if ($driver_id !== null) {
            $data['driver'] = $this->driver->row(['id' => $driver_id]);
            $data['total_jobs_count'] = $this->driver->total_jobs_count($driver_id);
            $data['total_completed_jobs_count'] = $this->driver->pending_jobs_count($driver_id);
            $this->load_view('driver/driver_details', [], $data);
        }
    }

    function get_jobs()
    {
        $type = $this->input->get('type');
        $driver_id = $this->input->get('driver_id');
        $data['jobs'] = $this->driver->jobs_by_status($type, $driver_id);
        $data['table_title'] = ['Pending Jobs', 'Completed Jobs', 'Canceled Jobs', 'All Jobs'][$type];
        $html = $this->load->view('Driver/driver_jobs', $data, TRUE);
        $this->response($html, 200);
    }
}
