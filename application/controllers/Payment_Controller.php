<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model', 'payment');
    }

    function index()
    {
        $this->load_view('payment/index', ['html' => $this->get_content()]);
    }

    function get_content()
    {
        $data['total'] = $this->payment->count();
        $data['transfered'] = $this->payment->count(['payment_status' => 1]);
        $data['pending'] = $this->payment->count(['payment_status' => 2]);
        $data['scheduled'] = $this->payment->count(['payment_status' => 3]);
        $data['payments'] = $this->payment->all_payments();
        $res = $this->load->view('payment/main_content', $data, TRUE);
        if ($this->input->is_ajax_request()) {
            return $this->response($res, 200, false);
        } else {
            return $res;
        }
    }
}
