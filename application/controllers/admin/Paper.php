<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paper extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->is_admin()) 
		{
           redirect('admin/auth/login');
		}  
		$this->load->model('Question_model','tbl_questions');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
	}
	
	
	public function index($param)
	{
		
		$bread_crum = $this->tbl_questions->get_menu_title($param);
		$stream = $this->tbl_questions->get_stream();
		$branch = $this->tbl_questions->get_branch();
		
		 $data   = array(
            'title' => 'Level 2',
			'mcat_id' => $param,
			'bread_crum' => $bread_crum,
			'stream' => $stream,
			'branch' => $branch
           );
		
		 
		 //echo '<pre>';print_r($data);echo '</pre>';  exit;
		 
		 $this->load->view('admin/paper',$data);
	}

    public function ajax_list($param)
	{
		//$list = $this->tbl_questions->get_table_data($param);
		$list = $this->tbl_questions->get_datatables($param);
		
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $tbl_questions) 
			{
				$no++;
				$row = array();
				$row[] = '<input type="checkbox" class="sub_chk" data-id="'.$tbl_questions->id.'">';
				$row[] = $tbl_questions->id;
				$row[] = $tbl_questions->question;
				//add html for action
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$tbl_questions->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
					  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$tbl_questions->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
			
				$data[] = $row;
			}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->tbl_questions->count_all($param),
						"recordsFiltered" => $this->tbl_questions->count_filtered($param),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
	public function ajax_add()
	{
		
		//echo '<pre>';print_r(var_dump($_POST));echo '</pre>'; 
		
		$data = array(
				'question'  => $this->input->post('question'),
				'test_pid'   => $this->uri->segment(4)
				);
				
		$insert = $this->tbl_questions->save($data);
		$quest_id = $this->db->insert_id();
		
		/*---------Branches and Streams****************/
		$branch_a = $this->input->post('branch_a[]');
		$branch_b = $this->input->post('branch_b[]');
		$branch_c = $this->input->post('branch_c[]');
		$branch_d = $this->input->post('branch_d[]');
		$branch_e = $this->input->post('branch_e[]');
		
		$stream_a = $this->input->post('stream_a');
		$stream_b = $this->input->post('stream_b');
		$stream_c = $this->input->post('stream_c');
		$stream_d = $this->input->post('stream_d');
		$stream_e = $this->input->post('stream_e');
		
	    
		foreach($branch_a as $arr1)
		{
			$a['0']['branch_id'] = $branch_a;
		}
		
		foreach($branch_b as $arr2)
		{
			$b['1']['branch_id'] = $branch_b;
		}
		
		foreach($branch_c as $arr3)
		{
			$c['2']['branch_id'] = $branch_c;
		}
		
		foreach($branch_d as $arr4)
		{
			$d['3']['branch_id'] = $branch_d;
		}
		
		foreach($branch_e as $arr5)
		{
			$e['4']['branch_id'] = $branch_e;
		}
		
		
		$a['0']['stream_id'] = $stream_a;
		$a['0']['stream_option'] = 'a';
		$b['1']['stream_id'] = $stream_b;
		$b['1']['stream_option'] = 'b';
		$c['2']['stream_id'] = $stream_c;
		$c['2']['stream_option'] = 'c';
		$d['3']['stream_id'] = $stream_d;
		$d['3']['stream_option'] = 'd';
		$e['4']['stream_id'] = $stream_e;
		$e['4']['stream_option'] = 'e';

		$data2 = array_merge($a,$b,$c,$d,$e);
		//echo '<pre>';print_r($data2);echo '</pre>'; exit;
			
		////tbl_res_stream
		
		foreach($data2 as $k=>$arr1)
		{
			
			//echo '<pre>';print_r($arr1);echo '</pre>'; exit;
			$datat1 = 
			array
			(
				  'ques_id'   => $quest_id,
				  'stream_option'    => $arr1['stream_option'],
				  'stream_id' => $arr1['stream_id']
			 );
			 
			 $insert1 = $this->db->insert('tbl_res_stream', $datat1);
		}
		
		
		////tbl_res_branch
		foreach($data2 as $k=>$arr1)
		{
			
			//echo '<pre>';print_r($arr1);echo '</pre>'; exit;	
			$cnt = sizeof(($arr1['branch_id']));
			for($i=0;$i<$cnt;$i++)
			{
				  $datat3['c'] = array(
				  'ques_id'      => $quest_id,
				  'branch_option' => $arr1['stream_option'],
				  'branch_id'    => $arr1['branch_id'][$i]
				  );	
			  $insert2 = $this->db->insert('tbl_res_branch', $datat3['c']);	  
			}
		}
		echo json_encode(array("status" => TRUE));
		
		/*---------Branches and Streams*****//***********/
	}
	
	public function ajax_edit($id)
	{
		//$data1 = $this->tbl_questions->get_by_id($id);
		$data1['question'] = $this->tbl_questions->get_by_id($id);
		$data2['branch']   = $this->tbl_questions->get_by_branch_id($id);
		$data3['stream']   = $this->tbl_questions->get_by_stream_id($id);

		
		foreach($data2['branch'] as $k=>$v)
		{
			$data4['branch'][$v['branch_option']][] = $v['branch_id'];
		}
		
		if($data2 && $data3)
		{
			$append = array_merge($data1,$data2,$data3);
		}
		else
		{
			$append = $data1;
		}

		$result4  = $append;
		//echo '<pre>';print_r($result4);echo '</pre>'; 
		echo json_encode($result4);
	}


	public function ajax_update()
	{
		//echo '<pre>';print_r(var_dump($_POST));echo '</pre>'; 
		//echo  $this->input->post('id');
		//exit;
		
		$this->db->delete('tbl_res_stream', array('ques_id' => $this->input->post('id')));
		$this->db->delete('tbl_res_branch', array('ques_id' => $this->input->post('id')));
			
	   /*---------Branches and Streams****************/
		$branch_a = $this->input->post('branch_a[]');
		$branch_b = $this->input->post('branch_b[]');
		$branch_c = $this->input->post('branch_c[]');
		$branch_d = $this->input->post('branch_d[]');
		$branch_e = $this->input->post('branch_e[]');
		
		$stream_a = $this->input->post('stream_a');
		$stream_b = $this->input->post('stream_b');
		$stream_c = $this->input->post('stream_c');
		$stream_d = $this->input->post('stream_d');
		$stream_e = $this->input->post('stream_e');
		
	    
		foreach($branch_a as $arr1)
		{
			$a['0']['branch_id'] = $branch_a;
		}
		
		foreach($branch_b as $arr2)
		{
			$b['1']['branch_id'] = $branch_b;
		}
		
		foreach($branch_c as $arr3)
		{
			$c['2']['branch_id'] = $branch_c;
		}
		
		foreach($branch_d as $arr4)
		{
			$d['3']['branch_id'] = $branch_d;
		}
		
		foreach($branch_e as $arr5)
		{
			$e['4']['branch_id'] = $branch_e;
		}
		
		
		$a['0']['stream_id'] = $stream_a;
		$a['0']['stream_option'] = 'a';
		$b['1']['stream_id'] = $stream_b;
		$b['1']['stream_option'] = 'b';
		$c['2']['stream_id'] = $stream_c;
		$c['2']['stream_option'] = 'c';
		$d['3']['stream_id'] = $stream_d;
		$d['3']['stream_option'] = 'd';
		$e['4']['stream_id'] = $stream_e;
		$e['4']['stream_option'] = 'e';

		$data2 = array_merge($a,$b,$c,$d,$e);
		//echo '<pre>';print_r($data2);echo '</pre>'; exit;
			
		////tbl_res_stream
		foreach($data2 as $k=>$arr1)
		{
			//echo '<pre>';print_r($arr1);echo '</pre>'; exit;
			$datat1 = 
			array
			(
				  'ques_id'          => $this->input->post('id'),
				  'stream_option'    => $arr1['stream_option'],
				  'stream_id'        => $arr1['stream_id']
			 );
			 $insert1 = $this->db->insert('tbl_res_stream', $datat1);
		}
		
		
		////tbl_res_branch
		foreach($data2 as $k=>$arr1)
		{
			//echo '<pre>';print_r($arr1);echo '</pre>'; exit;	
			$cnt = sizeof(($arr1['branch_id']));
			for($i=0;$i<$cnt;$i++)
			{
				  $datat3['c'] = array(
				  'ques_id'       => $this->input->post('id'),
				  'branch_option' => $arr1['stream_option'],
				  'branch_id'     => $arr1['branch_id'][$i]
				  );	
			  $insert2 = $this->db->insert('tbl_res_branch', $datat3['c']);	  
			}
		}
		/*---------Branches and Streams*****//***********/
		
		$data = array('question'  => $this->input->post('question'));
		$this->tbl_questions->update(array('id' => $this->input->post('id')),$data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->db->delete('tbl_res_stream', array('ques_id' => $id));
		$this->db->delete('tbl_res_branch', array('ques_id' => $id));
		
		$this->tbl_questions->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	
	public function ajax_multi_delete()
	{
		 // print_r($_POST['ids']); exit;
		  
		 $ids = $_POST['ids'];
		 $idArr = explode(',', $ids);
		 
		 
		 $this->db->where_in('ques_id',$idArr);
       	 $this->db->delete('tbl_res_stream');
		 
		 $this->db->where_in('ques_id',$idArr);
       	 $this->db->delete('tbl_res_branch');
		 
	     $this->db->where_in('id',$idArr);
       	 $this->db->delete('tbl_questions');
		 echo json_encode(array("status" => TRUE));
		//http://phpflow.com/demo/delete_selected_rows_jquery_demo/
	}

}
