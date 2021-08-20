<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {


   public function tambah($keranjang)
   { 
      foreach($keranjang as $keranjang) {
      $data = [

         'id_pelanggan'       => $this->session->userdata('id_pelanggan'),
         'kode_transaksi'     => $this->input->post('kode_transaksi'),
         'id_produk'          => $keranjang['id'],
         'harga'              => $keranjang['price'],
         'jumlah'             => $keranjang['qty'],
         'total_harga'        => $keranjang['subtotal'], 
         'tanggal_transaksi'  => $this->input->post('tanggal_transaksi', true)
      ];	
      
      $this->db->insert('transaksi', $data);
      }
   }


   public function kode_transaksi($kode_transaksi)
   {
      $this->db->select('transaksi.*,
                         produk.*');

      $this->db->from('transaksi');
      $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'right');
      $this->db->where('kode_transaksi', $kode_transaksi);
      return $this->db->get()->result_array();
   }

   public function hapus_transaksi($kode_transaksi)
   {
      $this->db->delete('transaksi', ['kode_transaksi' => $kode_transaksi]);
   }

 
}


