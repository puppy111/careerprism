<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('Question_model','tbl_questions');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
    }
	 
	public function index()
	{
		
        if($this->session->userdata('isUserLoggedIn') == false)
		{
           redirect('login', 'refresh');
        } 
		else
		{
            //echo $this->session->userdata('username').'-------------------------';
			//echo '<pre>';print_r($list);echo '</pre>';  exit; 
			
			$this->db->select("*");
			$this->db->where('id',$this->session->userdata('user_id'));
			$this->db->from('users');
			$query1 = $this->db->get();
			$report_result['user_data'] = $query1->result_array();
			
			
			$this->db->select("uid,result,added_on");
			$this->db->where('uid',$this->session->userdata('user_id'));
			$this->db->from('student_aptitude_log');
			$query2 = $this->db->get();
			$report_result['aptitude_result'] = $query2->result_array();
			
			
			$this->db->select("uid,result,added_on");
			$this->db->where('uid',$this->session->userdata('user_id'));
			$this->db->from('student_personality_log');
			$query3 = $this->db->get();
			$report_result['personality_result'] = $query3->result_array();
			
			
			$this->db->select('uid,invoice');
			$this->db->where('uid',$this->session->userdata('user_id'));
			$this->db->from('test_stages');
			$invoice1  = $this->db->get();
			$invoice2  = $invoice1->result_array();
			
			//echo '<pre>';print_r($invoice2);echo '</pre>'; exit;
			
			if($invoice2['0']['invoice'] == '0')
			{
				$test_stages = array
				(
					'invoice' => 1
				);
				
				$this->db->where('uid',$this->session->userdata('user_id'));
				$this->db->update('test_stages',$test_stages);
			}
			
			if($report_result['aptitude_result'] && $report_result['personality_result'])
			{
			   $this->load->view('invoice',$report_result);
			}
			else
			{
				echo 'PLEASE COMPLETE PERSONALITY AND APTITUDE TEST TO GET RESULT';
			}
        }
	}
	
	
}

