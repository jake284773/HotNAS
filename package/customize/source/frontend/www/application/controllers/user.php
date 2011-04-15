<?php
class User extends CI_Controller {
	public function login()
	{
		$data['title'] = 'Login';
		$data['app'] = 'HotNAS';
		$data['slogan'] = 'A lightweight NAS Linux distribution';
		
		// Load required libraries/helpers
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		
		if(!empty($_POST))
		{
			$login_data = array(
				'username' => $_POST['username'],
				'password' => $_POST['password']
			);
			
			exec('sshpass -p ' . $login_data['password'] . ' ssh -y -l root localhost touch /tmp/frontend_login');
			
			if($login_data['username'] != 'admin' || !file_exists('/tmp/frontend_login'))
				$auth_failed = TRUE;
			else
			{
				$auth_failed = FALSE;
				
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
