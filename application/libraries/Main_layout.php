<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main_layout
{
	// hold codeigniter instance
	private $CI;
	// hold layout title
	private $layout_title = null;
	// hold description
	private $layout_description = null;
	// hold includes like css and js files
	private $includes = array();


	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('parent_model');
		$this->CI->load->model('child_model');
		$this->CI->load->model('sub_child_model');
	}
	// set layout title
	public function set_title($title)
	{
		$this->layout_title = $title;
	}
	// set layout description
	public function set_description($description)
	{
		$this->layout_description = $description;
	}


	// add includes like css and js
	public function add_include($path, $prepend_base_url = true)
	{
		if ($prepend_base_url) {

			$this->CI->load->helper('url'); // just in case
			$this->includes[] = base_url() . $path;

		} else {

			$this->includes[] = $path;
		}
		return $this;
	}


	// print the includes
	public function print_includes()
	{
		$final_includes = '';

		foreach ($this->includes as $include) {

			if (preg_match('/js$/', $include)) {

				$final_includes .= '<script src="' . $include . '"></script>' . "\n\r";

			} elseif (preg_match('/css$/', $include)) {

				$final_includes .= '<link href="' . $include . '" rel="stylesheet"/>' . "\n\r";
			}
		}
		return $final_includes;
	}


	// call the main_layout view from the controller
	public function view($view_name, $params = array(), $default = true, $main_layout = array())
	{
		/*if (is_array($main_layout) && count($main_layout) >= 1) {

			foreach ($main_layout as $layout_key => $layout) {
				
				$params[$layout_key] = $this->CI->load->view($layout, $params, true);
			}
		}*/


		if ($default) {
			// set layout title
			$params['layout_title']       = $this->layout_title;
			// set layout description
			$params['layout_description'] = $this->layout_description;

            $result = $this->CI->pc_model->load_menu();
			
				 foreach($result as $k=>$arr)
				 {
					$params['tree'][$arr['parent_cat_id']]['name'] = $arr['parent_cat_name'];
					$params['tree'][$arr['parent_cat_id']]['child'][$arr['child_cat_id']]['name'] = $arr['child_cat_name'];
					$params['tree'][$arr['parent_cat_id']]['child'][$arr['child_cat_id']]['subchild'][$arr['sub_child_cat_id']] = $arr['sub_child_cat_name'];
				}
		
		  		// Default header
				$this->CI->load->view('main_layout/header',$params);
				$this->CI->load->view('main_layout/cart.php');
				$this->CI->load->view('main_layout/menu.php');
				
				// render view
				$this->CI->load->view($view_name, $params);
				// render footer
				$this->CI->load->view('main_layout/footer');

		
		} else {
			// render view without hear and footer
			$this->CI->load->view($view_name, $params);
		}
	}
}
?>