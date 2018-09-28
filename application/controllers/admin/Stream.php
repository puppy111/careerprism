<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stream extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->is_admin()) 
		{
           redirect('admin/auth/login');
		}   
		$this->load->model('Stream_model','tbl_streams');
		date_default_timezone_set('Asia/Kolkata');
		$this->config->load('category_rules');
		
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('admin/stream');
	}

	public function ajax_list()
	{
		$list = $this->tbl_streams->get_datatables();
	
		
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $tbl_streams) 
			{
				$no++;
				$row = array();
				$row[] = '<input type="checkbox" class="sub_chk" data-id="'.$tbl_streams->id.'">';
				$row[] = $tbl_streams->id;
				$row[] = '<a href='.base_url().'admin/branch/'.$tbl_streams->id.'>'.$tbl_streams->title.'</a>';
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$tbl_streams->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$tbl_streams->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tbl_streams->count_all(),
						"recordsFiltered" => $this->tbl_streams->count_filtered(),
						"data" => $data,
				);
		//output to json format
		
		echo json_encode($output);
	}

	
	public function ajax_add()
	{
		
		$this->form_validation->set_rules($this->config->item('stream_settings'));
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
					'title' => $this->input->post('title'),
					'created_on'=> date('Y-m-d H:i:s')
				);
			$insert = $this->tbl_streams->save($data);
			echo json_encode(array("status" => TRUE));
		}
	}
	
	public function ajax_edit($id)
	{
		$data = $this->tbl_streams->get_by_id($id);
		echo json_encode($data);
	}


	public function ajax_update()
	{
		
		$this->form_validation->set_rules($this->config->item('stream_settings'));
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
					'title' => $this->input->post('title')
				);
			$this->tbl_streams->update(array('id' => $this->input->post('id')), $data);
			echo json_encode(array("status" => TRUE));
		}
	}

	public function ajax_delete($id)
	{
		$this->tbl_streams->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_multi_delete()
	{
		 // print_r($_POST['ids']); exit;
		  
		  $ids = $_POST['ids'];
		 $idArr = explode(',', $ids);
	     $this->db->where_in('id',$idArr);
       	 $this->db->delete('tbl_streams');
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
