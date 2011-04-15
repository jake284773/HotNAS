<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		
		if($this->my_usession->logged_in)
			redirect('admin/status', 'redirect', 302);
		else
			redirect('user', 'redirect', 302);
	}
	
	public function status()
	{
		$this->load->helper('url');
		
		$data['title'] = "Admin";
		$data['app'] = "HotNAS";
		$data['tl_menu_names'] = array('Status', 'Storage', 'Services', 'Diagnostics', 'Logout');
		$data['tl_menu_links'] = array('#', '#', '#', '#', '/user/logout');
		
		$this->load->view('header_main', $data);
		$this->load->view('footer_main', $data);
	}
}
?>
