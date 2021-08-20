<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {

   protected  $CI;

   public function __construct()
   {
      $this->CI =& get_instance();
      $this->CI->load->model('user_model');
      $this->CI->load->model('userapi_model');
   }

   public function login($username, $password)
   {    
      $check = $this->CI->userapi_model->login($username);
      if($check) {
      $password_verify = $check['password'];
      $verifikasi = password_verify($password, $password_verify);
      if($verifikasi == TRUE){
         $id_user        = $check['id_user'];
         $nama           = $check['nama'];
         $akses_level    = $check['akses_level'];

         $this->CI->session->set_userdata('id_user', $id_user);
         $this->CI->session->set_userdata('nama', $nama);
         $this->CI->session->set_userdata('username', $username);
         $this->CI->session->set_userdata('akses_level', $akses_level);
         redirect(base_url('admin/dashboard'), 'refresh');
         
      }  else {
          $this->CI->session->set_flashdata('warning', 'Username Atau Password Anda Salah');
          redirect(base_url('login'), 'refresh');
       }

      } else {
         $this->CI->session->set_flashdata('warning', 'Username Atau Password Anda Salah');
         redirect(base_url('login'), 'refresh');
      }
   }

   public function cek_login()
   {
         if($this->CI->session->userdata('username') == "") {

           $this->CI->session->set_flashdata('warning', 'Anda Belum Masuk');
           redirect(base_url('login'));
            
         }
         
   }

   public function logout()
   {
      $this->CI->session->unset_userdata('id_user');
      $this->CI->session->unset_userdata('nama');
      $this->CI->session->unset_userdata('username');
      $this->CI->session->unset_userdata('akses_level');
      $this->CI->session->set_flashdata('sukses', 'Anda Berhasil Keluar');
      redirect(base_url('login'), 'refresh');

   }




}
