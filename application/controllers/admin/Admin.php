<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function __construct()
	{
         parent::__construct();
         if (!$this->ion_auth->is_admin()) 
		 {
            redirect('admin/auth/login');
		 }      
    }
	
	
	public function index()
	{
		
	}
	
	
	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}
	
	public function users()
	{
		$this->load->view('admin/users');
	}
	
	
	public function test()
	{
		$this->load->view('admin/test');
	}
	
	
	public function sms()
	{
		$this->load->view('admin/sms');
	}
	
	public function banner()
	{
        echo image_thumb('assets/supershop/images/1.jpg',150,150);
		$path = $_SERVER['DOCUMENT_ROOT'].'/1shopping/assets/supershop/images/1.jpg';
		?> 
		<img src="<?php echo base_url('assets/supershop/images/'.thumb($path,'400','400')); ?>">
        <?php
		// https://github.com/hernantz/Codeigniter-Thumbnail-Generator
	}


	
	
}
