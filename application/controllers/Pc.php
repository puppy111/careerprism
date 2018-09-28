<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pc extends CI_Controller 
{

	public function __construct()
	{
        parent::__construct();
		
    }
	 
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function about()
	{
		echo '---';
		$this->load->view('about');
	}
	
	/*public function services()
	{
		$this->load->view('services');
	}
	
	public function portfolio()
	{
		$this->load->view('portfolio');
	}
	
	public function contact()
	{
		$this->load->view('contact');
	}*/
}
