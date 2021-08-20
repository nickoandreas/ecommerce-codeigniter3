<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {


   
   public function __construct()
   {
      parent::__construct();
      $this->load->model('transaksi_model');
      $this->load->model('rekening_model');
      $this->load->model('header_transaksi_model');
      $this->load->model('produk_model');
      $this->load->model('rajaongkir_model');
   }
   

   public function index()
   {
      $data['title'] = 'PESANAN DIBAYAR';
      $data['header_transaksi'] = $this->header_transaksi_model->listing('Menunggu Konfirmasi Admin');
      $data['isi'] = 'admin/transaksi/list';

      $this->load->view('admin/layout/wrapper', $data);
      
   }

   public function packing()
   {
      $data['title'] = 'PESANAN DIKEMAS';
      $data['header_transaksi'] = $this->header_transaksi_model->listing('Proses Pengemasan');
      $data['isi'] = 'admin/transaksi/packing';

      $this->load->view('admin/layout/wrapper', $data);
      
   }

   public function kirim()
   {
      $data['title'] = 'PESANAN DIKIRIM';
      $data['header_transaksi'] = $this->header_transaksi_model->listing('Pesanan Dalam Pengiriman');
      $data['isi'] = 'admin/transaksi/dikirim';

      $this->load->view('admin/layout/wrapper', $data);
      
   }

   public function diterima()
   {
      $data['title'] = 'PESANAN DITERIMA';
      $data['header_transaksi'] = $this->header_transaksi_model->listing('Pesanan Sudah Diterima');
      $data['isi'] = 'admin/transaksi/diterima';

      $this->load->view('admin/layout/wrapper', $data);
      
   }

   public function detail($kode_transaksi)
   {
      $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
      $data['title'] = 'Detail Transaksi';
      $data['isi']  = 'admin/transaksi/detail';
      $data['header_transaksi'] = $header_transaksi;
      $data['transaksi'] = $this->transaksi_model->kode_transaksi($kode_transaksi);
      $data['rekening'] = $this->rekening_model->listingbyid($header_transaksi['id_rekening']);

      $this->load->view('admin/layout/wrapper', $data);
   }


   public function status($kode_transaksi)
   {
      
      $this->header_transaksi_model->konfirm($kode_transaksi, 'Proses Pengemasan');
      $this->session->set_flashdata('flash', 'DiKonfirmasi');
      redirect('admin/transaksi');
      
   }

   public function status_kirim($kode_transaksi)
   {
      $pengiriman = $this->rajaongkir_model->pengiriman($kode_transaksi);
      if($pengiriman['resi'] == '') {
         $this->session->set_flashdata('flash-cek', 'Maaf Masukan No Resi Terlebih Dahulu');
         redirect('admin/transaksi/packing');
      }
      $this->header_transaksi_model->konfirm($kode_transaksi, 'Pesanan Dalam Pengiriman');
      $this->session->set_flashdata('flash', 'Diupdate');
      redirect('admin/transaksi/packing');
      
   }

   public function status_diterima($kode_transaksi)
   {
      
      $this->header_transaksi_model->konfirm($kode_transaksi, 'Pesanan Sudah Diterima');
      $this->session->set_flashdata('flash', 'Diupdate');
      redirect('admin/transaksi/kirim');
      
   }

   public function pdf($kode_transaksi)
   {
      $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
      $data['title'] = 'Detail Transaksi';
      $data['header_transaksi'] = $header_transaksi;
      $data['transaksi'] = $this->transaksi_model->kode_transaksi($kode_transaksi);
      $data['rekening'] = $this->rekening_model->listingbyid($header_transaksi['id_rekening']);
      $data['konfigurasi'] = $this->konfigurasi_model->listing();

      $html = $this->load->view('admin/transaksi/cetak', $data, true);

      $mpdf = new \Mpdf\Mpdf();
      $mpdf->WriteHTML($html);
      $nama_file = 'Detail-Transaksi'. '-' .$kode_transaksi;
      $mpdf->Output($nama_file, 'I');

   }

   public function invoice($kode_transaksi)
   {
      $header_transaksi = $this->header_transaksi_model->kode_transaksi($kode_transaksi);
      $konfigurasi = $this->konfigurasi_model->listing();
      $data['title'] = 'Invoice Transaksi';
      $data['header_transaksi'] = $header_transaksi;
      $data['transaksi'] = $this->transaksi_model->kode_transaksi($kode_transaksi);
      $data['rekening'] = $this->rekening_model->listingbyid($header_transaksi['id_rekening']);
      $data['konfigurasi'] = $konfigurasi;

      $html = $this->load->view('admin/transaksi/kirim', $data, true);

      $mpdf = new \Mpdf\Mpdf();

      $mpdf->SetHTMLHeader('
      <div style="text-align: left; font-weight: bold;">
         <img src=" '.base_url('assets/upload/image/'.$konfigurasi['icon']).' " style="height:50px; width:auto;" >
      </div>');

      $mpdf->SetHTMLFooter('
      <div style="padding:10px 20px; background-color:black; color:white; font-size:12px;" >
         Alamat     : '.$konfigurasi["namaweb"].' ('.$konfigurasi["alamat"].')<br>
         No.Telepon : '.$konfigurasi["telepon"].' 
      </div>
      ');
   
      $mpdf->WriteHTML($html);
      $nama_file = 'Invoice'.'-'. url_title($konfigurasi['namaweb'], 'dash', true). '-'. $kode_transaksi;
      $mpdf->Output($nama_file, 'I');

   }

   public function resi($kode_transaksi)
   {
      $this->header_transaksi_model->resi($kode_transaksi);
      $this->session->set_flashdata('flash-resi', 'Dimasukan');
      redirect('admin/transaksi/packing');
   }

   public function hapus_pesanan($kode_transaksi)
   {
      $this->transaksi_model->hapus_transaksi($kode_transaksi);
      $this->header_transaksi_model->hapus_transaksi($kode_transaksi);
      $this->load->model('rajaongkir_model');
      $this->rajaongkir_model->hapus_pengiriman($kode_transaksi);
      $this->session->set_flashdata('flash-batal', 'Dibatalkan');   
      redirect('admin/dashboard');
   }





}


