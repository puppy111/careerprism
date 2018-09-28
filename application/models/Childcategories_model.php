<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Childcategories_model extends CI_Model {

	var $table = 'child_categories';
	var $table1 = 'parent_categories';
	var $column = array('child_cat_name','created_on');
	var $order = array('child_cat_id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($param)
	{
		
		$this->db->from($this->table);
		$this->db->where('parent_cat_id', $param);

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
		$this->db->where('parent_cat_id', $param);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('child_cat_id',$id);
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
		$this->db->where('child_cat_id', $id);
		$this->db->delete($this->table);
	}
	
	public function bulk_delete($data)
	{
		if (!empty($data)) {
			$this->db->where_in('child_cat_id', $data);
			$this->db->delete($this->table);
		}
	}
	

	/***********************/
	
	public function get_menu_title($id)
    {
		$this->db->select('parent_cat_name');
		$this->db->from($this->table1);
		$this->db->where('parent_cat_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
	


}
