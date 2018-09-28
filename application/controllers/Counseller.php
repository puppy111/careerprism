<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Counseller extends CI_Controller 
{

	public function __construct()
	{
        parent::__construct();	
		$this->load->library('upload');
		date_default_timezone_set('Asia/Kolkata');	
		//$this->output->enable_profiler(TRUE);
    }
	 
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
	
	public function askme()
	{
		    //echo "<pre>";print_r($_POST);echo "</pre>";
		    $config = array();
            $config['useragent']           = 'CodeIgniter';
            //$config['mailpath']          = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
            $config['protocol']            = 'smtp';
            $config['smtp_host']           = 'localhost';
            $config['smtp_port']           = 21;
            $config['smtp_user']           = 'support@careerprism.in';
            $config['smtp_pass']           = 'support!@#';
            $config['mailtype'] = 'html';
            $config['charset']  = 'utf-8';
            $config['newline']  = '\r\n';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);
            //$this->email->from('koripellachaitanya11@gmail.com', 'chaitanya');
            $this->email->from('support@careerprism.in', 'support');
            $this->email->to('satya@chaithanyam.org');
            $this->email->subject('Ask Me Box');

            $message = '<html><body>';
            $message .= '<img src="http://www.careerprism.in/assets/template/images/logo.jpg" 
			alt="logo" width="550px" height="100px" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".$_POST['name']. "</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>" .$_POST['email']. "</td></tr>";
            $message .= "<tr><td><strong>Phone:</strong> </td><td>" .$_POST['phone']. "</td></tr>";
            $message .= "<tr><td><strong>Pincode:</strong> </td><td>".$_POST['pincode']. "</td></tr>";
			$message .= "<tr><td><strong>Message:</strong> </td><td>".$_POST['message']. "</td></tr>";
            $message .= "</table>";
            $message .= "</body></html>";
            $this->email->message($message);
            //$this->email->send();

            if (!$this->email->send())
            {
                echo $this->email->print_debugger();
            }
            else
            {
                $this->session->set_flashdata('item','Thank you for submitting your application ,
				We will get in touch with you shortly');
                $this->load->view('email_message');
            }			
	}
	
	 /*
     * User logout
     */
    public function logout()
	{
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('login');
    }
	
	
	public function forgot()
	{
		
		if(is_numeric($this->input->post('phone')))
		{
			$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
		}
		
		if ($this->form_validation->run() == true) 
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('phone',$this->input->post('phone'));
			$this->db->where('active','1');
			$this->db->limit(1);
			$query = $this->db->get();
			$checkLogin = $query->row_array();
			
			echo $this->db->last_query();exit;
			if($checkLogin['phone']== true)
			{
				$data['error_msg'] = 'Password has been sent to your registered phone number.';
				$this->session->set_flashdata('item', $data['error_msg']);
				$this->load->view('forgot');
			}
			else
			{
				$data['error_msg'] = 'Oops something went wring.';
				$this->session->set_flashdata('item', $data['error_msg']);
				redirect(base_url('forgot'));
			}
		}
		else{
			$this->load->view('forgot');
			
		}
		
		
	}
	
	public function login()
	{
        $data = array();
		
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email|xss_clean|min_length[15]|max_length[40]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[25]');
			    
		if($this->form_validation->run() == true) 
		{
			$this->db->select('*');
			$this->db->from('counsellors');
            $this->db->where('email',$this->input->post('email'));	
			$this->db->where('password',$this->input->post('password'));
			$this->db->where('status','1');
			$this->db->limit(1);
			$query = $this->db->get();
			$checkLogin = $query->row_array();
			
			//echo '<pre>';print_r($checkLogin);echo '</pre>';
			//echo $this->db->last_query();exit;
			
			if($checkLogin['status']==1)
			{
				$this->session->set_userdata('isUserLoggedIn',TRUE);
				$this->session->set_userdata('user_id',$checkLogin['id']);
				redirect('counseller_dashboard');
			}
			else
			{
				$data['error_msg'] = 'Wrong Phone or Password, please try again.';
				$this->session->set_flashdata('item', $data['error_msg']);
				redirect(base_url('counseller/login'));
			}
		 }
        //load the view
        $this->load->view('counseller_login', $data);
    }
	
	
	public function registration()
	{
		$this->data['title'] = "Create Counseller";
		$this->form_validation->set_rules('first_name', 'First name','trim|required|xss_clean|min_length[3]|max_length[15]');
	    $this->form_validation->set_rules('last_name', 'Last name','trim|required|xss_clean|min_length[1]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email|xss_clean|min_length[15]|max_length[40]|is_unique[counsellors.email]');
		$this->form_validation->set_rules('location', 'Location','trim|required|xss_clean|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('stream', 'Stream','trim|required|xss_clean|min_length[2]|max_length[15]');
		$this->form_validation->set_rules('profession', 'Profession','trim|required|xss_clean|min_length[2]|max_length[15]');

		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[25]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]|min_length[6]|max_length[25]');


		if ($this->form_validation->run() == true)
		{
			$reg_data = 
			array
			(
				'first_name'     =>  $this->input->post('first_name'),
				'last_name'      =>  $this->input->post('last_name'),
				'location'       =>  $this->input->post('location'),
				'stream'         =>  $this->input->post('stream'),
				'profession'     =>  $this->input->post('profession'),
				'email'          =>  $this->input->post('email'),
				'phone'          =>  $this->input->post('phone'),
				'password'       =>  $this->input->post('password'),
				'status'         =>  '1',
				'created_on'     =>  date('Y-m-d H:i:s')
			);
			
			// check if already exsist ?
			$this->db->where('email',$this->input->post('email'));
			$check = $this->db->get('counsellors');
			
			//echo $this->db->last_query(); 
			
			if($check->num_rows() == 0)
			{
				// insert
				$ins = $this->db->insert('counsellors', $reg_data); 
				
				if($ins == true)
				{
					$this->session->set_flashdata('item', 'Your account has been created successfully Please Login ');
					redirect(base_url('counseller/registration'));
				}
				if($ins == false)
				{
					$this->session->set_flashdata('item', 'Some Thing Went Wrong');
					$this->load->view('counseller_registration');
				}
			}
			else
			{
				$this->session->set_flashdata('item', 'Your already have and account with '.$this->input->post('phone').' Please login');
				redirect(base_url('counseller/registration'));
				//echo $this->db->last_query(); 
			}
		}
		else
		{
			
			$this->load->view('counseller_registration');
		}
		
	}
	
	
	public function profile()
	{
    	$this->form_validation->set_rules('fname', 'FIRST NAME', 'trim|required|xss_clean|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('lname', 'LAST NAME','trim|required|xss_clean|min_length[1]|max_length[30]');
		$this->form_validation->set_rules('parent_phone', 'PARENT PHONE', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('email', 'EMAIL', 'trim|valid_email|xss_clean');
		$this->form_validation->set_rules('class', 'CLASS', 'trim|required|xss_clean|min_length[1]|max_length[50]');
		$this->form_validation->set_rules('school', 'SCHOOL', 'trim|required|xss_clean|min_length[1]|max_length[50]');

		  
		if ($this->form_validation->run() == true)
		{
		  $prf_data = 
			array
			(
				'first_name'   => $this->input->post('fname'),
				'last_name'  	=> $this->input->post('lname'),
				'parent_phone' => $this->input->post('parent_phone'),
				'email'        => $this->input->post('email'),
				'class'        => $this->input->post('class'),
				'school'       => $this->input->post('school'),
			);
			
			// insert
			$this->db->set($prf_data);  
			$this->db->where('id', $this->session->userdata('user_id')); 
			$status = $this->db->update('users'); 

			if($status == true)
			{
				$this->session->set_flashdata('item', 'Profile Details Updated Successfully , Please Take aptitude test');
				
				$test_stage = array(
					'uid'       			=> $this->session->userdata('user_id'),
					'profile_completion' => 1
				);
				$this->db->insert('test_stages', $test_stage); 
				redirect('my_account');
			
			}
			if($status == false)
			{
				$this->session->set_flashdata('item', 'Some Thing Went Wrong');
				
				$user_data['std_data'] = false;
				$this->load->view('profile',$user_data);
			}
		}
		else
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id',$this->session->userdata('user_id'));
			$this->db->limit(1);
			$query = $this->db->get();
			$user_data['std_data'] = $query->row_array();
			
			$this->load->view('profile',$user_data);
		}
    }
	
	
	public function counseller_dashboard()
	{
        if($this->session->userdata('isUserLoggedIn') == true)
		{
			//echo $this->session->userdata('isUserLoggedIn');
			//$this->db->where('uid',$this->session->userdata('user_id'));
			//$this->db->from('test_stages');
			//$query2['res'] = $this->db->get()->result_array();
			//$query['res'] = $query2->result_array();
	        //echo '<pre>'; print_r($query2); echo '</pre>';
			$this->load->view('counseller_dashboard');
		}
		else
		{
           redirect('counseller_dashboard', 'refresh');
        } 
	}
	
    function alpha_dashg_space($str)
    {
        return ( ! preg_match("/^([-a-z_.])+$/i", $str)) ? FALSE : TRUE;
    }
	
}
