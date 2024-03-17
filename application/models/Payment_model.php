<?php
class Payment_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->set_table("sma_driver_payments");
    }

    function all_payments()
    {
        return $this->select_where_join(
            [
                "$this->table.id as id",
                "$this->table.payment_listing_id as payment_id",
                "$this->table.payment_amount as amount",
                "$this->table.payment_status as status",
                "$this->table.payment_scheduled as scheduled",
                "$this->table.payment_transfered as transfered",
                "$this->table.created_at",
                "concat(driver.first_name,' ',driver.last_name) as name",
                "driver.id as driver_id",
                "order.trackingId",
            ],
            [true => true],
            [
                ['table' => "sma_order as order", 'condition' => "$this->table.payment_order_id = order.id", 'type' => "natural"],
                ['table' => "sma_drivers as driver", 'condition' => "$this->table.payment_driver_id = driver.id", 'type' => "natural"]
            ]
        );
    }
}
