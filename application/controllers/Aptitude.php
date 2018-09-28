<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aptitude extends CI_Controller 
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
			
			$this->db->select('*');
			$this->db->where('uid',$this->session->userdata('user_id'));
			$query = $this->db->get('student_aptitude_log');
			$num = $query->num_rows();
			if($num >= 1)
			{
			   echo 'You have Already Taken This Test, Please View Your Account Page For Test Result';
			}
			else
			{
				$list['data'] = $this->tbl_questions->get_test_paper(8);
				//echo '<pre>';print_r($list);echo '</pre>';  exit; 
	    		$this->load->view('aptitude',$list);
			}
        }
	}
	
	public function instructions()
	{
		$this->db->where('uid',$this->session->userdata('user_id'));
		$this->db->from('test_stages');
		$query2['res'] = $this->db->get()->result_array();
		//echo '<pre>'; print_r($query2); echo '</pre>';
		
		
			$this->db->select('*');
			$this->db->where('uid',$this->session->userdata('user_id'));
			$query = $this->db->get('student_aptitude_log');
			$num = $query->num_rows();
			if($num >= 1)
			{
				$data['test_status'] = 'You have Already Taken This Test, Please View Your Aptitude Test Result<br/>';
				$data['link'] = 'Aptitude Test Result';
				$this->db->select("uid,result,added_on");
				$this->db->where('uid',$this->session->userdata('user_id'));
				$this->db->from('student_aptitude_log');
				$query = $this->db->get();
				$data['aptitude_result'] = $query->result_array();
				
			   $this->load->view('test_status',$data);
			}
			else
			{
				$instructions['data'] = "This Is A Simple Questionnaire, give Responses Accordingly What Comes To Your Mind First. 
				Don\'t Think Too Much On Any Question. Be True To Yourself.";
				
				$instructions['link']     = 'career-aptitude-test';
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
		//echo '<pre>';print_r($_POST);echo '</pre>';
		
		if($_POST)
		{
			$data = $_POST;
			array_pop($data);
			
			foreach($data as $k=>$v)
			{
				 $qid     = substr($k,4);
				// FIND STREAM IDS
				$this->db->select('stream_id');
				$this->db->from('tbl_res_stream');
				$this->db->where('ques_id',$qid);
				$this->db->where('stream_option',$v);
				$query1 = $this->db->get();
				$stream_ids[$qid][$v] = $query1->result_array();
				
				
				 // FIND BRANCH IDS
				$this->db->select('branch_id');
				$this->db->from('tbl_res_branch');
				$this->db->where('ques_id', $qid);
				$this->db->where('branch_option',$v);
				$query2 = $this->db->get();
				$branch_ids[$qid][$v] = $query2->result_array();
				
			}
	
			foreach($stream_ids as $k1=>$arr1)
			{
				foreach($arr1 as $k2=>$v2)
				{
					$this->db->select('title');
					$this->db->from('tbl_streams');
					$this->db->where('id', $v2['0']['stream_id']);	
					$query3 = $this->db->get();
					$result['res'][$k1][$k2]['stream'][] = $query3->row_array();
				}
			}
			
			foreach($branch_ids as $k3=>$arr2)
			{
				foreach($arr2 as $k4=>$arr3)
				{
					$cnt = sizeof($arr3);
					for($i=0;$i<$cnt;$i++)
					{
						$this->db->select('title');
						$this->db->from('tbl_branches');
						$this->db->where('id', $arr3[$i]['branch_id']);	
						$query4 = $this->db->get();
						$result['res'][$k3][$k4]['branch'][] = $query4->row_array();
					}
				}
			}
			
			// Feroz START-------------------
			foreach ($result['res'] as $key => $value) 
			{
				foreach ($value as $key1 => $value1) 
				{
					foreach($value1['branch'] as $key2=>$value2)
					{
						$final['res'][$value1['stream'][0]['title']][] = $value2['title'];
					}
				}
			}
			array_multisort(array_map('count',$final), SORT_DESC, $final);
			//echo '<pre>';print_r($final);echo '</pre>';
			//echo '<pre>';print_r($branch_ids);echo '</pre>';
			//echo '<pre>';print_r($result);echo '</pre>';
			// Feroz END--------------------
			
			// INSERT ANSWER LOGS----------------------
			$test_result  =  json_encode($final['res']);
			$anwer_log    = json_encode($_POST);
			$aptitude_result = array(
				'uid'       => $this->session->userdata('user_id'),
				'answ_blob' => $anwer_log,
				'added_on'  => date('Y-m-d H:i:s'),
				'result'    => $test_result
			);
			$this->db->insert('student_aptitude_log', $aptitude_result); 
			
			// UPDATE TEST STAGE-----------------------
			/*$aptitude_result = array(
				'uid'       => $this->session->userdata('user_id'),
				'aptitude_test' => 1
			);
			$this->db->insert('test_stages', $aptitude_result); 
			$this->load->view('result',$final);*/
			
			$aptitude_result = array(
				'aptitude_test' => 1
			);
			$this->db->where('uid',$this->session->userdata('user_id'));
			$this->db->update('test_stages',$aptitude_result);
			$this->load->view('result',$final);	
	    }
		else
	    {
		     echo 'SHOW stored aptitude result';
	    }
	} // if post result
	
}
//http://www.codeproject.com/Articles/860024/Quiz-Application-in-AngularJs

