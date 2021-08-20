<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

   private $table = 'produk';

   public function listing()
   {
      $this->db->select('produk.*,
                        kategori.nama_kategori,
                        COUNT(gambar.id_gambar) AS total_gambar');

      $this->db->from($this->table);
      $this->db->order_by('tanggal_post', 'DESC');
      $this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
      $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
      $this->db->where('produk.status_produk', 'Publish');
      $this->db->group_by('produk.id_produk');
      return $this->db->get()->result_array();

    
   }

   public function home()
   {
      $kondisi = ['harga_diskon >' => '0', 'tanggal_mulai_diskon <=' => date('Y-m-d'), 'tanggal_akhir_diskon >=' => date('Y-m-d')];
      $this->db->where($kondisi);
      $this->db->limit(20);
      return $this->db->get('produk')->result_array();  

   }

   public function read($slug_produk)
   {
      $this->db->from($this->table);
      $this->db->where('produk.slug_produk', $slug_produk);
      return $this->db->get()->row_array();  
   }

   public function total_produkR2()
   {
      $this->db->select('COUNT(*) AS total');
      $this->db->from('produk');
      $this->db->where('status_produk', 'Publish');
      $this->db->like('kode_produk', 'R2', 'after');
      return $this->db->get()->row_array();
   }

   public function produk($limit, $start)
   {
      $this->db->where('produk.status_produk', 'Publish');
      $this->db->order_by('tanggal_post', "DESC");
      return $this->db->get($this->table, $limit, $start)->result_array();  
   }


   public function produkR2($limit, $start)
   {
      $this->db->where('status_produk', 'Publish');
      $this->db->like('kode_produk', 'R2', 'after');
      $this->db->order_by('tanggal_post', "DESC");
      return $this->db->get($this->table, $limit, $start)->result_array();  
   }

   public function produkR4($limit, $start)
   {
      $this->db->where('status_produk', 'Publish');
      $this->db->like('kode_produk', 'R4', 'after');
      $this->db->order_by('tanggal_post', "DESC");
      return $this->db->get($this->table, $limit, $start)->result_array();  
   }

   public function kategori($id_kategori, $limit, $start)
   {
      $this->db->where('status_produk', 'Publish');
      $this->db->where('id_kategori', $id_kategori);
      $this->db->order_by('tanggal_post', "DESC");
      return $this->db->get($this->table, $limit, $start)->result_array();  
   }
   
   public function total_produkR4()
   {
      $this->db->select('COUNT(*) AS total');
      $this->db->from('produk');
      $this->db->where('status_produk', 'Publish');
      $this->db->like('kode_produk', 'R4', 'after');
      return $this->db->get()->row_array();
   }

   public function total_produk()
   {
      $this->db->select('COUNT(*) AS total');
      $this->db->from('produk');
      $this->db->where('status_produk', 'Publish');
      return $this->db->get()->row_array();
   }

   public function total_kategori($id_kategori)
   {
      $this->db->select('COUNT(*) AS total');
      $this->db->from('produk');
      $this->db->where('status_produk', 'Publish');
      $this->db->where('id_kategori', $id_kategori);
      return $this->db->get()->row_array();
   }


   public function listingbyid($id)
   {
      return $this->db->get_where($this->table, ['id_produk' => $id])->row_array();
   }

   public function gambarDetail($id)
   {
      return $this->db->get_where('gambar', ['id_produk' => $id])->result_array();
   }

   public function tambahGambar($produk, $data_gambar)
   {
      $data = [ 
         
         'id_produk' => $produk['id_produk'],
         'judul_gambar' => strtoupper($this->input->post('judul_gambar', true)),
         'gambar' => $data_gambar['upload_data']['file_name']
      ];

      $this->db->insert('gambar', $data);

   }
  
   public function tambahProduk($data_gambar)
   {
      
      $slug_produk = url_title($this->input->post('nama_produk', true).'-'.$this->input->post('kode_produk', true), 'dash', true);
      
      $data = [

         "id_user"     => $this->session->userdata('id_user'),
         "id_kategori" => $this->input->post('id_kategori', true),
         "kode_produk" => $this->input->post('kode_produk', true),
         "nama_produk" => strtoupper($this->input->post('nama_produk', true)),
         "slug_produk" => $slug_produk,
         "keterangan"  => $this->input->post('keterangan', true),
         "keywords"    => $this->input->post('keywords', true),
         "harga"       => $this->input->post('harga', true),
         "harga_beli"  => $this->input->post('harga_beli', true),
         "harga_diskon" => $this->input->post('harga_diskon', true),
         "tanggal_mulai_diskon" => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_diskon', true))),
         "tanggal_akhir_diskon" => date('Y-m-d', strtotime($this->input->post('tanggal_akhir_diskon', true))),
         "stok_minimal"       => $this->input->post("stok_minimal", true),
         "stok"        => $this->input->post('stok', true),
         "gambar"      => $data_gambar['upload_data']['file_name'],
         "berat"       => $this->input->post('berat', true),
         "ukuran"      => $this->input->post('ukuran', true),
         "status_produk" => $this->input->post('status_produk', true),
         "tanggal_post" => date('Y-m-d H:i:s')
      ];	

      $this->db->insert($this->table, $data);
   }

   

   public function hapusdata($id)
   {
      $this->db->delete($this->table, ['id_produk' => $id]);
   }

   public function hapusGambar($idgambar)
   {
      $this->db->delete('gambar', ['id_gambar' => $idgambar]);
   }

   public function ubahProduk($data_gambar)
   {
      
      $slug_produk = url_title($this->input->post('nama_produk', true).'-'.$this->input->post('kode_produk', true), 'dash', true);
      
      
      $data = [

         "id_user"     => $this->session->userdata('id_user'),
         "id_kategori" => $this->input->post('id_kategori', true),
         "kode_produk" => $this->input->post('kode_produk', true),
         "nama_produk" => strtoupper($this->input->post('nama_produk', true)),
         "slug_produk" => $slug_produk,
         "keterangan"  => $this->input->post('keterangan', true),
         "keywords"    => $this->input->post('keywords', true),
         "harga"       => $this->input->post('harga', true),
         "harga_beli"  => $this->input->post('harga_beli', true),
         "harga_diskon" => $this->input->post('harga_diskon', true),
         "tanggal_mulai_diskon" => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_diskon', true))),
         "tanggal_akhir_diskon" => date('Y-m-d', strtotime($this->input->post('tanggal_akhir_diskon', true))),
         "stok_minimal"       => $this->input->post("stok_minimal", true),
         "stok"        => $this->input->post('stok', true),
         "gambar"      => $data_gambar['upload_data']['file_name'],
         "berat"       => $this->input->post('berat', true),
         "ukuran"      => $this->input->post('ukuran', true),
         "status_produk" => $this->input->post('status_produk', true),
         
      ];	

      $this->db->where('id_produk', $this->input->post('id_produk', ture) );
      $this->db->update($this->table, $data);


   }

   public function ubahDataAja()
   {
      
      $slug_produk = url_title($this->input->post('nama_produk', true).'-'.$this->input->post('kode_produk', true), 'dash', true);


         $data = [
            "id_user"     => $this->session->userdata('id_user'),
            "id_kategori" => $this->input->post('id_kategori', true),
            "kode_produk" => $this->input->post('kode_produk', true),
            "nama_produk" => strtoupper($this->input->post('nama_produk', true)),
            "slug_produk" => $slug_produk,
            "keterangan"  => $this->input->post('keterangan', true),
            "keywords"    => $this->input->post('keywords', true),
            "harga"       => $this->input->post('harga', true),
            "harga_beli"  => $this->input->post('harga_beli', true),
            "harga_diskon" => $this->input->post('harga_diskon', true),
            "tanggal_mulai_diskon" => date('Y-m-d', strtotime($this->input->post('tanggal_mulai_diskon', true))),
            "tanggal_akhir_diskon" => date('Y-m-d', strtotime($this->input->post('tanggal_akhir_diskon', true))),
            "stok_minimal"       => $this->input->post("stok_minimal", true),
            "stok"        => $this->input->post('stok', true),
            "berat"       => $this->input->post('berat', true),
            "ukuran"      => $this->input->post('ukuran', true),
            "status_produk" => $this->input->post('status_produk', true),
         ];	
   
         $this->db->where('id_produk', $this->input->post('id_produk', ture) );
         $this->db->update($this->table, $data);
   }

   // autocomplete
   public function cari_produk($keyword)
   {
      return $this->db->select('nama_produk, slug_produk, gambar')
                        ->like('nama_produk', $keyword, 'both')
                        ->limit(6)
                        ->get('produk')
                        ->result();
   }

}


