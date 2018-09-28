<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->is_admin()) 
		{
           redirect('admin/auth/login');
		}   
		$this->load->model('Branch_model','tbl_branches');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
	}
	
	
	public function index($param)
	{
		
		$bread_crum = $this->tbl_branches->get_menu_title($param);
		
		 $data   = array(
            'title' => 'Level 2',
			'id'    => $param,
			'bread_crum' => $bread_crum 
           );
		
		  $this->load->view('admin/branch',$data);
		  //echo '<pre>';print_r($data);echo '</pre>';
	}

    public function ajax_list($param)
	{
		//$list = $this->tbl_branches->get_table_data($param);
		$list = $this->tbl_branches->get_datatables($param);
		
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $tbl_branches) 
			{
				$no++;
				$row = array();
				$row[] = '<input type="checkbox" class="sub_chk" data-id="'.$tbl_branches->id.'">';
				$row[] = $tbl_branches->id;
				$row[] = $tbl_branches->title;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$tbl_branches->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$tbl_branches->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tbl_branches->count_all($param),
						"recordsFiltered" => $this->tbl_branches->count_filtered($param),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
	public function ajax_add()
	{
		
		$data = array(
				'title' => $this->input->post('title'),
				'stream_id'    =>  $this->uri->segment(4)
			);
		$insert = $this->tbl_branches->save($data);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_edit($id)
	{
		$data = $this->tbl_branches->get_by_id($id);
		echo json_encode($data);
	}


	public function ajax_update()
	{
		$data = array(
				'title' => $this->input->post('title')
			);
		$this->tbl_branches->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->tbl_branches->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_multi_delete()
	{
		 // print_r($_POST['ids']); exit;
		  
		  $ids = $_POST['ids'];
		 $idArr = explode(',', $ids);
	     $this->db->where_in('id',$idArr);
       	 $this->db->delete('tbl_branches');
		 echo json_encode(array("status" => TRUE));
		//http://phpflow.com/demo/delete_selected_rows_jquery_demo/
	}

}
