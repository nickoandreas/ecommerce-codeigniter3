<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

   private $tableUser = 'users';

   public function listing()
   {
      $this->db->order_by('nama', 'ASC');
      return $this->db->get($this->tableUser)->result_array();
    
   }

   public function listingbyid($id)
   {
      
      return $this->db->get_where($this->tableUser, ['id_user' => $id])->row_array();
    
   }

   public function loginModel($username, $password)
   {
      
      return $this->db->get_where($this->tableUser, ['username' => $username, 'password' => $password])->row_array();
    
   }


   public function tambahPengguna()
   {
      
      $data = [

         "nama" => strtoupper($this->input->post('nama', true)),
         "email" => $this->input->post('email', true),
         "username" => $this->input->post('username', true),
         "password" => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
         "akses_level" => $this->input->post('akses_level', true),

            ];	

      $this->db->insert($this->tableUser, $data);

   }

   public function hapusdata($id)
   {
      $this->db->delete($this->tableUser, ['id_user' => $id]);
   }

   public function ubahPengguna($id)
   {
      
      $data = [

         "nama" => strtoupper($this->input->post('nama', true)),
         "email" => $this->input->post('email', true),
         "akses_level" => $this->input->post('akses_level', true),

            ];	

      $this->db->where('id_user', $id);
      $this->db->update($this->tableUser, $data);


   }


}


