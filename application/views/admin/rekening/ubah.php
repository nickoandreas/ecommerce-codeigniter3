<div class="content-wrapper">
   
<section class="content" >
<div class="container-fluid">
<div class="row">
   <div class="col-12">
<div class="card card-dark">
<div class="card-header">
   <h3 class="card-title font-weight-bold" >UPDATE REKENING</h3>
</div>
<div class="card-body" >

<form action="" method="post">

   <input type="hidden" name="id_rekening" value="<?= $rekening['id_rekening']?>">

   <div class="form-group row" >
      <label  class="col-md-2 col-form-label">Nama Bank</label>
      <div class="col-md-5">
      <input type="text" name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?= $rekening['nama_bank'] ?>">
      <small class="form-text text-danger"><?= form_error('nama_rekening') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">No Rekening</label>
      <div class="col-md-5">
      <input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening"  value="<?= $rekening['nomor_rekening'] ?>" >
      <small class="form-text text-danger"><?= form_error('nomor_rekening') ?></small>
      </div>
   </div>
   
   <div class="form-group row">
      <label  class="col-md-2 control-label">Nama Pemilik Rekening</label>
      <div class="col-md-5">
      <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik Rekening"  value="<?= $rekening['nama_pemilik'] ?>" >
      <small class="form-text text-danger"><?= form_error('nama_pemilik') ?></small>
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

