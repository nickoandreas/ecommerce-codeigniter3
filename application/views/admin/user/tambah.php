<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

<section class="content" >
<div class="container-fluid mt-2">
<div class="row">
   <div class="col-12">
<div class="card ">
<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold" >INPUT DATA PENGGUNA</h3>
</div>
<div class="card-body" >

<form action="" method="post">

   <div class="form-group row" >
      <label  class="col-md-2 col-form-label">Nama Pengguna</label>
      <div class="col-md-5">
      <input type="text" name="nama" class="form-control" placeholder="Nama Pengguna">
      <small class="form-text text-danger"><?= form_error('nama') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Email Pengguna</label>
      <div class="col-md-5">
      <input type="email" name="email" class="form-control" placeholder="Email Pengguna" >
      <small class="form-text text-danger"><?= form_error('email') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Username</label>
      <div class="col-md-5">
      <input type="text" name="username" class="form-control" placeholder="Username" >
      <small class="form-text text-danger"><?= form_error('username') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Password</label>
      <div class="col-md-5">
      <input type="password" name="password" class="form-control" placeholder="Password" >
      <small class="form-text text-danger"><?= form_error('password') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Level Hak Akses</label>
      <div class="col-md-5">
         <select name="akses_level" class="form-control">
               <option value="Admin">Admin</option>
               <option value="User">User</option>
         </select>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label"></label>
      <div class="col-md-5">
      <button class="btn btn-info btn-sm" name="submit" type="submit">
         <i class="fa fa-save"></i> Simpan
      </button>

      <button class="btn btn-danger btn-sm" name="reset" type="reset">
         <i class="fa fa-times"></i> Reset
      </button>
   </div>

</form>

