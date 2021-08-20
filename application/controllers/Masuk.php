<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      
      $this->load->model('pelanggan_model');
   }
   
   public function index()
   {  
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');


			if($this->form_validation->run()){

				$email    = $this->input->post('email');
				$password = $this->input->post('password');
				
				$this->simple_pelanggan->login($email, $password);

			}

      $data['title'] = 'Login Pelanggan';
      $data['isi'] = 'masuk/list2';
      
      $this->simple_pelanggan->sudah_masuk();
      $this->load->view('layout/wrapper', $data);
      
   }

   public function logout()
   {
      $this->simple_pelanggan->logout();
   }

}