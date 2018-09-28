<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class result extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->is_admin()) 
		{
           redirect('admin/auth/login');
		}   
		$this->load->model('result_model','obj_result');
		date_default_timezone_set('Asia/Kolkata');
		$this->config->load('category_rules');
		
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('admin/result');
		
		//$list = $this->obj_result->get_datatables();
		//echo '<pre>'; print_r($list); echo '</pre>';
	}

	public function ajax_list()
	{
		    $list = $this->obj_result->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $obj_result) 
			{
				$no++;
				$row = array();
				$row[] = '<input type="checkbox" class="sub_chk" data-id="'.$obj_result->id.'">';
				$row[] = $obj_result->id;
				$row[] = $obj_result->first_name;
				$row[] = $obj_result->last_name;
				$row[] = (empty($obj_result->a_result) ? 'NO' : 'YES');
				$row[] = (empty($obj_result->p_result) ? 'NO' : 'YES');
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" title="Edit" href="'.'invoice/'.$obj_result->id.'"> View </a>';
			
				$data[] = $row;
			}

		    $output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->obj_result->count_all(),
						"recordsFiltered" => $this->obj_result->count_filtered(),
						"data" => $data,
				);
		//output to json format
		
		echo json_encode($output);
	}
	
	public function ajax_edit($id)
	{
		$data = $this->obj_result->get_by_id($id);
		echo json_encode($data);
	}

	
	  //----------CALLBACK--FUNCTION----------//
	public function name_check($str)
	{
    	$this->form_validation->set_message('name_check', 'Please enter valid %s value.');
		return (bool) preg_match('/^([-a-z_ ])+$/i', $str);
		
	} 
	
	

}
