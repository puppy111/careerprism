<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subchildcategories_model extends CI_Model {

	var $table = 'sub_child_categories';
	var $table1 = 'child_categories';
	var $column = array('sub_child_cat_name','created_on');
	var $order = array('sub_child_cat_id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($mcid,$cid)
	{
		
		$this->db->from($this->table);
		$this->db->where('child_cat_id',$cid);

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

	function get_datatables($mcid,$cid)
	{
		$this->_get_datatables_query($mcid,$cid);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($mcid,$cid)
	{
		$this->_get_datatables_query($mcid,$cid);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($mcid,$cid)
	{
		$this->db->from($this->table);
		$this->db->where('child_cat_id',$cid);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('sub_child_cat_id',$id);
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
		$this->db->where('sub_child_cat_id', $id);
		$this->db->delete($this->table);
	}
	
	public function bulk_delete($data)
	{
		if (!empty($data)) {
			$this->db->where_in('sub_child_cat_id', $data);
			$this->db->delete($this->table);
		}
	}
	

	/***********************/
	
	public function get_menu_title($mcid,$child_id)
    {
		
		/*$this->db->select('child_categories.child_cat_name,sub_child_categories.sub_child_cat_name');
		$this->db->from('child_categories');
		$this->db->join('sub_child_categories', 'child_categories.child_cat_id = sub_child_categories.child_cat_id', 'left');
		$this->db->where('child_categories.child_cat_id',$child_id);
		$query = $this->db->get();
        return $query->result_array();*/
		
		$this->db->select('parent_categories.parent_cat_name,child_categories.child_cat_id,child_categories.child_cat_name');
		$this->db->from('parent_categories');
		$this->db->join('child_categories','parent_categories.parent_cat_id = child_categories.parent_cat_id', 'left');
		$this->db->where('child_categories.parent_cat_id',$mcid);
		$this->db->where('child_categories.child_cat_id',$child_id);
		$query = $this->db->get();
        return $query->result_array();
    }
	


}
