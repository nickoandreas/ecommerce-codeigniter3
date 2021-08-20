<div class="container ">

<?php if($this->session->flashdata('sukses')) :?>
   <div class='alert alert-danger mt-3' align='center'> 
      <?= $this->session->flashdata('sukses') ?>
   </div>
<?php endif; ?>

<p class='alert alert-success mt-3' align='center'>Sudah Memiliki Akun ? Silakan <a href="<?= base_url('masuk') ?>" class='btn btn-info btn-sm'>Login Disini</a></p>

<div class="card bg-light mt-3 mb-3">

   <div class="card-header">
      <h3 class="font-weight-bold"><?= strtoupper($title) ?></h3>
   </div>

<div class="card-body">
<form action="<?= base_url() ?>registrasi" method='post'>

   <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama_pelanggan" placeholder="Nama Pengguna">
    <small class='form-text text-danger'><?= form_error('nama_pelanggan', '<div class="error">', '</div>'); ?></small>
  </div>

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

  <div class="form-group">
    <label for="telepon">No Telepon</label>
    <input type="text" class="form-control" name="telepon" id="telepon" placeholder="08xxxxxxxxxxx">
    <small class='form-text text-danger'><?= form_error('telepon', '<div class="error">', '</div>'); ?></small>
  </div>

  <div class="row">
  <div class="col-6">
  <div class="form-group">
    <label for="provinsi">Provinsi</label>
    <select class="form-control regis-provinsi" name="id_provinsi" id="provinsi">
      <option>--Pilih Provinsi--</option>
      <?php foreach($provinsi as $provinsi) : ?>
        <option id_provinsi="<?= $provinsi['province_id'] ?>" value="<?= $provinsi['province_id'] ?>"><?= $provinsi['province']  ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  </div>

  <div class="col-6">
  <div class="form-group">
    <label for="kota">Kabupaten/Kota</label>
    <select class="form-control regis-kota" name="id_kota" id="kota">
      <option>--Pilih Kota--</option>
    </select>
  </div>
  </div>
  </div>

  <div class="form-group">
    <label for="alamat">Alamat Lengkap</label>
    <textarea class="form-control" name='alamat' id="alamat" rows="3"></textarea>   
  </div>

  <button type="submit" class="btn btn-dark hov1 bo-rad-20 p-l-25 p-r-25">SUBMIT</button>
  <button type="reset" class="btn btn-dark hov1 bo-rad-20 p-l-25 p-r-25 ">HAPUS</button>
</form>
</div>

</div>
</div>

