<div class="container ">

   <?php if($this->session->flashdata('warning')): ?>
      <div class='alert alert-danger mt-3''> 
      <?= $this->session->flashdata('warning') ?>
      </div>
   <?php endif; ?>


   <p class='alert alert-success mt-3'>Belum Memiliki Akun ? Silakan <a href="<?= base_url('registrasi') ?>" class='btn btn-info btn-sm'>Regsitrasi Disini</a></p>

<div class="card bg-light mt-3 mb-3">

   <div class="card-header">
      <h3 class="font-weight-bold"><?= strtoupper($title) ?></h3>
   </div>

<div class="card-body">
<form action="<?= base_url() ?>masuk" method='post'>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="nama@domain.com">
    <small class='form-text text-danger'><?= form_error('email', '<div class="error">', '</div>'); ?></small>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    <small class='form-text text-danger'><?= form_error('password', '<div class="error">', '</div>'); ?></small>
  </div>

  <button type="submit" class="btn btn-dark hov1 bo-rad-20 p-l-25 p-r-25 ">MASUK</button>
  <button type="reset" class="btn btn-dark hov1 bo-rad-20 p-l-25 p-r-25 ">HAPUS</button>
</form>
</div>


</div>
</div>