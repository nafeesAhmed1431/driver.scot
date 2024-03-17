<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
    }

    function set_table($table_name)
    {
        $this->table = $table_name;
    }

    public function row($where, $table = null)
    {
        return $this->db->where($where)->get($table ?? $this->table)->row();
    }

    function where($where)
    {
        return $this->db->where($where)->get($this->table)->result();
    }

    function where_select($where, $select = "*")
    {
        return $this->db->select($select)->where($where)->get($this->table)->result();
    }

    function all()
    {
        return $this->db->get($this->table)->result();
    }

    function select($select = "*")
    {
        return $this->db->select($select)->get($this->table)->result();
    }

    function get($data)
    {
        return $this->db->where(gettype($data) == "string" ? ['id' => $data] : $data)
            ->get($this->table)
            ->{gettype($data) == "string" ? 'row' : 'result'}();
    }


    function get_options($select = '*', $where = null, $limit = null, $offset = null, $order_by = null)
    {
        $this->db->select($select);
        if ($where !== null) {
            $this->db->where($where);
        }
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        if ($order_by !== null) {
            $this->db->order_by($order_by);
        }
        return $this->db->get($this->table)->result();
    }

    function insert($data, $id = false)
    {
        $st = $this->db->insert($this->table, $data);
        return $id ? $this->db->insert_id() : $st;
    }

    function update($data, $where, $table = null)
    {
        return $this->db->update($table ?? $this->table, $data, $where);
    }

    function delete($data)
    {
        return $this->db->delete($this->table, is_string($data) ? ['id' => $data] : $data);
    }


    function count($where = null)
    {
        if ($where !== null) {
            $this->db->where($where);
        }
        return $this->db->count_all_results($this->table);
    }

    function like($field, $value, $position = 'both')
    {
        $this->db->like($field, $value, $position);
        return $this->db->get($this->table)->result();
    }

    function not_like($field, $value, $position = 'both')
    {
        $this->db->not_like($field, $value, $position);
        return $this->db->get($this->table)->result();
    }

    function or_like($field, $value, $position = 'both')
    {
        $this->db->or_like($field, $value, $position);
        return $this->db->get($this->table)->result();
    }

    function or_not_like($field, $value, $position = 'both')
    {
        $this->db->or_not_like($field, $value, $position);
        return $this->db->get($this->table)->result();
    }

    function group_by($field)
    {
        $this->db->group_by($field);
        return $this->db->get($this->table)->result();
    }

    function having($having)
    {
        $this->db->having($having);
        return $this->db->get($this->table)->result();
    }

    function distinct($field)
    {
        $this->db->distinct();
        $this->db->select($field);
        return $this->db->get($this->table)->result();
    }

    function select_where_join($select = [], $where = [], $joins = null)
    {
        $this->db->select($select);
        $this->db->where($where);
        $this->db->from($this->table);
        if ($joins) {
            foreach ($joins as $join)
                $this->db->join($join['table'], $join['condition'], $join['type']);
        }
        $res = $this->db->get();
        return $res ? $res->result() : false;
    }
}
