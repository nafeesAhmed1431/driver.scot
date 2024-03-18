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
        $data['total'] = $this->payment->count();
        $data['transfered'] = $this->payment->count(['payment_status' => 1]);
        $data['pending'] = $this->payment->count(['payment_status' => 2]);
        $data['scheduled'] = $this->payment->count(['payment_status' => 3]);
        $data['payments'] = $this->payment->all_payments();
        $this->load_view('payment/index', [], $data);
    }
}
