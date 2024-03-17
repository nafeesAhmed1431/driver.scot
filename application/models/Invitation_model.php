<?php
class Invitation_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->set_table("sma_invitations");
    }

    function all_invitations()
    {
        return $this->select_where_join([
            "$this->table.id", "$this->table.status",
            'concat(driver.first_name," ",driver.last_name) as driver_name', 'driver.id as driver_id', 'driver.email',
            'order.trackingID', 'order.order_date', 'order.strt_time', 'order.end_time',
        ], [true => true], [
            ['table' => 'sma_drivers as driver', 'condition' => "$this->table.driver_id = driver.id", 'type' => 'natural'],
            ['table' => 'sma_order as order', 'condition' => "$this->table.order_id = order.id", 'type' => 'natural'],
        ]);
    }
}
