<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
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
	
	
	
	public function fest_login()
	{
		//$alphabets = range('A','Z');
		//$numbers = range('0','9');  
		//$final_array = array_merge($alphabets,$numbers);
		exit;
		/*for($i=1; $i<=1000; $i++)
		{
			$username 	= '2017CP'.$i;
			$password 	=  mt_rand(10000009, 99999999);			
			$additional_data = array(
			    'cp_id'        => $username,
				'cp_pass'      => $password,
				'active'      => '1'
			);
			
			$status = $this->db->insert('users', $additional_data); 
			
			if($status)
			{
				echo $i.'<br/>';	
			}
		}*/
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
	
	public function about()
	{
		$this->load->view('about');
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
		
        /*if($this->session->userdata('success_msg'))
		{
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
		
        if($this->session->userdata('error_msg'))
		{
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }*/
         
		if(is_numeric($this->input->post('phone')))
		{
			$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
		}
		else
		{
			$this->form_validation->set_rules('phone', 'CP ID', 'trim|required|xss_clean|min_length[6]|max_length[25]');
	    }
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[25]');
			    
		if ($this->form_validation->run() == true) 
		{
					
			$this->db->select('*');
			$this->db->from('users');
			
			if(is_numeric($this->input->post('phone')))
			{
				$this->db->where('phone ',$this->input->post('phone'));
			}
			else
			{
				$this->db->where('cp_id',$this->input->post('phone'));	
			}
			$this->db->where('cp_pass',$this->input->post('password'));
			$this->db->where('active','1');
			
			$this->db->limit(1);
			$query = $this->db->get();
			$checkLogin = $query->row_array();
			
			//echo '<pre>';print_r($checkLogin);echo '</pre>';
			//echo $this->db->last_query();exit;
			
			if($checkLogin['active']==1)
			{
				$this->session->set_userdata('isUserLoggedIn',TRUE);
				$this->session->set_userdata('user_id',$checkLogin['id']);
				redirect('my_account');
			}
			else
			{
				$data['error_msg'] = 'Wrong Phone or Password, please try again.';
				$this->session->set_flashdata('item', $data['error_msg']);
				redirect(base_url('login'));
			}
		 }
        //load the view
        $this->load->view('login', $data);
    }
	
	
	public function register()
	{
	  	
	$this->data['title'] = "Create User";
	$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
	$this->form_validation->set_rules('cp_id', 'CP Id','trim|xss_clean|min_length[6]|max_length[15]|is_unique[users.cp_id]');
	$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[25]');
	$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]|min_length[6]|max_length[25]');


		if ($this->form_validation->run() == true)
		{
			$reg_data = 
			array
			(
				'phone'      => $this->input->post('phone'),
				'cp_id'      => $this->input->post('cp_id'),
				'cp_pass'    => $this->input->post('password'),
				'active'     => '1',
				'doj'        => date('Y-m-d H:i:s')
			);
			
			// check if already exsist ?
			$this->db->where('phone',$this->input->post('phone'));
			if($this->input->post('cp_id'))
			{
				$this->db->or_where('cp_id',$this->input->post('cp_id'));
			}
			$check = $this->db->get('users');
			
			echo $this->db->last_query(); 
			
			
			if($check->num_rows() == 0)
			{
				// insert
				$ins = $this->db->insert('users', $reg_data); 
				
				if($ins == true)
				{
					$this->session->set_flashdata('item', 'Your account has been created successfully Please Login ');
					redirect(base_url('login'));
				}
				if($ins == false)
				{
					$this->session->set_flashdata('item', 'Some Thing Went Wrong');
					$this->load->view('register');
				}
			}
			else
			{
				$this->session->set_flashdata('item', 'Your already have and account with '.$this->input->post('phone').' Please login');
				redirect(base_url('login'));
				//echo $this->db->last_query(); 
			}
		}
		else
		{
			
			$this->load->view('register');
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
	
	
	public function my_account()
	{
        if($this->session->userdata('isUserLoggedIn') == true)
		{
			//echo $this->session->userdata('isUserLoggedIn');
			$this->db->where('uid',$this->session->userdata('user_id'));
			$this->db->from('test_stages');
			$query2['res'] = $this->db->get()->result_array();
			//$query['res'] = $query2->result_array();
	        //echo '<pre>'; print_r($query2); echo '</pre>';
			$this->load->view('my_account',$query2);
		}
		else
		{
           redirect('login', 'refresh');
        } 
	}
	
	public function privacy()
	{
		$this->load->view('about');
	}
	
	public function services()
	{
		$this->load->view('services');
	}
	
	public function expertpanel()
	{
		$this->load->view('expert_panel');
	}
	
	
	public function apply()
	{
			$this->load->helper('captcha');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|strip_tags|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|strip_tags|required|valid_email');
			$this->form_validation->set_rules('phone', 'phone', 'trim|xss_clean|strip_tags|required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('userCaptcha', 'Captcha', 'required');
			$userCaptcha = $this->input->post('userCaptcha');
			
			if ($this->form_validation->run() == FALSE)
			{
				// numeric random number for captcha
				$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
				// setting up captcha config
				$vals = array(
				'word' => $random_number,
				'img_path' => './assets/captcha/',
				'img_url' => base_url().'assets/captcha/',
				'img_width' => 140,
				'img_height' => 32,
				'expiration' => 7200
				);
				$data['captcha'] = create_captcha($vals);
				$this->session->set_userdata('captchaWord',$data['captcha']['word']);
				$this->load->view('apply', $data);
				//$this->load->view('counseling');
			}
		
			else if ($this->form_validation->run() == TRUE)
		    {
				$this->load->library('email');
				$config = array();
				$config['useragent']           = 'CodeIgniter';
				$config['protocol']            = 'smtp';
				$config['smtp_host']           = 'localhost';
				$config['smtp_port']           = 587;
				$config['smtp_user']           = 'support@careerprism.in';
				$config['smtp_pass']           = 'support!@#';
				$config['mailtype'] 			= 'html';
				$config['charset']  			 = 'iso-8859-1';
				$config['newline']  			 = '\r\n';
				$config['wordwrap'] 	        = TRUE;
				
				$config['upload_path'] 		= './resumes/';
				$config['allowed_types'] 	  = 'pdf|doc|docx';
				$config['max_size']           = '100000';
				
				$this->upload->initialize($config);
				
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('file'))
				{
					$error = array('error' => $this->upload->display_errors());
					//echo '<pre>';print_r($error);echo '</pre>';
				}
				else
				{
					$arr_image = array('upload_data' => $this->upload->data());
					$new_name = time().$_FILES["file"]['name'];
                   
					//echo '<pre>';print_r($arr_image);echo '</pre>';
					
					/*************************************/
					$config = array();
					$config['useragent']           = 'CodeIgniter';
					$config['protocol']            = 'smtp';
					$config['smtp_host']           = 'localhost';
					$config['smtp_port']           = 587;
					$config['smtp_user']           = 'support@careerprism.in';
					$config['smtp_pass']           = 'support!@#';
					$config['mailtype'] 			= 'html';
					$config['charset']  			 = 'iso-8859-1';
					$config['newline']  			 = '\r\n';
					$config['wordwrap'] 	        = TRUE;
					$config['allowed_types']       = 'txt|doc|docx';
			        $config['max_size']            = 10000;
					$config['encrypt_name']        = TRUE;
					$config['file_name']           = $new_name;
                    $this->email->initialize($config);
					
					/*---------CHANGE FILE NAME----------------*/
					
					//$this->email->attach($arr_image['upload_data']['file_path'].$new_name);
					$this->email->attach($arr_image['upload_data']['full_path']);
					
					$this->email->set_newline("\r\n");
					$this->email->set_crlf("\r\n");
					$this->email->from('support@careerprism.in', 'support');
					$this->email->to('satya@chaithanyam.org');
					$this->email->subject('NEW Job Resumes');
					$message = '<html><body>';
					$message .= '<img src="http://www.careerprism.in/assets/template/images/logo.jpg" 
					alt="logo" width="550px" height="100px" />';
					$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
					$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".$_POST['name']. "</td></tr>";
					$message .= "<tr><td><strong>Email:</strong> </td><td>" .$_POST['email']. "</td></tr>";
					$message .= "<tr><td><strong>Phone:</strong> </td><td>" .$_POST['phone']. "</td></tr>";
					$message .= "</table>";
					$message .= "</body></html>";
					
					$this->email->message($message);
					
					if ($this->email->send()) 
					{
						$this->session->set_flashdata('item','Thank you for submitting your application ,
						We will get in touch with you shortly');
						$this->load->view('email_message');
						//return true;
					} 
					else 
					{
						//echo "Mail FAILED";
						show_error($this->email->print_debugger());
					}
				}
		   }
	}
	
	public function contact()
	{
		$this->load->helper('captcha');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'trim|xss_clean|strip_tags|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|strip_tags|required|valid_email');
		$this->form_validation->set_rules('phone', 'phone', 'trim|xss_clean|strip_tags|required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('subject', 'subject', 'trim|xss_clean|strip_tags|required|min_length[2]|max_length[20]');
		$this->form_validation->set_rules('message', 'message', 'trim|xss_clean|strip_tags|required|min_length[2]|max_length[500]');
		
		$this->form_validation->set_rules('userCaptcha', 'Captcha', 'required');
		$userCaptcha = $this->input->post('userCaptcha');
		
		if ($this->form_validation->run() == FALSE)
		{
			// numeric random number for captcha
			$random_number = substr(number_format(time() * rand(),0,'',''),0,6);
			// setting up captcha config
			$vals = array(
			'word' => $random_number,
			'img_path' => './assets/captcha/',
			'img_url' => base_url().'assets/captcha/',
			'img_width' => 140,
			'img_height' => 32,
			'expiration' => 7200
			);
			$data['captcha'] = create_captcha($vals);
			$this->session->set_userdata('captchaWord',$data['captcha']['word']);
			$this->load->view('contact', $data);
			//$this->load->view('counseling');
		}
		else
		{
            $config = array();
            $config['useragent']           = 'CodeIgniter';
            //$config['mailpath']          = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
            $config['protocol']            = 'smtp';
            $config['smtp_host']           = 'localhost';
            $config['smtp_port']           = 587;
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
            $this->email->subject('Contact Form');

            $message = '<html><body>';
            $message .= '<img src="http://www.careerprism.in/assets/template/images/logo.jpg" alt="logo" width="550px" height="100px" />';
            $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".$_POST['name']. "</td></tr>";
            $message .= "<tr><td><strong>Email:</strong> </td><td>" .$_POST['email']. "</td></tr>";
            $message .= "<tr><td><strong>Phone:</strong> </td><td>" .$_POST['phone']. "</td></tr>";
            $message .= "<tr><td><strong>Subject:</strong> </td><td>".$_POST['subject']. "</td></tr>";
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
                $this->session->set_flashdata('item','Thank you for submitting your application ,We will get in touch with you shortly');
                $this->load->view('email_message');
            }				
        }
	}
	
	public function check_captcha($str)
	{
		$word = $this->session->userdata('captchaWord');
		if(strcmp(strtoupper($str),strtoupper($word)) == 0)
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('check_captcha', 'Please enter correct words!');
			return false;
		}
    }
	
	
    function alpha_dashg_space($str)
    {
        return ( ! preg_match("/^([-a-z_.])+$/i", $str)) ? FALSE : TRUE;
    }
	
}
