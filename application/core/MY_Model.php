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

    function where($where, $table = null)
    {
        return $this->db->where($where)->get($table ?? $this->table)->result();
    }

    function where_select($where, $select = "*", $table = null)
    {
        return $this->db->select($select)->where($where)->get($table ?? $this->table)->result();
    }

    function all($table = null)
    {
        return $this->db->get($table ?? $this->table)->result();
    }

    function select($select = "*", $table = null)
    {
        return $this->db->select($select)->get($table ?? $this->table)->result();
    }

    function get($data, $table = null)
    {
        return $this->db->where(gettype($data) == "string" ? ['id' => $data] : $data)
            ->get($table ?? $this->table)
            ->{gettype($data) == "string" ? 'row' : 'result'}();
    }


    function get_options($select = '*', $where = null, $table = null, $limit = null, $offset = null, $order_by = null)
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
        return $this->db->get($table ?? $this->table)->result();
    }

    function insert($data, $id = false, $table = null)
    {
        $st = $this->db->insert($table ?? $this->table, $data);
        return $id ? $this->db->insert_id() : $st;
    }

    function update($data, $where, $table = null)
    {
        return $this->db->update($table ?? $this->table, $data, $where);
    }

    function delete($data, $table = null)
    {
        return $this->db->delete($table ?? $this->table, is_string($data) ? ['id' => $data] : $data);
    }


    function count($where = null, $table = null)
    {
        if ($where !== null) {
            $this->db->where($where);
        }
        return $this->db->count_all_results($table ?? $this->table);
    }
    function like($field, $value, $table = null, $position = 'both')
    {
        $this->db->like($field, $value, $position);
        return $this->db->get($table ?? $this->table)->result();
    }

    function not_like($field, $value, $table = null, $position = 'both')
    {
        $this->db->not_like($field, $value, $position);
        return $this->db->get($table ?? $this->table)->result();
    }

    function or_like($field, $value, $table = null, $position = 'both')
    {
        $this->db->or_like($field, $value, $position);
        return $this->db->get($table ?? $this->table)->result();
    }

    function or_not_like($field, $value, $table = null, $position = 'both')
    {
        $this->db->or_not_like($field, $value, $position);
        return $this->db->get($table ?? $this->table)->result();
    }

    function group_by($field, $table = null)
    {
        $this->db->group_by($field);
        return $this->db->get($table ?? $this->table)->result();
    }

    function having($having, $table = null)
    {
        $this->db->having($having);
        return $this->db->get($table ?? $this->table)->result();
    }

    function distinct($field, $table = null)
    {
        $this->db->distinct();
        $this->db->select($field);
        return $this->db->get($table ?? $this->table)->result();
    }

    function select_where_join($select = [], $where = [], $joins = null, $table = null)
    {
        $this->db->select($select);
        $this->db->where($where);
        $this->db->from($table ?? $this->table);
        if ($joins) {
            foreach ($joins as $join)
                $this->db->join($join['table'], $join['condition'], $join['type']);
        }
        $res = $this->db->get();
        return $res ? $res->result() : false;
    }

    function r($w,$t=null){return$this->db->where($w)->get($t??$this->table)->row();}
    function w($w,$t=null){return$this->db->where($w)->get($t??$this->table)->result();}
    function ws($w,$s="*",$t=null){return$this->db->select($s)->where($w)->get($t??$this->table)->result();}
    function a($t=null){return$this->db->get($t??$this->table)->result();}
    function s($s="*",$t=null){return$this->db->select($s)->get($t??$this->table)->result();}
    function g($d,$t=null){return$this->db->where(gettype($d)=="string"?['id'=>$d]:$d)->get($t??$this->table)->{gettype($d)=="string"?'row':'result'}();}
    function go($s="*",$w=null,$t=null,$l=null,$o=null,$b=null){$this->db->select($s);if($w){$this->db->where($w);}if($l){$this->db->limit($l,$o);}if($b){$this->db->order_by($b);}return$this->db->get($t??$this->table)->result();}
    function i($d,$i=false,$t=null){$st=$this->db->insert($t??$this->table,$d);return$i?$this->db->insert_id():$st;}
    function u($d,$w,$t=null){return$this->db->update($t??$this->table,$d,$w);}
    function del($d,$t=null){return$this->db->delete($t??$this->table,is_string($d)?['id'=>$d]:$d);}
    function c($w=null,$t=null){if($w){$this->db->where($w);}return$this->db->count_all_results($t??$this->table);}
    function l($f,$v,$t=null,$p='both'){$this->db->like($f,$v,$p);return$this->db->get($t??$this->table)->result();}
    function nl($f,$v,$t=null,$p='both'){$this->db->not_like($f,$v,$p);return$this->db->get($t??$this->table)->result();}
    function ol($f,$v,$t=null,$p='both'){$this->db->or_like($f,$v,$p);return$this->db->get($t??$this->table)->result();}
    function onl($f,$v,$t=null,$p='both'){$this->db->or_not_like($f,$v,$p);return$this->db->get($t??$this->table)->result();}
    function gb($f,$t=null){$this->db->group_by($f);return$this->db->get($t??$this->table)->result();}
    function h($h,$t=null){$this->db->having($h);return$this->db->get($t??$this->table)->result();}
    function dis($f,$t=null){$this->db->distinct();$this->db->select($f);return$this->db->get($t??$this->table)->result();}
    function swj($s=[],$w=[],$j=null,$t=null){$this->db->select($s);$this->db->where($w);$this->db->from($t??$this->table);if($j){foreach($j as$x){$this->db->join($x['t'],$x['c'],$x['y']);}}$r=$this->db->get();return$r?$r->result():false;}



}
