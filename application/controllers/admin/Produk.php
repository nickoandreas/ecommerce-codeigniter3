<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {


   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('produk_model'); 
      $this->load->model('kategori_model');
      $this->simple_login->cek_login();
   }
   

   public function index()
   {
      $produk = $this->produk_model->listing();
      
      $data['title'] = 'Data Produk';
      $data['produk'] = $produk;
      $data['isi'] = 'admin/produk/list';
      
      $this->load->view('admin/layout/wrapper', $data);
      
    
   }

   public function gambar($id)
   {
      $produk = $this->produk_model->listingbyid($id);
      $gambarProduk = $this->produk_model->gambarDetail($id);
      $data['title'] = 'Tambah Gambar Produk';
      $data['isi'] = 'admin/produk/gambar';
      $data['produk'] = $produk;
      $data['dataGambar'] = $gambarProduk;
      $data['id'] = $id;

      
     $this->form_validation->set_rules('judul_gambar', 'Judul/Nama Produk', 'required');
     
      // jika form_validation true
		if($this->form_validation->run()) { 

          // Konfigurasi Upload (rules upload)
         $config['upload_path']    = './assets/upload/image/';
         $config['allowed_types']  = 'gif|jpg|png|jpeg';
         $config['max_size']       = '2400';
         $config['max_width']      = '5060';
         $config['max_height']     = '5060';
         $this->load->library('upload', $config);
         
         // jika rules upload gagal
         if ( ! $this->upload->do_upload('gambar')){
         
        
         $data['error'] = $this->upload->display_errors();
         $this->load->view('admin/layout/wrapper', $data);

       }  
      
      else {
         // jika rules upload terpenuhi
         $data_gambar = ['upload_data' => $this->upload->data()];
     
         // thumbnail gambar
         $config['image_library'] = 'gd2';
         $config['source_image'] = './assets/upload/image/'.$data_gambar['upload_data']['file_name'];
         $config['new_image'] = './assets/upload/image/thumbs/';
         $config['create_thumb'] = TRUE;
         $config['maintain_ratio'] = TRUE;
         $config['width']         = 250;
         $config['height']       = 250;
         $config['thumb_marker'] = '';

         $this->load->library('image_lib', $config);
         $this->image_lib->resize();
         
         $this->produk_model->tambahGambar($produk, $data_gambar);
         $this->session->set_flashdata('flash', 'Ditambahkan');
        
         redirect("admin/produk/gambar/".$id);
      } 

    }
      // jika form_validation false (load awal)
     
      $this->load->view('admin/layout/wrapper', $data);

      
   }

   public function deleteGbr($idproduk, $idgambar)
   {
      $gambar = $this->produk_model->gambarDetail($idgambar);
      unlink('./assets/upload/image/' . $gambar['gambar']);
      unlink('./assets/upload/image/thumbs/' . $gambar['gambar']);
      $this->produk_model->hapusGambar($idgambar);
      $this->session->set_flashdata('flash', 'Dihapus');
      redirect('admin/produk/gambar/'.$idproduk);
   }


   public function tambah()
   {
     $kategori = $this->kategori_model->listing();
     $data['title'] = 'Tambah Produk';
     $data['isi'] = 'admin/produk/tambah';
     $data['kategori'] = $kategori;
      
     $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
     $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[produk.kode_produk]');
     
      // jika form_validation true
		if($this->form_validation->run()) { 

          // Konfigurasi Upload (rules upload)
         $config['upload_path']    = './assets/upload/image/';
         $config['allowed_types']  = 'gif|jpg|png|jpeg';
         $config['max_size']       = '2400';
         $config['max_width']      = '5060';
         $config['max_height']     = '5060';
         $this->load->library('upload', $config);
         
         // jika rules upload gagal
         if ( ! $this->upload->do_upload('gambar')){
         
        
         $data['error'] = $this->upload->display_errors();

         $this->load->view('admin/layout/wrapper', $data);

       }  
      
      else {
         // jika rules upload terpenuhi
         $data_gambar = ['upload_data' => $this->upload->data()];
         
         // thumbnail gambar
         $config['image_library'] = 'gd2';
         $config['source_image'] = './assets/upload/image/'.$data_gambar['upload_data']['file_name'];
         $config['new_image'] = './assets/upload/image/thumbs/';
         $config['create_thumb'] = TRUE;
         $config['maintain_ratio'] = TRUE;
         $config['width']         = 250;
         $config['height']       = 250;
         $config['thumb_marker'] = '';

         $this->load->library('image_lib', $config);
         $this->image_lib->resize();
         
         
         $this->produk_model->tambahProduk($data_gambar);
      
         $this->session->set_flashdata('flash', 'Ditambahkan');
        
         redirect('admin/produk');
      } 

    }
      // jika form_validation false (load awal)
      $this->load->view('admin/layout/wrapper', $data);

   }

   public function delete($id)
   {  
      $produk = $this->produk_model->listingbyid($id);
      unlink('./assets/upload/image/' . $produk['gambar']);
      unlink('./assets/upload/image/thumbs/' . $produk['gambar']);
      $this->produk_model->hapusdata($id);
      $this->session->set_flashdata('flash', 'Dihapus');
      redirect('admin/produk');
   }

   public function edit($id)
   {  
      $produk = $this->produk_model->listingbyid($id);
      $data['title'] = 'Edit Produk';
      $data['isi'] = 'admin/produk/ubah';
      $data['kategori'] = $this->kategori_model->listing();
      $data['produk'] = $produk;

      $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
      $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required');


      if($this->form_validation->run() ) {

         // edit ganti gambar
         if(!empty($_FILES['gambar']['name'])) {   

            $config['upload_path']    = './assets/upload/image/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = '2400';
            $config['max_width']      = '5060';
            $config['max_height']     = '5060';
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar')){
         
               $data['error'] = $this->upload->display_errors();
               $this->load->view('admin/layout/wrapper', $data);
      
             }  
             else {
               $data_gambar = ['upload_data' => $this->upload->data()];
            
               $config['image_library'] = 'gd2';
               $config['source_image'] = './assets/upload/image/'.$data_gambar['upload_data']['file_name'];
               $config['new_image'] = './assets/upload/image/thumbs/';
               $config['create_thumb'] = TRUE;
               $config['maintain_ratio'] = TRUE;
               $config['width']         = 250;
               $config['height']       = 250;
               $config['thumb_marker'] = '';
      
               $this->load->library('image_lib', $config);
               $this->image_lib->resize();
               
               
               $this->produk_model->ubahProduk($data_gambar);
               $this->session->set_flashdata('flash', 'Diubah');
               unlink('./assets/upload/image/'. $produk['gambar']);
               unlink('./assets/upload/image/thumbs/'. $produk['gambar']);
               redirect('admin/produk');
            }

         }  
             // edit tanpa ganti gambar
         else {
            $this->produk_model->ubahDataAja();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/produk');
            }
      } 
      // load pertama
      $this->load->view('admin/layout/wrapper', $data);

   }





}


