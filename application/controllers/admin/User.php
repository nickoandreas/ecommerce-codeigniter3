<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('User_model');
      $this->load->model('Userapi_model');
      $this->simple_login->cek_login();
   }
   

   public function index()
   {  
      $waktu_mulai = microtime(true);
      $user = $this->Userapi_model->listing();
      $waktu_selesai = microtime(true);
      $waktu_eksekusi = $waktu_selesai - $waktu_mulai;

      $data['title'] = 'Data Pengguna';
      $data['user'] = $user;
      $data['isi'] = 'admin/user/list';
      $data['waktu_eksekusi'] = number_format($waktu_eksekusi, 3);
      $data['jumlah_user'] = count($user);

      $this->load->view('admin/layout/wrapper', $data);
   }

   public function tambah()
   {
      $data['title'] = 'Tambah Pengguna';
      $data['isi'] = 'admin/user/tambah';
      
     $this->form_validation->set_rules('nama', 'Nama', 'required');
     $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
     $this->form_validation->set_rules('username', 'Username', 'required|max_length[20]|min_length[5]|is_unique[users.username]');
     $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

		if($this->form_validation->run()  == false) {

         $this->load->view('admin/layout/wrapper', $data);

      }  
      
      else {
         $this->session->set_flashdata('user', $this->input->post('nama', true));
         $this->session->set_flashdata('time_awal', microtime(true));
         $this->Userapi_model->tambah();
         $this->session->set_flashdata('time_akhir', microtime(true));
         $this->session->set_flashdata('flash', 'Ditambahkan');
         $this->session->set_flashdata('msg', 'Waktu Untuk Menambahkan Data '.$this->session->flashdata('user').' (CREATE)');
         redirect('admin/user');
      }
         
   }

   public function delete($id)
   {  
      $user = $this->Userapi_model->listingById($id);
      $this->session->set_flashdata('user', $user['nama']);
      $this->session->set_flashdata('time_awal', microtime(true));
      $this->Userapi_model->hapus($id);
      $this->session->set_flashdata('time_akhir', microtime(true));
      $this->session->set_flashdata('flash', 'Dihapus');
      $this->session->set_flashdata('msg', 'Waktu Untuk Menghapus Data '.$this->session->flashdata('user').' (DELETE)');
      redirect('admin/user');
   }

   public function edit($id)
   {  
      $data['title'] = 'Edit Pengguna';
      $data['isi'] = 'admin/user/ubah';
      $data['users'] = $this->Userapi_model->listingById($id);
      $data['level'] = ['Admin', 'User'];
      
     $this->form_validation->set_rules('nama', 'Nama', 'required');
     $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
     

		if($this->form_validation->run() == false) {

         $this->load->view('admin/layout/wrapper', $data);

      } 

      else {
         $this->session->set_flashdata('user', $this->input->post('nama', true));
         $this->session->set_flashdata('time_awal', microtime(true));
         $this->Userapi_model->ubah($id);
         $this->session->set_flashdata('time_akhir', microtime(true));
         $this->session->set_flashdata('flash', 'Diubah');
         $this->session->set_flashdata('msg', 'Waktu Untuk Mengubah Data '.$this->session->flashdata('user').' (UPDATE)');
         redirect('admin/user');
      }
      
   }




}


