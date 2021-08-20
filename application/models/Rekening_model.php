<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {

   private $table = 'rekening';

   public function listing()
   {
      
      return $this->db->get($this->table)->result_array();
    
   }

   public function listingbyid($id)
   {
      
      return $this->db->get_where($this->table, ['id_rekening' => $id])->row_array();
    
   }


   public function tambahRekening()
   { 
      
      $data = [

         "nama_bank" => strtoupper($this->input->post('nama_bank', true)),
         "nomor_rekening" => $this->input->post('nomor_rekening', true),
         "nama_pemilik" => strtoupper($this->input->post('nama_pemilik', true))

      ];	

      $this->db->insert($this->table, $data);

   }

   public function hapusdata($id)
   {
      $this->db->delete($this->table, ['id_rekening' => $id]);
   }

   public function ubahRekening()
   {
     
      
      $data = [
         
         "nama_bank" => strtoupper($this->input->post('nama_bank', true)),
         "nomor_rekening" => $this->input->post('nomor_rekening', true),
         "nama_pemilik" => strtoupper($this->input->post('nama_pemilik', true))

      ];	

      $this->db->where('id_rekening', $this->input->post('id_rekening'));
      $this->db->update($this->table, $data);

   }

   


}


