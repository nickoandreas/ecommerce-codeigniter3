<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {


   public function listing($status)
   {
      $this->db->select('header_transaksi.*,
                        pelanggan.nama_pelanggan,
                        pengiriman.*,
                        SUM(transaksi.jumlah) AS total_item');
     $this->db->from('header_transaksi');
     $this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
     $this->db->join('pengiriman', 'pengiriman.kode_transaksi = header_transaksi.kode_transaksi', 'left');
     $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
     $this->db->group_by('header_transaksi.id_header_transaksi');
     $this->db->where('header_transaksi.status_bayar', $status);
     return $this->db->get()->result_array();
    
   }

   public function kode_transaksi($kode_transaksi)
   {
      $this->db->select('header_transaksi.*,
                         pengiriman.*');
      $this->db->join('pengiriman', 'pengiriman.kode_transaksi = header_transaksi.kode_transaksi', 'left');
      $this->db->where('header_transaksi.kode_transaksi', $kode_transaksi);
      return $this->db->get('header_transaksi')->row_array();
   }


   public function tambah()
   { 
      $data = [

         'id_pelanggan'                    => $this->session->userdata('id_pelanggan'),
         'nama_pelanggan'                  => $this->session->userdata('nama_pelanggan'),
         'email'                           => $this->session->userdata('email'),
         'telepon'                         => $this->input->post('telepon', true),  
         'kode_transaksi'                  => $this->input->post('kode_transaksi', true),
         'tanggal_transaksi'               => $this->input->post('tanggal_transaksi', true),
         'jumlah_transaksi'                => $this->input->post('jumlah_transaksi', true),
         'status_bayar'                    => 'Menunggu Pembayaran',
         'tanggal_post'                    => date('Y-m-d H:i:s')
      ];	

      $this->db->insert('header_transaksi', $data);

   }

   public function update($data_gambar, $kode_transaksi)
   {  
         $data = [
            'status_bayar'          => 'Menunggu Konfirmasi Admin',
            'jumlah_bayar'          => $this->input->post('jumlah_bayar', true),
            'rekening_pembayaran'   => $this->input->post('rekening_pembayaran', true),
            'rekening_pelanggan'    => $this->input->post('rekening_pelanggan', true),
            'bukti_bayar'           => $data_gambar['bukti_bayar']['file_name'],
            'id_rekening'           => $this->input->post('id_rekening', true),
            'tanggal_bayar'         => $this->input->post('tanggal_bayar', true),
            'nama_bank'             => $this->input->post('nama_bank', true)
         ];

         $this->db->where('kode_transaksi', $kode_transaksi);
         $this->db->update('header_transaksi', $data);
   }

   public function konfirmasi_awal()
   {
      $this->db->select('header_transaksi.*,
                        pengiriman.ongkir,
                        SUM(transaksi.jumlah) AS total_item');

      $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
      $this->db->join('pengiriman', 'pengiriman.kode_transaksi = header_transaksi.kode_transaksi', 'left');
      $kondisi = ['nama_pelanggan' => $this->session->userdata('nama_pelanggan'), 'status_bayar' => 'Menunggu Pembayaran'];
      $this->db->where($kondisi);
      $this->db->order_by('tanggal_post', "DESC");
      $this->db->group_by('header_transaksi.id_header_transaksi');
      return $this->db->get('header_transaksi')->result_array();  
    
   }

   public function konfirm($kode_transaksi, $status)
   {

      $data=['status_bayar' => $status];
      $this->db->where('kode_transaksi', $kode_transaksi);
      $this->db->update('header_transaksi', $data);

   }

   public function resi($kode_transaksi)
   {
      $data = [
         'resi' => $this->input->post('resi', true),
         'tanggal_kirim' => $this->input->post('tanggal_kirim', true)
      ];
      $this->db->where('kode_transaksi', $kode_transaksi);
      $this->db->update('pengiriman', $data);
   }

   public function total_transaksi()
   {
      $this->db->select('COUNT(*) AS total');
      $this->db->from('header_transaksi');
      $this->db->where('nama_pelanggan', $this->session->userdata('nama_pelanggan'));
      return $this->db->get()->row_array();
   }

   public function transaksi($limit, $start)
   {
      $this->db->select('header_transaksi.*,
                        pengiriman.*,
                        SUM(transaksi.jumlah) AS total_item');

      $this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
      $this->db->join('pengiriman', 'pengiriman.kode_transaksi = header_transaksi.kode_transaksi', 'left'); 
      $this->db->where('nama_pelanggan', $this->session->userdata('nama_pelanggan'));
      $this->db->order_by('tanggal_post', "DESC");
      $this->db->group_by('header_transaksi.id_header_transaksi');
      return $this->db->get('header_transaksi', $limit, $start)->result_array();  

   }


   public function hapus_transaksi($kode_transaksi)
   {
      $this->db->delete('header_transaksi', ['kode_transaksi' => $kode_transaksi]);
   }


  

  
   


}


