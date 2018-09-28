<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Counseling extends CI_Controller 
{
	public function __construct()
	{
        parent::__construct();
		$this->load->helper('url');
		date_default_timezone_set('Asia/Kolkata');
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
			$this->load->helper('captcha');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[4]|max_length[20]|callback_alpha_dash_space|trim|xss_clean|strip_tags');
			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean|strip_tags|required|valid_email');
			$this->form_validation->set_rules('phone', 'phone', 'trim|xss_clean|strip_tags|required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('location', 'location', 'trim|xss_clean|strip_tags|required|min_length[2]|max_length[20]|callback_alpha_dash_space');
			
			$this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
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
				$this->load->view('counseling', $data);
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
				$config['smtp_user']           = 'satya@chaithanyam.org';
				$config['smtp_pass']           = 'raghavi@11brd';
				$config['mailtype'] = 'html';
				$config['charset']  = 'utf-8';
				$config['newline']  = '\r\n';
				$config['wordwrap'] = TRUE;
	
				$this->load->library('email');
				$this->email->initialize($config);
				//$this->email->from('koripellachaitanya11@gmail.com', 'chaitanya');
				$this->email->from('support@chaithanyam.org', 'support');
				$this->email->to('satya@chaithanyam.org');
				$this->email->subject('Carrer counseling');
	
				$message = '<html><body>';
				$message .= '<img src="http://www.careerprism.in/assets/template/images/logo.jpg" alt="logo" width="550px" height="100px" />';
				$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
				$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>".$_POST['name']. "</td></tr>";
				$message .= "<tr><td><strong>Email:</strong> </td><td>" .$_POST['email']. "</td></tr>";
				$message .= "<tr><td><strong>Phone:</strong> </td><td>" .$_POST['phone']. "</td></tr>";
				$message .= "<tr><td><strong>Location:</strong> </td><td>" .$_POST['location']. "</td></tr>";
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
	
	
    function alpha_dash_space($str)
    {
        return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    }
		
}

