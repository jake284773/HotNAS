<?php

/*
	controllers/user.php

	Copyright 2011 Jake Moreman <me@jakemoreman.co.uk>

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
	MA 02110-1301, USA.
*/

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function login()
	{
		$data['title'] = 'Login';
		$data['app'] = 'HotNAS';
		$data['slogan'] = 'A lightweight NAS Linux distribution';
		$data['msgcode'] = '';
		$data['msgtext'] = '';
		
		// Load required libraries/helpers
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		
		if(!empty($_POST))
		{
			$login_data = array(
				'username' => $_POST['username'],
				'password' => $_POST['password']
			);
			
			exec('sshpass -p ' . $login_data['password'] . ' ssh -y -l root localhost /frontend/cli/www_loginflag_create');
			
			if($login_data['username'] != 'admin' || !file_exists('/tmp/frontend_login'))
			{
				$data['msgcode'] = 'error';
				$data['msgtext'] = 'Invalid username or password';
			}
			else
			{	
				exec('rm -f /tmp/frontend_login');
				
				$sessiondata = array(
					'username' => $login_data['username'],
					'logged_in' => TRUE
				);
				
				$this->session->set_userdata($sessiondata);
				redirect('admin', 'redirect', 302);
			}
		}
		
		// Load views
		$this->load->view('header_login', $data);
		$this->load->view('user/login', $data);
		$this->load->view('footer_login', $data);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user/login');
	}
}
?>
