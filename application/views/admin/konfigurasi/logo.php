
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content" >

<div class="flash-konfigurasi" 
   data-flashdata="<?= $this->session->flashdata('flash');?>">
</div>
<?php
if(isset($error)) {
   echo '<div class="alert alert-danger mt-3">';
   echo $error;
   echo '</div>';
}
 ?>
<div class="container-fluid mt-2">
<div class="row">
   <div class="col-12">
<div class="card ">
<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold" >UPDATE LOGO WEBSITE</h3>
<!--  -->

</div>

<div class="card-body" >

<form action="<?= base_url() ?>admin/konfigurasi/logo" method="post" enctype="multipart/form-data">

   <input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi['id_konfigurasi'] ?>"> 

   <div class="form-group  row" >
      <label  class="col-md-2 col-form-label">Nama Website</label>
      <div class="col-md-5">
      <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?= $konfigurasi['namaweb']; ?>">
      <small class="form-text text-danger"><?= form_error('namaweb') ?></small>
      </div>
   </div>

   <div class="form-group form row">
      <label  class="col-md-2 control-label">Ganti Logo Website</label>
      <div class="col-md-4">
      <img src="<?= base_url() ?>assets/upload/image/thumbs/<?= $konfigurasi['logo']; ?>" width="100" alt="">
      <br><br>
      <input type="file" class="form-control-file" name="logo" class="form-control" >
      </div>
   </div>


   <div class="form-group row">
      <label  class="col-md-2 control-label"></label>
      <div class="col-md-5">
      <button class="btn btn-info btn-sm" name="submit" type="submit">
         <i class="fa fa-save"></i> Update
      </button>

      <button class="btn btn-danger btn-sm" name="reset" type="reset">
         <i class="fa fa-times"></i> Reset
      </button>
   </div>


</form>

