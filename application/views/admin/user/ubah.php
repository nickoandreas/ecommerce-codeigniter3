<div class="content-wrapper">
   
<section class="content" >
<div class="container-fluid mt-2">
<div class="row">
   <div class="col-12">
<div class="card ">
<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold" >UPDATE DATA</h3>
</div>
<div class="card-body" >

<form action="" method="post">

   <input type="hidden" name="id_user" value="<?= $users['id_user']?>">

   <div class="form-group row" >
      <label  class="col-md-2 col-form-label">Nama Pengguna</label>
      <div class="col-md-5">
      <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?= $users['nama'] ?>">
      <small class="form-text text-danger"><?= form_error('nama') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Email Pengguna</label>
      <div class="col-md-5">
      <input type="email" name="email" class="form-control" placeholder="Email Pengguna"  value="<?= $users['email'] ?>" >
      <small class="form-text text-danger"><?= form_error('email') ?></small>
      </div>
   </div>
   

   <div class="form-group row">
      <label  class="col-md-2 control-label">Level Hak Akses</label>
      <div class="col-md-5">
       <select name="akses_level" class="form-control">
         <?php foreach ($level as $level) : ?>
            <?php if($level == $users['akses_level']) : ?>

                  <option value="<?= $users['akses_level']?>" selected><?= $users['akses_level']?></option>

            <?php else : ?>

               <option value="<?= $level ?>"><?= $level ?></option>

            <?php endif; ?>

         <?php  endforeach; ?>
         </select>
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

