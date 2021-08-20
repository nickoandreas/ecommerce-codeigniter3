<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datakota extends CI_Controller {

 
  public function kotaaja($id_provinsi) 
  {
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi,
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
         $data_kota = $response['rajaongkir']['results'];
         
         foreach($data_kota as $data_kota) {
            echo "<option class='opt' value='". $data_kota['city_id']  ."'>". $data_kota['city_name'] ."</option>";
         }
         
      }

  }

  public function nama_kota($id_kota, $id_provinsi) 
  {
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$id_kota."&province=".$id_provinsi,
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
         $nama_kota = $response['rajaongkir']['results']['city_name'];
         echo $nama_kota;
         
         
      }

  }

  public function nama_provinsi($id_kota, $id_provinsi) 
  {
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=".$id_kota."&province=".$id_provinsi,
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
         $nama_provinsi = $response['rajaongkir']['results']['province'];
         echo $nama_provinsi;
         
         
      }

  }

  public function kotaById($id_provinsi) 
  {
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi,
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
         $data_kota = $response['rajaongkir']['results'];
         $this->load->model('pelanggan_model');
         $email = $this->session->userdata('email');
         $pelanggan = $this->pelanggan_model->listingbyid($email);
         
         
         foreach($data_kota as $data_kota) {
            if($data_kota['city_id'] == $pelanggan['id_kota']) {

               echo "<option selected class='opt' value='". $data_kota['city_id']  ."'>". $data_kota['city_name'] ."</option>";

            } else {

               echo "<option class='opt' value='". $data_kota['city_id']  ."'>". $data_kota['city_name'] ."</option>";

            }
            
         }
         
      }

  }

  public function layanan($origin, $destination, $weight, $kurir)
  {
      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$kurir,
      CURLOPT_HTTPHEADER => array(
         "content-type: application/x-www-form-urlencoded",
         "key: aa46b5cbb1c1edff6b1087d1b0723d71"
      ),
      ));
      
      $response = curl_exec($curl);
      $err = curl_error($curl);
      
      curl_close($curl);
      
      if ($err) {

         echo "cURL Error #:" . $err;

      } else {

         $response = json_decode($response, true);
         $result = $response['rajaongkir']['results'];
         $cost = $result[0]['costs'];

         foreach($cost as $cost) {

            if($result[0]['code'] != 'pos') {

               echo "<option harga='".$cost['cost'][0]["value"]."' class='opt-layanan' value='". $cost['service']  ."'>".$cost['service'].' ('.$cost['cost'][0]['etd'].' HARI)'."</option>";

            } else {

               echo "<option harga='".$cost['cost'][0]["value"]."' class='opt-layanan' value='". $cost['service']  ."'>".$cost['service'].' ('.$cost['cost'][0]['etd'].')'."</option>";
            }
           
         }
         

      }
  }

  


}