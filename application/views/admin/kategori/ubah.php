<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
     
        </div>
      </div><!-- /.container-fluid -->
   </section>

<section class="content" >
<div class="container-fluid">
<div class="row">
   <div class="col-12">
<div class="card card-dark">
<div class="card-header">
   <h3 class="card-title" >UPDATE KATEGORI </h3>
</div>
<div class="card-body" >

<form action="" method="post">

   <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori']?>">

   <div class="form-group row" >
      <label  class="col-md-2 col-form-label">Nama Kategori</label>
      <div class="col-md-5">
      <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?= $kategori['nama_kategori'] ?>">
      <small class="form-text text-danger"><?= form_error('nama_kategori') ?></small>
      </div>
   </div>
   
   <div class="form-group row ">
      <label  class="col-md-2 control-label"></label>
      <div class="col-md-5 ">
      <button class="btn btn-info btn-sm" name="submit" type="submit">
         <i class="fa fa-save"></i> Update
      </button>

      <button class="btn btn-danger btn-sm" name="reset" type="reset">
         <i class="fa fa-times"></i> Reset
      </button>
   </div>

</form>

