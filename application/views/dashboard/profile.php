<div class="container ">

<?php if($this->session->flashdata('sukses_update')) :?>
   <div class='alert alert-success mt-3' align='center'> 
      <?= $this->session->flashdata('sukses_update') ?>
   </div>
<?php endif; ?>

<div class="card bg-light mt-3 mb-3">

   <div class="card-header">
      <h3 class="font-weight-bold"><?= $title ?></h3>
   </div>

<div class="card-body">
<form action="<?= base_url() ?>dashboard/profile" method='post'>

   <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama_pelanggan" placeholder="Nama Pengguna" value="<?= $pelanggan['nama_pelanggan'] ?> ">
    <small class='form-text text-danger'><?= form_error('nama_pelanggan', '<div class="error">', '</div>'); ?></small>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="nama@domain.com" value='<?= $pelanggan['email'] ?> ' readonly>
    <small class='form-text text-danger'><?= form_error('email', '<div class="error">', '</div>'); ?></small>
  </div>

  <div class="form-group">
    <label for="telepon">No Telepon</label>
    <input type="telepon" class="form-control" name="telepon" id="telepon" placeholder="08xxxxxxxxxxx" value="<?= $pelanggan['telepon'] ?>">
    <small class='form-text text-danger'><?= form_error('telepon', '<div class="error">', '</div>'); ?></small>
  </div>

  <div class="row">
  <div class="col-6">
  <div class="form-group">
    <label for="provinsi">Provinsi</label>
    <select class="form-control profile-provinsi" name="id_provinsi" id="provinsi">
   
      <option>--Pilih Provinsi--</option>
      <?php foreach($provinsi as $provinsi) : ?>
        <option id_provinsi="<?= $provinsi['province_id'] ?>" value="<?= $provinsi['province_id'] ?>"
        <?php if($provinsi['province_id'] == $pelanggan['id_provinsi']) 
        {echo 'selected';} ?>> 
         <?= $provinsi['province']  ?>
        </option>
      <?php endforeach; ?>
   
    </select>
  </div>
  </div>

  <div class="col-6">
  <div class="form-group">
    <label for="kota">Kabupaten/Kota</label>
    <select class="form-control profile-kota" name="id_kota" id="kota">
      <option>--Pilih Kota--</option>
    </select>
  </div>
  </div>
  </div>

  <div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control" name='alamat' id="alamat" rows="3"><?= $pelanggan['alamat'] ?></textarea>   
  </div>

  <button type="submit" class="btn btn-dark hov1 activebo-rad-20 p-l-25 p-r-25">UPDATE</button>
</form>
</div>

</div>
</div>