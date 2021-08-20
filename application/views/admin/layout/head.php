<?php 
$konfigurasi2 = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Icon -->
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/upload/image/<?= $konfigurasi2['icon'];?>"> 
  <!-- bootsrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- datepicker -->
  <link rel="stylesheet" href='<?= base_url() ?>/assets/adminlte/plugins/datepicker/css/bootstrap-datepicker.css'> 
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/adminlte/dist/css/adminlte.min.css">
  <!-- CK editor -->
  <script src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
  <script src="<?= base_url() ?>assets/ckeditor/samples/js/sample.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
