<!DOCTYPE html>
<html lang="en">
<head>
<title><?= $title ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="<?= $konfigurasi['keywords']?>">
<meta name="description" content="<?= $konfigurasi['deskripsi'] ?>">

<!-- icon -->
<link rel="icon" type="image/png" href="<?= base_url() ?>assets/upload/image/<?= $konfigurasi['icon']; ?>" >

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/vendor/slick/slick.css">

<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/css/util.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/template/css/main.css">

<style>
 
   .pagination a, .pagination b {
      padding: 10px 10px;
      text-align: center;
      text-decoration: none;
      border-radius: 100%;
      float: left;
      margin-left : 2px;
      margin-right: 2px;
      width: 45px;   

   }

   .pagination a {
      background-color: #e6ede8;
      color: black;
      font-weight: bold;
   }

   .pagination b {
      background-color: black;
      color: white;
   }

   .pagination a:hover {
      background-color: black;
      color: white;
   }

   .warna {
      color: black;
      font-weight: bold;
   }
 
</style>

</head>
<body class="animsition">
