<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Muser extends CI_Model
{

    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';
    var $tabel = 'table_user';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
    $this->db->like('first_name', $q);
	$this->db->or_like('last_name', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('active', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
    $this->db->like('first_name', $q);
    $this->db->or_like('last_name', $q);
    $this->db->or_like('username', $q);
    $this->db->or_like('email', $q);
    $this->db->or_like('active', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function get_detail($id)
        {
            $query = $this->db->get_where('table_user', array('uid' => $id));
            return $query->row();
        }

     function get_update($data,$where){
       $this->db->where($where);
       $this->db->update($this->tabel, $data);
       return TRUE;
    }
}

/* End of file Muser.php */
/* Location: ./application/models/Muser.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-12-16 03:04:41 */
/* http://harviacode.com */