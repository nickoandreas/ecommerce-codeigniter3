<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {


   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('kategori_model');
      $this->simple_login->cek_login();
   }
   

   public function index()
   {
      $kategori = $this->kategori_model->listing();
      

      $data['title'] = 'Kategori Produk';
      $data['kategori'] = $kategori;
      $data['isi'] = 'admin/kategori/list';
      
      $this->load->view('admin/layout/wrapper', $data);
      
      
   }

   

   public function tambah()
   {
      $data['title'] = 'Tambah Kategori Produk';
      $data['isi'] = 'admin/kategori/tambah';
      
     $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]');
   
		if($this->form_validation->run()  == false) {

         $this->load->view('admin/layout/wrapper', $data);

      }  
      
      else {
         
         $this->kategori_model->tambahKategori();
         $this->session->set_flashdata('flash', 'Ditambahkan');
         redirect('admin/kategori');
      }
      
   }

   public function delete($id)
   {
      $this->kategori_model->hapusdata($id);
      $this->session->set_flashdata('flash', 'Dihapus');
      redirect('admin/kategori');
   }

   public function edit($id)
   {
      $data['title'] = 'Edit Kategori Produk';
      $data['isi'] = 'admin/kategori/ubah';
      $data['kategori'] = $this->kategori_model->listingbyid($id);
      
      
     $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    ;
      

		if($this->form_validation->run()  == false) {

         $this->load->view('admin/layout/wrapper', $data);

      } 

      else {
         $this->kategori_model->ubahKategori();
         $this->session->set_flashdata('flash', 'Diubah');
         redirect('admin/kategori');
      }
      
   }





}


