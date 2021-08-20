<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

   private $table = "konfigurasi";

   public function listing()
   {
      return $this->db->get($this->table)->row_array();
   }


   public function editdetailweb()
   {
      $update = [ 
         'namaweb' => $this->input->post('namaweb', true),
         'tagline' => $this->input->post('tagline', true),
         'email' => $this->input->post('email', true),
         'website' => $this->input->post('website', true),
         'keywords'=> $this->input->post('keywords', true),
         'metatext'=> $this->input->post('metatext', true), 
         'telepon' => $this->input->post('telepon', true),
         'alamat'  => $this->input->post('alamat', true),
         'facebook'=> $this->input->post('facebook', true),
         'instagram' => $this->input->post('instagram', true),
         'deskripsi' => $this->input->post('deskripsi', true),
         'rekening_pembayaran' => $this->input->post('rekening_pembayaran', true)];

      $this->db->where('id_konfigurasi', $this->input->post('id_konfigurasi', true));
      $this->db->update($this->table, $update);
   }

   public function editlogo($data_gambar)
   {
      $data = [
            'namaweb' => $this->input->post('namaweb', true),
            'logo' => $data_gambar['upload_data']['file_name']

      ];

      $this->db->where('id_konfigurasi', $this->input->post('id_konfigurasi', true));
      $this->db->update($this->table, $data);

   }

   public function editicon($data_gambar)
   {
      $data = [
            'namaweb' => $this->input->post('namaweb', true),
            'icon' => $data_gambar['upload_data']['file_name']

      ];

      $this->db->where('id_konfigurasi', $this->input->post('id_konfigurasi', true));
      $this->db->update($this->table, $data);

   }

   public function editdataaja()
   {
      $data = ['namaweb' => $this->input->post('namaweb', true)];

      $this->db->where('id_konfigurasi', $this->input->post('id_konfigurasi', true));
      $this->db->update($this->table, $data);
   }

   public function kategoriR2()
   {
      $this->db->select('kategori.nama_kategori,
                        kategori.slug_kategori');
      $this->db->like('nama_kategori', 'R2');
      $this->db->order_by('nama_kategori', 'ASC');
      return $this->db->get('kategori')->result_array();
   }

   public function kategoriR4()
   {
      $this->db->select('kategori.nama_kategori,
                        kategori.slug_kategori');
      $this->db->like('nama_kategori', 'R4');
      $this->db->order_by('nama_kategori', 'ASC');
      return $this->db->get('kategori')->result_array();
   }

   // public function nav_produk()
   // {
   //    $this->db->select('produk.*,
   //                      kategori.nama_kategori,
   //                      kategori.slug_kategori');

   //    $this->db->from('produk');
   //    $this->db->like('nama_kategori', 'R2');
   //    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
   //    $this->db->group_by('produk.id_kategori');
   //    $this->db->order_by('kategori.nama_kategori', 'ASC');
   //    return $this->db->get()->result_array();
   // }

   // public function nav_produkR4()
   // {
   //    $this->db->select('produk.*,
   //                      kategori.nama_kategori,
   //                      kategori.slug_kategori');

   //    $this->db->from('produk');
   //    $this->db->like('nama_kategori', 'R4');
   //    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
   //    $this->db->group_by('produk.id_kategori');
   //    $this->db->order_by('kategori.nama_kategori', 'ASC');
   //    return $this->db->get()->result_array();
   // }

   


}


