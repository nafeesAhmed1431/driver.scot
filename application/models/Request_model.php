<?php
class Request_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->set_table("sma_driver_job_request");
    }

    function all_requests()
    {
        return $this->db->select([
            'order.trackingID',
            'order.order_date',
            'order.strt_time',
            'order.end_time',
            'order.pickup_address',
            'order.delivery_address',
            'order.product_volume',
            'order.km',
            'order.persons',
            'concat(driver.first_name," ",driver.last_name) as driver_name',
            'driver.email',
            'driver.id as driver_id',
            'request.id',
            'request.req_status as status',
        ])
            ->from('sma_driver_job_request as request')
            ->join('sma_drivers as driver', 'request.driver_id = driver.id')
            ->join('sma_order as order', 'request.order_id = order.id')
            ->order_by('request.id','DESC')
            ->get()
            ->result();
    }
}
