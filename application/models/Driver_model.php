<?php
class Driver_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->set_table("sma_drivers");
    }

    function total_jobs_count($driver_id)
    {
        return ($this->db->select('COUNT(job.id) as total')
            ->from('sma_assign_job AS job')
            ->join('sma_drivers AS driver', 'driver.id = job.driver_id')
            ->where(['driver.id' => $driver_id])
            ->get()
            ->row())->total;
    }

    function pending_jobs_count($driver_id)
    {
        return ($this->db->select('COUNT(job.id) as total')
            ->from('sma_assign_job AS job')
            ->join('sma_drivers AS driver', 'driver.id = job.driver_id')
            ->join('sma_order AS order', 'order.id = job.order_id')
            ->where([
                'driver.id' => $driver_id,
                'order.status' => 1
            ])
            ->get()
            ->row())->total;
    }

    function jobs_by_status($type, $driver_id)
    {
        $this->db->select('order.*');
        $this->db->from('sma_order AS order');
        $this->db->join('sma_assign_job as job', 'order.id = job.order_id');
        if ($type !== "3") {
            $this->db->where('order.status', $type);
        }
        $this->db->where('job.driver_id', $driver_id);
        return $this->db->get()->result();
    }
}
