<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

   
   public function __construct()
   {
      parent::__construct();
      $this->load->model( 'produk_model');
      $this->load->model('kategori_model');
   }
   

   public function index()
   {
      $konfigurasi = $this->konfigurasi_model->listing();
      $total = $this->produk_model->total_produk();
      // pagination
      $this->load->library('pagination');
      
      $config['base_url']           = base_url() . '/produk/index';
      $config['total_rows']         = $total['total'];
      $config['use_page_numbers']   = TRUE;
      $config['per_page']           = 9;
      $config['uri_segment']        = 3;
      $config['num_links']          = 2;
      $config['full_tag_open']      = '<ul class="pagination">';
      $config['full_tag_close']     = '</ul>';
      $config['first_link']         = '&laquo;';
      $config['first_tag_open']     = '<li>';
      $config['first_tag_close']    = '</li>';
      $config['last_link']          = '&raquo;';
      $config['last_tag_open']      = '<li class="disabled"><li class="active">';
      $config['last_tag_close']     = '<span class="sr-only"></li></li>';
      $config['next_link']          = false;
      $config['next_tag_open']      = '<div>';
      $config['next_tag_close']     = '</div>';
      $config['prev_link']          = false;
      $config['prev_tag_open']      = '<div>';
      $config['prev_tag_close']     = '</div>';
      $config['cur_tag_open']       = '<b>';
      $config['cur_tag_close']      = '</b>';
      $config['first_url']          = base_url(). '/produk';
      
      $this->pagination->initialize($config);
      
      $page = ($this->uri->segment(3)) ? (($this->uri->segment(3)-1)) * $config['per_page'] : 0;
      $produk = $this->produk_model->produk($config['per_page'], $page);
      

      $data['title'] = 'Semua Produk';
      $data['isi'] = 'produk/list';
      $data['produk'] = $produk;
      $data['listing_kategorir2'] = $this->konfigurasi_model->kategoriR2();
      $data['listing_kategorir4'] = $this->konfigurasi_model->kategoriR4();
      $data['pagination'] = $this->pagination->create_links();
      $data['konfigurasi'] = $konfigurasi;

      $this->load->view('layout/wrapper', $data);
   }

   public function parts_motor()
   {
      $konfigurasi = $this->konfigurasi_model->listing();
      $total = $this->produk_model->total_produkR2();
      // pagination
      $this->load->library('pagination');
      
      $config['base_url']           = base_url() . '/produk/parts_motor';
      $config['total_rows']         = $total['total'];
      $config['use_page_numbers']   = TRUE;
      $config['per_page']           = 9;
      $config['uri_segment']        = 3;
      $config['num_links']          = 2;
      $config['full_tag_open']      = '<ul class="pagination">';
      $config['full_tag_close']     = '</ul>';
      $config['first_link']         = '&laquo;';
      $config['first_tag_open']     = '<li>';
      $config['first_tag_close']    = '</li>';
      $config['last_link']          = '&raquo';
      $config['last_tag_open']      = '<li class="disabled"><li class="active">';
      $config['last_tag_close']     = '<span class="sr-only"></a></li></li>';
      $config['next_link']          = false;
      $config['next_tag_open']      = '<div>';
      $config['next_tag_close']     = '</div>';
      $config['prev_link']          = false;
      $config['prev_tag_open']      = '<div>';
      $config['prev_tag_close']     = '</div>';
      $config['cur_tag_open']       = '<b>';
      $config['cur_tag_close']      = '</b>';
      $config['first_url']          = base_url(). '/produk/parts_motor';
      
      $this->pagination->initialize($config);
      
      $page = ($this->uri->segment(3)) ? (($this->uri->segment(3)-1)) * $config['per_page'] : 0;
      $produk = $this->produk_model->produkR2($config['per_page'], $page);
      

      $data['title'] = 'Parts Motor';
      $data['isi'] = 'produk/list';
      $data['produk'] = $produk;
      $data['listing_kategorir2'] = $this->konfigurasi_model->kategoriR2();
      $data['listing_kategorir4'] = $this->konfigurasi_model->kategoriR4();
      $data['pagination'] = $this->pagination->create_links();
      $data['konfigurasi'] = $konfigurasi;

      $this->load->view('layout/wrapper', $data);

   }

   public function parts_mobil()
   {
      $konfigurasi = $this->konfigurasi_model->listing();
      $total = $this->produk_model->total_produkR4();
      // pagination
      $this->load->library('pagination');
      
      $config['base_url']           = base_url() . '/produk/parts_mobil';
      $config['total_rows']         = $total['total'];
      $config['use_page_numbers']   = TRUE;
      $config['per_page']           = 9;
      $config['uri_segment']        = 3;
      $config['num_links']          = 2;
      $config['full_tag_open']      = '<ul class="pagination">';
      $config['full_tag_close']     = '</ul>';
      $config['first_link']         = '&laquo;';
      $config['first_tag_open']     = '<li>';
      $config['first_tag_close']    = '</li>';
      $config['last_link']          = '&raquo;';
      $config['last_tag_open']      = '<li class="disabled"><li class="active">';
      $config['last_tag_close']     = '<span class="sr-only"></a></li></li>';
      $config['next_link']          = false;
      $config['next_tag_open']      = '<div>';
      $config['next_tag_close']     = '</div>';
      $config['prev_link']          = false;
      $config['prev_tag_open']      = '<div>';
      $config['prev_tag_close']     = '</div>';
      $config['cur_tag_open']       = '<b>';
      $config['cur_tag_close']      = '</b>';
      $config['first_url']          = base_url(). '/produk/parts_mobil';
      
      $this->pagination->initialize($config);
      
      $page = ($this->uri->segment(3)) ? (($this->uri->segment(3)-1)) * $config['per_page'] : 0;
      $produk = $this->produk_model->produkR4($config['per_page'], $page);
      

      $data['title'] = 'Parts Mobil';
      $data['isi'] = 'produk/list';
      $data['produk'] = $produk;
      $data['listing_kategorir2'] = $this->konfigurasi_model->kategoriR2();
      $data['listing_kategorir4'] = $this->konfigurasi_model->kategoriR4();
      $data['pagination'] = $this->pagination->create_links();
      $data['konfigurasi'] = $konfigurasi;

      $this->load->view('layout/wrapper', $data);

   }

   
   public function detail($slug_produk)
   {  
      $produk = $this->produk_model->read($slug_produk);
      $id_produk = $produk['id_produk'];
      
      $data['title'] = $produk['nama_produk'];
      $data['produk'] = $produk;
      $data['isi'] = 'produk/detail';
      $data['produk_related'] = $this->produk_model->home();
      $data['gambar'] = $this->produk_model->gambarDetail($id_produk);

      $this->load->view('layout/wrapper', $data);

   }

   public function kategorir2($slug_kategori)
   {  
      $kategori  = $this->kategori_model->read($slug_kategori);
      $id_kategori = $kategori['id_kategori'];
      $konfigurasi = $this->konfigurasi_model->listing();
      $total = $this->produk_model->total_kategori($id_kategori);
      // pagination
      $this->load->library('pagination');
      
      $config['base_url']           = base_url() . '/produk/kategorir2/'.$slug_kategori;
      $config['total_rows']         = $total['total'];
      $config['use_page_numbers']   = TRUE;
      $config['per_page']           = 9;
      $config['uri_segment']        = 4;
      $config['num_links']          = 2;
      $config['full_tag_open']      = '<ul class="pagination">';
      $config['full_tag_close']     = '</ul>';
      $config['first_link']         = '&laquo;';
      $config['first_tag_open']     = '<li>';
      $config['first_tag_close']    = '</li>';
      $config['last_link']          = '&raquo;';
      $config['last_tag_open']      = '<li class="disabled"><li class="active">';
      $config['last_tag_close']     = '<span class="sr-only"></a></li></li>';
      $config['next_link']          = false;
      $config['next_tag_open']      = '<div>';
      $config['next_tag_close']     = '</div>';
      $config['prev_link']          = false;
      $config['prev_tag_open']      = '<div>';
      $config['prev_tag_close']     = '</div>';
      $config['cur_tag_open']       = '<b>';
      $config['cur_tag_close']      = '</b>';
      $config['first_url']          = base_url(). '/produk/kategorir2/'.$slug_kategori;
      
      $this->pagination->initialize($config);
      
      $page = ($this->uri->segment(4)) ? (($this->uri->segment(4)-1)) * $config['per_page'] : 0;
      $produk = $this->produk_model->kategori($id_kategori, $config['per_page'], $page);
      
      $data['title'] = 'Parts Motor';
      $data['kategori'] = $kategori['nama_kategori'];
      $data['isi'] = 'produk/list';
      $data['produk'] = $produk;
      $data['listing_kategorir2'] = $this->konfigurasi_model->kategoriR2();
      $data['listing_kategorir4'] = $this->konfigurasi_model->kategoriR4();
      $data['pagination'] = $this->pagination->create_links();
      $data['konfigurasi'] = $konfigurasi;

      $this->load->view('layout/wrapper', $data);
   }

   public function kategorir4($slug_kategori)
   {  
      $kategori  = $this->kategori_model->read($slug_kategori);
      $id_kategori = $kategori['id_kategori'];
      $konfigurasi = $this->konfigurasi_model->listing();
      $total = $this->produk_model->total_kategori($id_kategori);
      // pagination
      $this->load->library('pagination');
      
      $config['base_url']           = base_url() . '/produk/kategorir4/'.$slug_kategori;
      $config['total_rows']         = $total['total'];
      $config['use_page_numbers']   = TRUE;
      $config['per_page']           = 9;
      $config['uri_segment']        = 4;
      $config['num_links']          = 2;
      $config['full_tag_open']      = '<ul class="pagination">';
      $config['full_tag_close']     = '</ul>';
      $config['first_link']         = '&laquo;';
      $config['first_tag_open']     = '<li>';
      $config['first_tag_close']    = '</li>';
      $config['last_link']          = '&raquo;';
      $config['last_tag_open']      = '<li class="disabled"><li class="active">';
      $config['last_tag_close']     = '<span class="sr-only"></a></li></li>';
      $config['next_link']          = false;
      $config['next_tag_open']      = '<div>';
      $config['next_tag_close']     = '</div>';
      $config['prev_link']          = false;
      $config['prev_tag_open']      = '<div>';
      $config['prev_tag_close']     = '</div>';
      $config['cur_tag_open']       = '<b>';
      $config['cur_tag_close']      = '</b>';
      $config['first_url']          = base_url(). '/produk/kategorir4/'.$slug_kategori;
      
      $this->pagination->initialize($config);
      
      $page = ($this->uri->segment(4)) ? (($this->uri->segment(4)-1)) * $config['per_page'] : 0;
      $produk = $this->produk_model->kategori($id_kategori, $config['per_page'], $page);
      
      $data['title'] = 'Parts Mobil';
      $data['kategori'] = $kategori['nama_kategori'];
      $data['isi'] = 'produk/list';
      $data['produk'] = $produk;
      $data['listing_kategorir2'] = $this->konfigurasi_model->kategoriR2();
      $data['listing_kategorir4'] = $this->konfigurasi_model->kategoriR4();
      $data['pagination'] = $this->pagination->create_links();
      $data['konfigurasi'] = $konfigurasi;

      $this->load->view('layout/wrapper', $data);
   }

  
   // autocomplete
   public function get_produk($keyword)
   {  
      if(urldecode($keyword) == 'tidak ada') {
         echo '<p class="d-none"></p>';
         die;
      }
      $produk = $this->produk_model->cari_produk(urldecode($keyword));
      if($produk) {
         foreach($produk as $produk) {
         echo '<a href="'.base_url('produk/detail/'.$produk->slug_produk.'').'"><li class="list-group-item hov1" style="height: 65px;"><div class="d-inline float-left"><img src="'.base_url('assets/upload/image/thumbs/'.$produk->gambar.'').'" class="img-thumbnail" width="40" height="40"></div><div class="ml-5 text-justify overflow-hidden mt-2 s-text7" style="height: 20px;"> '.$produk->nama_produk.'</div></li></a>';
         }
      } else {
         echo "<li class='list-group-item s-text7'> PRODUK TIDAK TERSEDIA... </li>";
      }
    
   }
}