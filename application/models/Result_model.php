<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Result_model extends CI_Model {

	var $table = 'users';
	var $column = array('first_name');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->select('u.id,u.first_name,u.last_name,a.result as a_result,a.added_on as a_date, p.result as p_result,p.added_on as p_date');
		$this->db->from('users u'); 
		$this->db->join('student_aptitude_log a',    'a.uid = u.id' );
		$this->db->join('student_personality_log p', 'p.uid = u.id' ); 
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

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->select('u.id,u.first_name,u.last_name,a.result as a_result,a.added_on as a_date, p.result as p_result,p.added_on as p_date');
		$this->db->from('users u'); 
		$this->db->join('student_aptitude_log a',    'a.uid = u.id' );
		$this->db->join('student_personality_log p', 'p.uid = u.id' ); 
		//$this->db->from($this->table);
		$this->db->where('u.id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	
}