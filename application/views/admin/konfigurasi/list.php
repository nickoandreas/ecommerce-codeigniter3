<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content" >

<div class="flash-konfigurasi" 
   data-flashdata="<?= $this->session->flashdata('flash');?>">
</div>

<div class="container-fluid mt-2">
<div class="row">
   <div class="col-12">
<div class="card ">
<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold" >UPDATE DATA WEBSITE</h3>
<!--  -->

</div>
<div class="card-body" >

<form action="<?= base_url() ?>admin/konfigurasi" method="post" >

   <input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi['id_konfigurasi'] ?>"> 

   <div class="form-group  row" >
      <label  class="col-md-2 col-form-label">Nama Website</label>
      <div class="col-md-5">
      <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?= $konfigurasi['namaweb']; ?>">
      <small class="form-text text-danger"><?= form_error('namaweb') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Tagline</label>
      <div class="col-md-5">
      <input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?= $konfigurasi['tagline']; ?> " >
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Email</label>
      <div class="col-md-5">
      <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $konfigurasi['email']; ?> " >
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Website</label>
      <div class="col-md-5">
      <input type="text" name="website" class="form-control" placeholder="Website" value="<?= $konfigurasi['website']; ?> " >
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Facebook</label>
      <div class="col-md-5">
      <input type="url" name="facebook" class="form-control" placeholder="Facebook" value="<?= $konfigurasi['facebook']; ?> " >
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Instagram</label>
      <div class="col-md-5">
      <input type="url" name="instagram" class="form-control" placeholder="Instagram" value="<?= $konfigurasi['instagram']; ?> " >
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">telepon/HP</label>
      <div class="col-md-5">
      <input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?= $konfigurasi['telepon']; ?> " >
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Rekening Pembayaran</label>
      <div class="col-md-5">
      <input type="text" name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran" value="<?= $konfigurasi['rekening_pembayaran']; ?> " >
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Alamat</label>
      <div class="col-md-8">
      <textarea name="alamat" class="form-control" placeholder="Alamat Kantor" ><?= $konfigurasi['alamat']; ?></textarea>
      </div>
   </div>

   
   <div class="form-group row">
      <label  class="col-md-2 control-label">Keyword</label>
      <div class="col-md-8">
      <textarea name="keywords" class="form-control" placeholder="Keyword" ><?= $konfigurasi['keywords']; ?></textarea>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Metatext</label>
      <div class="col-md-8">
      <textarea name="metatext" class="form-control" placeholder="Metatext" ><?= $konfigurasi['metatext']; ?></textarea>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Deskripsi Website</label>
      <div class="col-md-8">
      <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Website" ><?= $konfigurasi['deskripsi']; ?></textarea>
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

