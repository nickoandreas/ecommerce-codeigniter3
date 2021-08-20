<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   

   public function index()
   {  
      $this->load->model('header_transaksi_model');
      
      $data['title'] = 'Halaman Administrator';
      $data['isi'] = 'admin/dashboard/list'; 
      $data['header_transaksi'] = $this->header_transaksi_model->listing('Menunggu Pembayaran');

      $this->load->view('admin/layout/wrapper', $data);
   }

}


