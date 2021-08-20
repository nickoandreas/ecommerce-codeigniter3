<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_Pelanggan {

   protected  $CI;

   public function __construct()
   {
      $this->CI =& get_instance();
      $this->CI->load->model('pelanggan_model');
   }

   public function login($email, $password)
   {
      $check = $this->CI->pelanggan_model->login_pelanggan($email);
      if($check){
         $pasword_verify = $check['password'];
         $verifikasi = password_verify($password, $pasword_verify);
         if($verifikasi == TRUE) {
         $id_pelanggan    = $check['id_pelanggan'];
         $nama_pelanggan  = $check['nama_pelanggan'];

         $this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
         $this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
         $this->CI->session->set_userdata('email', $email);
      
         redirect(base_url());

         } else {
             $this->CI->session->set_flashdata('warning', 'Email Atau Password Anda Salah');
             redirect(base_url('masuk'));
         }

      }  else {
          $this->CI->session->set_flashdata('warning', 'Email Atau Password Anda Salah');
          redirect(base_url('masuk'));
       }
   }

   public function cek_login()
   {
         if($this->CI->session->userdata('email') == "") {

           $this->CI->session->set_flashdata('warning', 'Anda Belum Login');
           redirect(base_url('masuk'));
            
         }
         
   }

   public function belum_masuk()
   {
      if($this->CI->session->userdata('email') ==  "") {
         redirect(base_url());
         
      }
         
   }

   public function sudah_masuk()
   {
      if($this->CI->session->userdata('email') && $this->CI->session->userdata('nama_pelanggan') != '' ) {
         redirect(base_url());
      }
         
   }

   public function sudah_checkout()
   {
      if($this->CI->session->userdata('kode_transaksi')  == '' ) {
         redirect(base_url());
         
      }
         
   }

   
   public function logout()
   {
      $this->CI->session->unset_userdata('id_pelanggan');
      $this->CI->session->unset_userdata('nama_pelanggan');
      $this->CI->session->unset_userdata('email');
      redirect(base_url(), 'refresh');
   }




}
