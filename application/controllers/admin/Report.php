<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('Question_model','tbl_questions');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
    }
	 
	public function index($param1)
	{
		
        /*if (!$this->ion_auth->logged_in()) 
		{
           redirect('auth/login', 'refresh');
        } 
		else
		{
		*/
            //echo $this->session->userdata('username').'-------------------------';
			//echo '<pre>';print_r($list);echo '</pre>';  exit; 
			
			$this->db->select("*");
			$this->db->where('id',$param1);
			$this->db->from('users');
			$query1 = $this->db->get();
			$report_result['user_data'] = $query1->result_array();
			
			
			$this->db->select("uid,result,added_on");
			$this->db->where('uid',$param1);
			$this->db->from('student_aptitude_log');
			$query2 = $this->db->get();
			$report_result['aptitude_result'] = $query2->result_array();
			
			
			$this->db->select("uid,result,added_on");
			$this->db->where('uid',$param1);
			$this->db->from('student_personality_log');
			$query3 = $this->db->get();
			$report_result['personality_result'] = $query3->result_array();
			
			
			if($report_result['aptitude_result'] && $report_result['personality_result'])
			{
			   $this->load->view('admin/report',$report_result);
			}
			/*
			else
			{
				echo 'OOPS!! SOME THING WENT WRONG';
			}
			*/
        
	}
	
	
}

