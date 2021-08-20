<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
	}
	

	// Halaman Home
	public function index()
	{		
			$produk = $this->produk_model->home();
			$data['produk'] = $produk;
			$data['title'] = 'Part Station';
         $data['isi'] = 'home/main';
			
         $this->load->view('layout/wrapper', $data);
	}



}
