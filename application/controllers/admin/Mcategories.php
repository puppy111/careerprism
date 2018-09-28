<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcategories extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 if (!$this->ion_auth->is_admin()) 
		 {
			redirect('admin/auth/login');
		 }   
		$this->load->model('Mcategories_model','parent_categories');
		date_default_timezone_set('Asia/Kolkata');
		$this->config->load('category_rules');
		
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('admin/mcategories_view');
	}

	public function ajax_list()
	{
		$list = $this->parent_categories->get_datatables();
		
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $parent_categories) 
			{
				$no++;
				$row = array();
				$row[] = '<input type="checkbox" class="sub_chk" data-id="'.$parent_categories->parent_cat_id.'">';
				$row[] = $parent_categories->parent_cat_id;
				$row[] = '<a href='.base_url().'admin/childcategories/'.$parent_categories->parent_cat_id.'>'.$parent_categories->parent_cat_name.'</a>';
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$parent_categories->parent_cat_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$parent_categories->parent_cat_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->parent_categories->count_all(),
						"recordsFiltered" => $this->parent_categories->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
	public function ajax_add()
	{
		
		$this->form_validation->set_rules($this->config->item('category1_settings'));
		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run('submit') == FALSE) 
		{
		  if(validation_errors())
		  {
		      $err_message = validation_errors();
			  echo json_encode(array('status' => FALSE,'message' => $err_message));
		  }
        } 
		else
		{
			$data = array(
					'parent_cat_name' => $this->input->post('parent_cat_name'),
					'created_on'=> date('Y-m-d H:i:s')
				);
			$insert = $this->parent_categories->save($data);
			echo json_encode(array("status" => TRUE));
		}
	}
	
	public function ajax_edit($id)
	{
		$data = $this->parent_categories->get_by_id($id);
		echo json_encode($data);
	}


	public function ajax_update()
	{
		
		$this->form_validation->set_rules($this->config->item('category1_settings'));
		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run('submit') == FALSE) 
		{
		  if(validation_errors())
		  {
		      $err_message = validation_errors();
			  echo json_encode(array('status' => FALSE,'message' => $err_message));
		  }
        } 
		else
		{
			$data = array(
					'parent_cat_name' => $this->input->post('parent_cat_name')
				);
			$this->parent_categories->update(array('parent_cat_id' => $this->input->post('id')), $data);
			echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete($id)
	{
		$this->parent_categories->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_multi_delete()
	{
		 // print_r($_POST['ids']); exit;
		  
		  $ids = $_POST['ids'];
		 $idArr = explode(',', $ids);
	     $this->db->where_in('parent_cat_id',$idArr);
       	 $this->db->delete('parent_categories');
		 echo json_encode(array("status" => TRUE));
		//http://phpflow.com/demo/delete_selected_rows_jquery_demo/
	}
	
	  //----------CALLBACK--FUNCTION----------//
	public function name_check($str)
	{
    	$this->form_validation->set_message('name_check', 'Please enter valid %s value.');
		return (bool) preg_match('/^([-a-z_ ])+$/i', $str);
		
	} 
	
	

}
