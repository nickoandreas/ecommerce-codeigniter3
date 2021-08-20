<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('pelanggan_model');
   }
   
   public function index()
   {
     $this->load->model('rajaongkir_model');

     $data['title'] = 'Registrasi Pelanggan';
     $data['provinsi'] = $this->rajaongkir_model->provinsi();
     $data['isi']  = 'registrasi/list2';
      
     $this->form_validation->set_rules('nama_pelanggan', 'Nama', 'required');
     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pelanggan.email]');
     $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
     $this->form_validation->set_rules('telepon', 'No Telepon', 'required');


		if($this->form_validation->run()  == false) {
         
         $this->simple_pelanggan->sudah_masuk();
         $this->load->view('layout/wrapper', $data);

      }  
      
      else {

         $this->pelanggan_model->tambah();
         $this->session->set_userdata('email', $this->input->post('email', true));
         $this->session->set_flashdata('sukses_registrasi', 'Registrasi Berhasil');
         redirect('registrasi/sukses');
      }

   }

   public function sukses()
   {
      $data['title'] = 'Registrasi Berhasil';
      $data['isi']  = 'registrasi/sukses';
      
      $this->simple_pelanggan->belum_masuk();
      $this->simple_pelanggan->sudah_masuk();
      $this->load->view('layout/wrapper', $data);
   }

}