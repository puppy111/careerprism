<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends CI_Model {

	var $table  = 'tbl_branches';
	var $table1 = 'tbl_streams';
	var $column = array('title','created_on');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($param)
	{
		
		$this->db->from($this->table);
		$this->db->where('stream_id', $param);

		$i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($param)
	{
		$this->_get_datatables_query($param);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($param)
	{
		$this->_get_datatables_query($param);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($param)
	{
		$this->db->from($this->table);
		$this->db->where('stream_id', $param);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	


	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	
	public function bulk_delete($data)
	{
		if (!empty($data)) {
			$this->db->where_in('id', $data);
			$this->db->delete($this->table);
		}
	}
	

	/***********************/
	
	public function get_menu_title($id)
    {
		$this->db->select('title');
		$this->db->from($this->table1);
		$this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
	


}
