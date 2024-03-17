<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load_model('order', 'sma_order');
    }

    function order_details_modal()
    {
        $tracking_id = $this->input->get('trackingId');
        $html = $this->load->view('order/details_modal', ['order' => $this->order->row(['trackingID' => $tracking_id])], TRUE);
        echo json_encode(['status' => true, 'html' => $html]);
    }
}
