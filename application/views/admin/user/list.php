<div class="content-wrapper">

  <!-- sweet alert -->
   <div class="flash-data" 
      data-flashdata="<?= $this->session->flashdata('flash');?>">
   </div>

<section class="content">
<div class="container-fluid">
<!-- alert pengujian restfull -->
<div class="row">
<div class="col-12">

   <?php if($this->session->flashdata('time_akhir') == FALSE) : ?>
      <div class="alert alert-info mt-3 font-weight-bold">
         <?= 'Waktu Untuk Mengambil '.$jumlah_user.' Data User (READ) '.$waktu_eksekusi ?> Detik
      </div>
   <?php else :?>
      <?php $waktu_eksekusi = $this->session->flashdata('time_akhir') - $this->session->flashdata('time_awal') ?>
      <div class="alert alert-info mt-3 font-weight-bold">
          <?= $this->session->flashdata('msg')." ".number_format($waktu_eksekusi, 3) ?> Detik
      </div>
   <?php endif; ?>

   <div >
      <a href="<?= base_url() ?>admin/user/tambah" class="btn btn-warning mb-2 font-weight-bold"><span class="fa fa-plus"></span> Tambah Pengguna </a>
   </div>

</div>
</div>

<div class="row">
<div class="col-12"> 
<div class="card card-secondary">

<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold">DATA PENGGUNA</h3>
</div>

<div class="card-body">

<table id="example1" class="table table-bordered table-striped shadow">

<thead class="bg-secondary ">
   <tr>
      <th class="text-center">NO</th>
      <th class="text-center">ACTION</th>
      <th>NAMA</th>
      <th>EMAIL</th>
      <th>USERNAME</th>
      <th>LEVEL</th>
   </tr>
</thead>

<tbody class="bg-dark ">
   <?php $no=0; foreach ($user as $user) : ?>
   <tr>
      <td class="text-center"><?= $no+=1 ?></td>
      <td class="text-center">
         <a href="<?= base_url() ?>admin/user/edit/<?= $user['id_user'];?>" class="badge bg-warning "><i class="fa fa-edit"></i> </a>


         <a href="<?= base_url() ?>admin/user/delete/<?= $user['id_user'];?>" class="badge bg-danger tombolHapus" ><i class="fa fa-trash "></i> </a>
      </td>
      <td class=""><?= $user['nama']; ?></td>
      <td><?= $user['email']; ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['akses_level'] ?></td>
     
   </tr>
   <?php endforeach; ?>
</tbody>

</table>

</div>
   <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->