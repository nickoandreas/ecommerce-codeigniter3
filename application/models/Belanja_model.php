<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja_model extends CI_Model {

   public function listingByRowid($rowid)
   {
      return $this->db->get_where('keranjang', ['rowid' => $rowid])->row_array();
   }
   public function insert()
   {  
      
      $id_produk = $this->input->post('id');
      $produk_cart = $this->db->get_where('keranjang', ['id' => $id_produk, 'id_pelanggan' => $this->session->userdata('id_pelanggan')])->row_array();
      if($produk_cart) {
         $data = [
            "qty" => $produk_cart['qty']+$this->input->post('qty'),
            "subtotal" => $produk_cart['subtotal'] + ($this->input->post('price')*$this->input->post('qty'))
         ];
         $kondisi = ['id' => $id_produk, 'id_pelanggan' => $this->session->userdata('id_pelanggan')];
         $this->db->where($kondisi);
         $this->db->update('keranjang', $data);

      } else {
         $data = [
            "id" => $id_produk,
            "id_pelanggan" => $this->session->userdata('id_pelanggan'),
            "name" => $this->input->post('name'),
            "price" => $this->input->post('price'),
            "qty" => $this->input->post('qty'),
            "subtotal" => ($this->input->post('price')*$this->input->post('qty')),
         ];
   
         $this->db->insert('keranjang', $data);
      }
    
   }

   public function contents()
   {  
      $id_pelanggan = $this->session->userdata('id_pelanggan');
      return $this->db->get_where('keranjang', ['id_pelanggan' => $id_pelanggan])->result_array();
   }


   public function total()
   {
      $id_pelanggan = $this->session->userdata('id_pelanggan');
      $kondisi = ['id_pelanggan' => $id_pelanggan];
      $this->db->select_sum('subtotal');
      $this->db->where($kondisi);
      return $this->db->get('keranjang')->row_array();
   }

   public function update($rowid)
   {
      $data = [
         "qty" => $this->input->post('qty'),
         "subtotal" => ($this->input->post('price')*$this->input->post('qty'))
      ];
      
      $this->db->where('rowid', $rowid);
      $this->db->update('keranjang', $data);
   }

   public function remove($rowid)
   {
      $this->db->where('rowid', $rowid);
      $this->db->delete('keranjang');
   }
   
   public function destroy()
   {
      $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
      $this->db->delete('keranjang');
   }



}


