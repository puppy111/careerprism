<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Childcategories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('childcategories_model','child_categories');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
	}
	
	
	public function index($param)
	{
		
		$bread_crum = $this->child_categories->get_menu_title($param);
		
		 $data   = array(
            'title' => 'Level 2',
			'mcat_id' => $param,
			'bread_crum' => $bread_crum 
           );
		
		 $this->load->view('admin/child_categories',$data);
	}

    public function ajax_list($param)
	{
		//$list = $this->child_categories->get_table_data($param);
		$list = $this->child_categories->get_datatables($param);
		
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $child_categories) 
			{
				$no++;
				$row = array();
				$row[] = '<input type="checkbox" class="sub_chk" data-id="'.$child_categories->child_cat_id.'">';
				$row[] = $child_categories->child_cat_id;
				$row[] = '<a href='.base_url().'admin/subchildcategories/'.$child_categories->parent_cat_id.'/'.$child_categories->child_cat_id.'>'.$child_categories->child_cat_name.'</a>';
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$child_categories->child_cat_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$child_categories->child_cat_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->child_categories->count_all($param),
						"recordsFiltered" => $this->child_categories->count_filtered($param),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
	public function ajax_add()
	{
		
		$data = array(
				'child_cat_name' => $this->input->post('child_cat_name'),
				'parent_cat_id' =>  $this->uri->segment(4),
				'created_on'=> date('Y-m-d H:i:s')
			);
		$insert = $this->child_categories->save($data);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_edit($id)
	{
		$data = $this->child_categories->get_by_id($id);
		echo json_encode($data);
	}


	public function ajax_update()
	{
		$data = array(
				'child_cat_name' => $this->input->post('child_cat_name')
			);
		$this->child_categories->update(array('child_cat_id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->child_categories->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_multi_delete()
	{
		 // print_r($_POST['ids']); exit;
		  
		  $ids = $_POST['ids'];
		 $idArr = explode(',', $ids);
	     $this->db->where_in('child_cat_id',$idArr);
       	 $this->db->delete('child_categories');
		 echo json_encode(array("status" => TRUE));
		//http://phpflow.com/demo/delete_selected_rows_jquery_demo/
	}

}
