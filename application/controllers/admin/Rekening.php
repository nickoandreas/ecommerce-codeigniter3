<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {


   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('rekening_model');
      $this->simple_login->cek_login();
   }
   

   public function index()
   {
      $rekening = $this->rekening_model->listing();
      

      $data['title'] = 'Data Rekening';
      $data['rekening'] = $rekening;
      $data['isi'] = 'admin/rekening/list';
      
      $this->load->view('admin/layout/wrapper', $data);
      
      
   }

   
   public function tambah()
   {
     $data['title'] = 'Tambah Rekening';
     $data['isi'] = 'admin/rekening/tambah';
      
     $this->form_validation->set_rules('nama_bank', 'Nama Rekening', 'required');
     $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required|is_unique[rekening.nomor_rekening]');
     $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');

      
		if($this->form_validation->run()  == false) {

         $this->load->view('admin/layout/wrapper', $data);

      }  
      
      else {
         
         $this->rekening_model->tambahRekening();
         $this->session->set_flashdata('flash', 'Ditambahkan');
         redirect('admin/rekening');
      }
      
   }

   public function delete($id)
   {
      $this->rekening_model->hapusdata($id);
      $this->session->set_flashdata('flash', 'Dihapus');
      redirect('admin/rekening');
   }

   public function edit($id)
   {
      $data['title'] = 'Edit Rekening';
      $data['isi'] = 'admin/rekening/ubah';
      $data['rekening'] = $this->rekening_model->listingbyid($id);
      
      
      $this->form_validation->set_rules('nama_bank', 'Nama Rekening', 'required');
      $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required|is_unique[rekening.nomor_rekening]');
      $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
    ;
      

		if($this->form_validation->run()  == false) {

         $this->load->view('admin/layout/wrapper', $data);

      } 

      else {
         $this->rekening_model->ubahRekening();
         $this->session->set_flashdata('flash', 'Diubah');
         redirect('admin/rekening');
      }
      
   }





}


