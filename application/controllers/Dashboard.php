<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('pelanggan_model');
      $this->load->model('header_transaksi_model');
      $this->load->model('transaksi_model');
      $this->load->model('rekening_model');
      $this->load->model('produk_model');
      $this->simple_pelanggan->cek_login();
   }

   public function index()
   {  
      $data['title'] = 'Konfirmasi Pembayaran';
      $data['isi']  = 'dashboard/list';
      $data['header_transaksi'] = $this->header_transaksi_model->konfirmasi_awal();
      $data['rekening'] = $this->rekening_model->listing();
     

      $this->load->view('layout/wrapper', $data);
      
   }   

   public function belanja()
   {
      
      $total = $this->header_transaksi_model->total_transaksi();
      // pagination
      $this->load->library('pagination');
      
      $config['base_url']           = base_url() . '/dashboard/belanja/';
      $config['total_rows']         = $total['total'];
      $config['use_page_numbers']   = TRUE;
      $config['per_page']           = 5;
      $config['uri_segment']        = 3;
      $config['num_links']          = 2;
      $config['full_tag_open']      = '<ul class="pagination">';
      $config['full_tag_close']     = '</ul>';
      $config['first_link']         = '&laquo;';
      $config['first_tag_open']     = '<li>';
      $config['first_tag_close']    = '</li>';
      $config['last_link']          = '&raquo;';
      $config['last_tag_open']      = '<li class="disabled"><li class="active">';
      $config['last_tag_close']     = '<span class="sr-only"></a></li></li>';
      $config['next_link']          = false;
      $config['next_tag_open']      = '<div>';
      $config['next_tag_close']     = '</div>';
      $config['prev_link']          = false;
      $config['prev_tag_open']      = '<div>';
      $config['prev_tag_close']     = '</div>';
      $config['cur_tag_open']       = '<b>';
      $config['cur_tag_close']      = '</b>';
      $config['first_url']          = base_url(). '/dashboard/belanja/';
      
      $this->pagination->initialize($config);
      
      $page = ($this->uri->segment(3)) ? (($this->uri->segment(3)-1)) * $config['per_page'] : 0;
      $transaksi = $this->header_transaksi_model->transaksi($config['per_page'], $page);
      
      $data['title'] = 'PesananKu';
      $data['isi']  = 'dashboard/belanja';
      $data['header_transaksi'] = $transaksi;
      $data['pagination'] = $this->pagination->create_links();

      $this->load->view('layout/wrapper', $data);
      
   }

   public function detail($kode_transaksi)
   {
      $id_pelanggan = $this->session->userdata('id_pelanggan');
      $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
      $transaksi = $this->transaksi_model->kode_transaksi($kode_transaksi);
      
      if($header_transaksi['id_pelanggan'] != $id_pelanggan) {
         redirect(base_url());
      }

      $data['title'] = 'Detail PesananKu';
      $data['isi']  = 'dashboard/detail2';
      $data['header_transaksi'] = $header_transaksi;
      $data['transaksi'] = $transaksi;

      $this->load->view('layout/wrapper', $data);
   }

   public function profile()
   {
      $email = $this->session->userdata('email');
      $pelanggan = $this->pelanggan_model->listingbyid($email);
      $this->load->model('rajaongkir_model');

      $this->form_validation->set_rules('nama_pelanggan', 'Nama', 'required');
      $this->form_validation->set_rules('id_provinsi', 'Provinsi', 'required');
      $this->form_validation->set_rules('id_kota', 'Kabupaten/Kota', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('telepon', 'No HP', 'required');
      

		if($this->form_validation->run()  == false) {

         $data['title'] = 'Profile';
         $data['isi']  = 'dashboard/profile';
         $data['pelanggan'] = $pelanggan;
         $data['provinsi'] = $this->rajaongkir_model->provinsi();
   
         $this->load->view('layout/wrapper', $data);

      }
      else {
         
         $this->pelanggan_model->edit($this->session->userdata('id_pelanggan'));
         $this->session->set_flashdata('sukses_update', 'Data Berhasil di Ubah');
         redirect('dashboard/profile');
      }

   }



   public function konfirmasi($kode_transaksi)
   {     
         $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
         $id_pelanggan = $this->session->userdata('id_pelanggan');
         
         if($header_transaksi['id_pelanggan'] != $id_pelanggan) {
            redirect(base_url());
         }

         $config['upload_path']    = './assets/upload/image/bukti_pembayaran/';
         $config['allowed_types']  = 'gif|jpg|png|jpeg';
         $config['max_size']       = '2400';
         $config['max_width']      = '5060';
         $config['max_height']     = '5060';
         $this->load->library('upload', $config);

         if ( !$this->upload->do_upload('bukti_bayar')){

            $this->session->set_flashdata('upload_gagal', 'Maaf Bukti Pembayaran Tidak Bisa Di Upload, Konfirmasi Gagal');
            redirect('dashboard');

         } 
         
         else{ 

            $data_gambar = ['bukti_bayar' => $this->upload->data()];
            
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/upload/image/bukti_pembayaran/'.$data_gambar['bukti_bayar']['file_name'];
            $config['new_image'] = './assets/upload/image/thumbs/bukti_pembayaran/';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 250;
            $config['height']       = 250;
            $config['thumb_marker'] = '';
   
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            
            $this->header_transaksi_model->update($data_gambar, $kode_transaksi);
            $this->session->set_flashdata('flash', 'Konfirmasi Pembayaran Berhasil');
            redirect('dashboard');

         }
      

      }
      
      public function hapus($kode_transaksi)
      {  
         $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
         $id_pelanggan = $this->session->userdata('id_pelanggan');
         
         if($header_transaksi['id_pelanggan'] != $id_pelanggan) {
            redirect(base_url());
         }

         $this->transaksi_model->hapus_transaksi($kode_transaksi);
         $this->header_transaksi_model->hapus_transaksi($kode_transaksi);
         $this->load->model('rajaongkir_model');
         $this->rajaongkir_model->hapus_pengiriman($kode_transaksi);
         
         redirect('dashboard');
      }
      
   

   
   

}