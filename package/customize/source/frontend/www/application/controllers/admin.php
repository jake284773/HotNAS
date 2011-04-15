<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{	
		if($this->session->userdata('logged_in'))
			redirect('admin/status', 'redirect', 302);
		else
			redirect('user/login', 'redirect', 302);
	}
	
	public function status()
	{
		$this->load->helper('url');
		
		$data['title'] = 'Admin';
		$data['app'] = 'HotNAS';
		$data['slogan'] = 'A lightweight NAS Linux distribution';
		
		$this->load->view('header', $data);
		$this->load->view('footer', $data);
	}
}
?>
