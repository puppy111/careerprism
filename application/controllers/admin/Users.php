<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->is_admin()) 
		{
           redirect('admin/auth/login');
		}   
		$this->load->model('Users_model','users');
		date_default_timezone_set('Asia/Kolkata');
		$this->config->load('category_rules');
		
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('admin/users');
	}

	public function ajax_list()
	{
		$list = $this->users->get_datatables();
	
		
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $users) 
			{
				
				
				$no++;
		
				$row = array();
				$row[] = '<input type="checkbox" class="sub_chk" data-id="'.$users->id.'">';
				$row[] = $no;
				$row[] = $users->ip_address;
				$row[] = $users->first_name;
				$row[] = $users->last_name;
				$row[] = $users->phone;
				$row[] = $users->email;
				//$row[] = date_format($users->created_on, 'U = Y-m-d H:i:s');
				$row[] =  gmdate("d-m-Y H:i:s", $users->created_on);
				
				if($users->active == 1)
				{
					$row[] = 'Active';
				}
				else
				{
					$row[] = 'Not Active';
				}
					
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" first_name="Edit" onclick="edit_person('."'".$users->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					  <a class="btn btn-sm btn-danger" href="javascript:void()" first_name="Hapus" onclick="delete_person('."'".$users->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
			
				$data[] = $row;
			}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->users->count_all(),
						"recordsFiltered" => $this->users->count_filtered(),
						"data" => $data,
				);
		//output to json format
		
		echo json_encode($output);
	}

	
	
	
	public function ajax_edit($id)
	{
		$data = $this->users->get_by_id($id);
		echo json_encode($data);
	}


	public function ajax_update()
	{
		
		//echo $this->input->post('first_name'); exit;
		//$this->form_validation->set_rules($this->config->item('Users_settings'));
		/*$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run('submit') == FALSE) 
		{
		  if(validation_errors())
		  {
		      $err_message = validation_errors();
			  echo json_encode(array('status' => FALSE,'message' => $err_message));
		  }
        } 
		else
		{*/
			$data = array(
					'active' => $this->input->post('active')
				);
			$this->users->update(array('id' => $this->input->post('id')), $data);
			echo json_encode(array("status" => TRUE));
			
		/*}*/
	}

	public function ajax_delete($id)
	{
		exit;
		$this->users->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_multi_delete()
	{
		 // print_r($_POST['ids']); exit;
		  exit;
		  $ids = $_POST['ids'];
		 $idArr = explode(',', $ids);
	     $this->db->where_in('id',$idArr);
       	 $this->db->delete('users');
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
