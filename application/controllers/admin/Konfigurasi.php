<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('konfigurasi_model');
      $this->simple_login->cek_login();
      
   }
   
   
   public function index()
   {
      $konfigurasi = $this->konfigurasi_model->listing();

      $data["title"] = "Konfigurasi Website";
      $data['konfigurasi'] = $konfigurasi;
      $data["isi"] = "admin/konfigurasi/list";

      $this->form_validation->set_rules("namaweb", "Nama Website", "required");

      if ($this->form_validation->run() === FALSE) {


      $this->load->view("admin/layout/wrapper", $data);

      }
      else {

         $this->konfigurasi_model->editdetailweb();
         $this->session->set_flashdata('flash', 'Di Update');
         redirect(base_url("admin/konfigurasi"));

      }

   }
      

   public function icon()
   {
      $konfigurasi = $this->konfigurasi_model->listing();
      $data['title'] = 'Setting Icon Website';
      $data['konfigurasi'] = $konfigurasi;
      $data['isi'] = 'admin/konfigurasi/icon';


      $this->form_validation->set_rules('namaweb', 'Nama Website', 'required');
   
      if($this->form_validation->run()) {

         // edit ganti gambar
         if(!empty($_FILES['icon']['name'])) {

            $config['upload_path']    = './assets/upload/image/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = '5000';
            $config['max_width']      = '6000';
            $config['max_height']     = '6000';
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('icon')){
         
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
               
               $this->konfigurasi_model->editicon($data_gambar);
               $this->session->set_flashdata('flash', 'Di Update');
               unlink('./assets/upload/image/'. $konfigurasi['icon']);
               unlink('./assets/upload/image/thumbs/'. $konfigurasi['icon']);
               redirect('admin/konfigurasi/icon');
            }

         }  
             // edit tanpa ganti gambar
         else {
            $this->konfigurasi_model->editdataaja();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/konfigurasi/icon');
            }
      } 

            // load pertama
            $this->load->view('admin/layout/wrapper', $data);

   }

   public function logo()
   {
      $konfigurasi = $this->konfigurasi_model->listing();
      $data['title'] = 'Setting Logo Website';
      $data['konfigurasi'] = $konfigurasi;
      $data['isi'] = 'admin/konfigurasi/logo';


      $this->form_validation->set_rules('namaweb', 'Nama Website', 'required');
   
      if($this->form_validation->run()) {

         // edit ganti gambar
         if(!empty($_FILES['logo']['name'])) {

            $config['upload_path']    = './assets/upload/image/';
            $config['allowed_types']  = 'gif|jpg|png|jpeg';
            $config['max_size']       = '6000';
            $config['max_width']      = '6000';
            $config['max_height']     = '6000';
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('logo')){
         
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
               
               
               $this->konfigurasi_model->editlogo($data_gambar);
               $this->session->set_flashdata('flash', 'Di Update');
               unlink('./assets/upload/image/'. $konfigurasi['logo']);
               unlink('./assets/upload/image/thumbs/'. $konfigurasi['logo']);
               redirect('admin/konfigurasi/logo');
            }

         }  
             // edit tanpa ganti gambar
         else {
            $this->konfigurasi_model->editdataaja();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/konfigurasi/logo');
            }
      } 

            // load pertama
            $this->load->view('admin/layout/wrapper', $data);


   }


   

}


