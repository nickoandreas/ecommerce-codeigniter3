<?php
$konfigurasi = $this->konfigurasi_model->listing();
$nav_produk = $this->konfigurasi_model->kategoriR2();
$nav_produkR4 = $this->konfigurasi_model->kategoriR4();
$keranjang = $this->belanja_model->contents();
$total_belanja = $this->belanja_model->total();
require_once ('head.php');
require_once ('header.php');
require_once ('nav.php');
require_once ('content.php');
require_once ('footer.php');