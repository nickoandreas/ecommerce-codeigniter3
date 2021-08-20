<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

   
   
   public function total_produk()
   {
      $this->db->select('COUNT(*) AS total');
      return $this->db->get('produk')->row_array();
   }

   public function total_pelanggan()
   {
      $this->db->select('COUNT(*) AS total');
      return $this->db->get('pelanggan')->row_array();
   }

   public function total_header_transaksi()
   {
      $this->db->select('COUNT(*) AS total');
      $this->db->where('status_bayar', 'Pesanan Sudah Diterima');
      return $this->db->get('header_transaksi')->row_array();
   }

   public function omset()
   {  
     $this->db->select_sum('jumlah_transaksi');
     $this->db->where('status_bayar', 'Pesanan Sudah Diterima');
     return $this->db->get('header_transaksi')->row_array();
   }



}


