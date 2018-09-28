<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subchildcategories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('subchildcategories_model','sub_child_categories');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
		//$this->output->enable_profiler(FALSE);
	}
	
	
	public function index($param)
	{
		
		 $param1 = $this->uri->segment(3);
		 $param2 = $this->uri->segment(4);
		
		 $bread_crum = $this->sub_child_categories->get_menu_title($param1,$param2);
		
		 $data   = array(
            'title' => 'Level 2',
			'parent_id' => $param1,
			'child_id'  => $param2,
			'bread_crum' => $bread_crum
			);
		
		//echo $this->db->last_query();
		//echo '<pre>'; print_r($bread_crum); echo '</pre>';
		$this->load->view('admin/subchild_categories',$data);
	}

    public function ajax_list($mcid,$cid)
	{
		$list = $this->sub_child_categories->get_datatables($mcid,$cid);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $sub_child_categories) 
		{
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" class="sub_chk" data-id="'.$sub_child_categories->sub_child_cat_id.'">';
			$row[] = $sub_child_categories->sub_child_cat_id;
			$row[] = '<a href='.base_url().'admin/products/'.$mcid.'/'.$sub_child_categories->child_cat_id.'/'.$sub_child_categories->sub_child_cat_id.'>'.$sub_child_categories->sub_child_cat_name.'</a>';
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$sub_child_categories->sub_child_cat_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$sub_child_categories->sub_child_cat_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->sub_child_categories->count_all($mcid,$cid),
						"recordsFiltered" => $this->sub_child_categories->count_filtered($mcid,$cid),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
	public function ajax_add()
	{
		
		$data = array(
				'sub_child_cat_name' => $this->input->post('sub_child_cat_name'),
				'child_cat_id' =>  $this->uri->segment(4),
				'created_on'=> date('Y-m-d H:i:s')
			);
		$insert = $this->sub_child_categories->save($data);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_edit($id)
	{
		$data = $this->sub_child_categories->get_by_id($id);
		echo json_encode($data);
	}


	public function ajax_update()
	{
		$data = array(
				'sub_child_cat_name' => $this->input->post('sub_child_cat_name')
			);
		$this->sub_child_categories->update(array('sub_child_cat_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->sub_child_categories->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_multi_delete()
	{
		 // print_r($_POST['ids']); exit;
		  
		  $ids = $_POST['ids'];
		 $idArr = explode(',', $ids);
	     $this->db->where_in('sub_child_cat_id',$idArr);
       	 $this->db->delete('sub_child_categories');
		 echo json_encode(array("status" => TRUE));
		//http://phpflow.com/demo/delete_selected_rows_jquery_demo/
	}

}
