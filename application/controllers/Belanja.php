<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

   public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
      $this->load->model('pelanggan_model');
      $this->load->model('header_transaksi_model');
      $this->load->model('transaksi_model');
      $this->load->model('belanja_model');
      $this->load->helper('string');
      $this->simple_pelanggan->cek_login();
	}

   // Halaman Belanja
   public function index()
   {  
      $data['title'] = 'Keranjang Belanja';
      $data['keranjang'] = $this->belanja_model->contents();
      $data['total_belanja'] = $this->belanja_model->total()['subtotal'];
      $data['isi'] = 'belanja/list';

      $this->load->view('layout/wrapper', $data);  
   }

   // Tambah ke keranjang belanja
   public function add()
   {  
      $redirect_page = $this->input->post('redirect_page');
      $this->belanja_model->insert();
      $this->session->set_flashdata('flash-cart2', 'Masuk Keranjang Belanja');
      redirect($redirect_page, 'refresh');
   }

   public function update_cart($rowid)
   {
      $this->belanja_model->update($rowid);
      $this->session->set_flashdata('sukses', 'Data Keranjang Telah di Update');
      redirect(base_url('belanja'));
   }

   public function hapus($rowid = NULL)
   {     
      $produk_cart = $this->belanja_model->listingByRowid($rowid);
      if(!empty($produk_cart) && $produk_cart['id_pelanggan'] == $this->session->userdata('id_pelanggan')) {
         $this->belanja_model->remove($rowid);
         $this->session->set_flashdata('sukses', 'Data Keranjang Belanja Telah Dihapus');
         redirect(base_url('belanja'));

      } elseif($rowid == NULL) {
         $this->belanja_model->destroy();
         $this->session->set_flashdata('sukses', 'Semua Data Keranjang Belanja Telah Dihapus');
         redirect(base_url('belanja'));

      } else {
         $this->session->set_flashdata('sukses', 'Item Tidak Ada di Keranjang Anda');
         redirect(base_url('belanja'));
      }
   }

   public function checkout()
   {  
      $email = $this->session->userdata('email');
      $pelanggan = $this->pelanggan_model->listingbyid($email);
      $konfigurasi = $this->konfigurasi_model->listing();
      $keranjang = $this->belanja_model->contents();
      $total_belanja = $this->belanja_model->total()['subtotal'];

      $this->form_validation->set_rules('expedisi', 'Expedisi', 'required');
      $this->form_validation->set_rules('layanan', 'Layanan', 'required');

      if($this->form_validation->run()  == false) {

         $data['title'] = 'Checkout';
         $data['keranjang'] = $keranjang;
         $data['pelanggan'] = $pelanggan;
         $data['konfigurasi'] = $konfigurasi;
         $data['total_belanja'] = $total_belanja;
         $data['isi'] = 'belanja/checkout2';

         $this->load->view('layout/wrapper', $data);

      } else {
         $this->header_transaksi_model->tambah();
         $this->transaksi_model->tambah($keranjang);
         $this->load->model('rajaongkir_model');
         $this->rajaongkir_model->tambah_pengiriman();
         $this->session->set_userdata('kode_transaksi', $this->input->post('kode_transaksi', true));
         $this->belanja_model->destroy();
         $this->session->set_flashdata('sukses_checkout', 'Checkout Berhasil');
         redirect('belanja/sukses');
      }
         
   }

   public function sukses()
   {  
      $this->load->model('rekening_model');
      
      $data['title'] = 'Checkout Berhasil';
      $data['rekening'] = $this->rekening_model->listing();
      $data['isi'] = 'belanja/sukses2';
      $this->simple_pelanggan->belum_masuk();
      $this->simple_pelanggan->sudah_checkout();
      $this->session->unset_userdata('kode_transaksi');
      $this->load->view('layout/wrapper', $data);
   }

}
