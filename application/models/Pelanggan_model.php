<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {


   public function listingbyid($email)
   {
      
      return $this->db->get_where('pelanggan', ['email' => $email])->row_array();
    
   }


   public function tambah()
   { 
      $data = [
         'nama_pelanggan'           => $this->input->post('nama_pelanggan', true),
         'email'                    => $this->input->post('email', true),
         'password'                 => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),  
         'telepon'                  => $this->input->post('telepon', true),
         'id_provinsi'              => $this->input->post('id_provinsi', true),
         'id_kota'                  => $this->input->post('id_kota', true),
         'alamat'                   => $this->input->post('alamat', true),
         'tanggal_daftar'           => date('Y-m-d H:i:s')
      ];	

      $this->db->insert('pelanggan', $data);

   }

   public function login_pelanggan($email)
   {
      return $this->db->get_where('pelanggan', ['email' => $email])->row_array();
   }

   
   public function edit($id_pelanggan)
   {
      $data = [
         'nama_pelanggan'     => $this->input->post('nama_pelanggan'),
         'telepon'            => $this->input->post('telepon'),
         'id_provinsi'        => $this->input->post('id_provinsi'),
         'id_kota'            => $this->input->post('id_kota'),
         'alamat'             => $this->input->post('alamat')
      ];

      $this->db->where('id_pelanggan', $id_pelanggan);
      $this->db->update('pelanggan', $data);
   }
   


}


