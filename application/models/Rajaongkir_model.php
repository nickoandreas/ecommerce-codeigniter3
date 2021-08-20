<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rajaongkir_model extends CI_Model {


  public function provinsi() {

      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
         "key: aa46b5cbb1c1edff6b1087d1b0723d71"
      ),
      ));
      
      $response = curl_exec($curl);
      $err = curl_error($curl);
      
      curl_close($curl);
      
      if ($err) {
      echo "cURL Error #:" . $err;
      } 
      else {
         $response = json_decode($response, true);
         return $provinsi = $response['rajaongkir']['results'];
      }

     

  }

  public function tambah_pengiriman()
  {
     $data = [
         'id_pelanggan' => $this->session->userdata('id_pelanggan'),
         'kode_transaksi' => $this->input->post('kode_transaksi'),
         'expedisi' => $this->input->post('expedisi'),
         'layanan' => $this->input->post('layanan'),
         'id_tujuan' => $this->input->post('id_tujuan'),
         'provinsi' => $this->input->post('provinsi'),
         'kota' => $this->input->post('kota'),
         'alamat' => $this->input->post('alamat'),
         'berat' => $this->input->post('berat'),
         'ongkir' => $this->input->post('ongkir'),
     ];

     $this->db->insert('pengiriman', $data);
  }

  public function hapus_pengiriman($kode_transaksi)
  {
     $this->db->delete('pengiriman', ['kode_transaksi' => $kode_transaksi]);
  }

  public function pengiriman($kode_transaksi)
  {
     return $this->db->get_where('pengiriman', ['kode_transaksi' => $kode_transaksi])->result_array();
  }



 
}


