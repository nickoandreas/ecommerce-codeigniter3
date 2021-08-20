<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

   private $table = 'kategori';

   public function listing()
   {
      
      return $this->db->get($this->table)->result_array();
    
   }

   public function listingbyid($id)
   {
      
      return $this->db->get_where($this->table, ['id_kategori' => $id])->row_array();
    
   }

   public function read($slug_kategori)
   {
      
      return $this->db->get_where($this->table, ['slug_kategori' => $slug_kategori])->row_array();
    
   }

   public function tambahKategori()
   { 
      $slugKategori = url_title($this->input->post('nama_kategori', true));
      
      $data = [

         "slug_kategori" => $slugKategori,
         "nama_kategori" => strtoupper($this->input->post('nama_kategori', true)),

      ];	

      $this->db->insert($this->table, $data);

   }

   public function hapusdata($id)
   {
      $this->db->delete($this->table, ['id_kategori' => $id]);
   }

   public function ubahKategori()
   {
     
      
      $data = [
         
         "nama_kategori" => strtoupper($this->input->post('nama_kategori', true)),

      ];	

           $this->db->where('id_kategori', $this->input->post('id_kategori'));
           $this->db->update($this->table, $data);

   }

  
   


}


