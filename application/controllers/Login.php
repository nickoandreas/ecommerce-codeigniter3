<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// Halaman Login
	public function index()
	{		
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			if($this->form_validation->run()){

				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				$this->simple_login->login($username, $password);

			}

			$data = array('title' => 'Login Administrator');
			$this->load->view('login/list', $data);
			
	}

	public function keluar()
	{
		$this->simple_login->logout();
	}






}
