<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Personality extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
		$this->load->model('Question_model','tbl_questionions');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
        $this->config->load('personality_question', TRUE);
		
		//$this->output->enable_profiler(TRUE);
    }
	 
	public function index()
	{
        if($this->session->userdata('isUserLoggedIn') == false)
		{
           redirect('login', 'refresh');
        } 
		else
		{
            //echo '<pre>';print_r($list);echo '</pre>';  exit;		
			
			 //CHECK IF ALREADY TAKEN  
			$this->db->select('*');
			$this->db->where('uid',$this->session->userdata('user_id'));
			$query = $this->db->get('student_personality_log');
			$num = $query->num_rows();
			
			if($num >= 1)
			{
			   echo 'You have Already Taken This Test, Please View Please View Your Personality Test Result';
			}
			else
			{
				$this->db->where('uid',$this->session->userdata('user_id'));
				$this->db->from('test_stages');
				$query2['res'] = $this->db->get()->result_array();
				
				if(isset($res['0']['aptitude_test']) == 1)
				{
					echo 'Please take aptitude test , before taking personality test';	
				}
				else
				{
				
				$list['ptest'] = $this->config->item('personality_test_questions', 'personality_question');
				
				//echo '<pre>';print_r($list);echo '</pre>';  exit; 
				
	    		$this->load->view('personality',$list);
				}
			}
		}
	}
	
	public function instructions()
	{
		    // CHECK IF ALREADY TAKEN  
			$this->db->select('*');
			$this->db->where('uid',$this->session->userdata('user_id'));
			$query = $this->db->get('student_personality_log');
			$num = $query->num_rows();
			if($num >= 1)
			{
			    $data['test_status'] ='You have Already Taken This Test, Please View Please View Your Personality Test Result<br/>';
				$data['link'] = 'Personality Test Result';
				$this->db->select("uid,result,added_on");
				$this->db->where('uid',$this->session->userdata('user_id'));
				$this->db->from('student_personality_log');
				$query = $this->db->get();
				$data['personality_result'] = $query->result_array();
				$this->load->view('test_status',$data);
			}
			else
			{
			$instructions['data'] = "This Is A Simple Personality Test, It Will Help You Understand Why You Act The Way That You Do And How Your Personality Is Structured. Listen To The Instructions And Start Giving Your Opinions Whole Heartedly.";
			
			$instructions['link'] = 'personality-test';
			
			if($this->session->userdata('isUserLoggedIn') == false)
			{
				 redirect('login', 'refresh');
			}
			else
			{
				$instructions['btntext'] = 'Start Test';
			}
				$this->load->view('instructions',$instructions);
			}
	}

	public function res()
	{
		error_reporting(0);
		//echo '<pre>';print_r($_POST);echo '</pre>';
		if($_POST)
		{
			$list = $this->config->item('personality_test_questions', 'personality_question');
			$data5  = $_POST;
			//$data = substr($qqq,4);
			array_pop($data5);
			//echo '<pre>'.print_r($list).'</pre>';
			//print_r($list['ptest']);
			
			foreach($data5 as $k5=>$v5)
			{
				$data[substr($k5,4)] = $v5;
			}
			
			//echo '<pre>'.print_r($data5).'</pre>';
			//echo '<pre>'.print_r($data).'</pre>';
	
			foreach($list as $k=>$v)
			{
				
				$operator = substr($v['calculation'],0,1);
				$number   = substr($v['calculation'],1,2);
				
				//echo $operator.' '.$number.'<br/>';
				
				
				if($operator == "+")
				{
					$tot =  $data[$k]+$number;
					$result['res'][$v['trait']][$k] = $tot;			
					//echo $data[$k].'+'.$number.'<br/>';
				}
				if($operator == "-")
				{
					$tot = $number-$data[$k];
					$result['res'][$v['trait']][$k] = $tot;
					//echo $number.'-'.$data[$k].'<br/>';
				}			
			}
			
			// CALCULATING TOTAL RESULT BASED ON  E,A,C,N,O
			
			$result2 = array();
			
			foreach($result as $k=>$arr)
			{	
				foreach($arr as $k2=>$arr2)
				{			
					foreach($arr2 as $k3=>$v3)
					{						
						if(isset($k2))
						{
							error_reporting(0);
							$result2['res'][$k2] += $v3;
						}						
					}					
				}
			}
			
			// INSERT ANSWER LOGS----------------------
			$test_result  =  json_encode($result2['res']);
			$anwer_log    = json_encode($_POST);
			$aptitude_result = array(
				'uid'       => $this->session->userdata('user_id'),
				'answ_blob' => $anwer_log,
				'added_on'  => date('Y-m-d H:i:s'),
				'result'    => $test_result
			);
			$this->db->insert('student_personality_log', $aptitude_result); 
			
			// UPDATE TEST STAGE-----------------------
			$personality_result = array(
				'personality_test' => 1
			);
			$this->db->where('uid',$this->session->userdata('user_id'));
			$this->db->update('test_stages',$personality_result);
			$this->load->view('presult',$result2);	
	    }
		else
	    {
		     echo 'SHOW stored personality result';
	    }
	
			
	}//--------------
	
}