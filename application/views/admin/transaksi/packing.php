<div class="content-wrapper">

  <!-- sweet alert -->
   <div class="flash-status-update" 
      data-flashdata="<?= $this->session->flashdata('flash');?>">
   </div>

   <div class="flash-resi" 
      data-flashdata="<?= $this->session->flashdata('flash-resi');?>">
   </div>

   
   <?php if($this->session->flashdata('flash-cek')) : ?>
      <div class="alert alert-danger mt-3 mr-3 ml-3">
         <?= $this->session->flashdata('flash-cek') ?>
      </div>
   <?php endif; ?>
     
<section class="content ">
<div class="container-fluid">
<div class="row">
<div class="col-12"> 
<div class="card mt-3">

<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold" >PESANAN DIKEMAS</h3>
</div>

<div class="card-body ">

<table id="example1" class="table table-bordered">

<thead class="bg-secondary ">
   <tr>
      <th class="text-center">NO</th>
      <th class="text-center">ACTION</th>
      <th>PELANGGAN</th>
      <th>TANGGAL</th>
      <th>KODE</th>
      <th >JML.ITEM</th>
      <th>JML.TOTAL</th>
      <th>STATUS</th>
      <th>NP.HP</th>
      <th>EMAIL</th>
      <th>ALAMAT</th>
      
   </tr>
</thead>

<tbody class="bg-dark " >
   <?php $no=0; foreach ($header_transaksi as $header_transaksi) : ?>
   <tr>
      <td class=" text-center"><?= $no+=1 ?></td>
      <td class=" text-center ">

         <div class="dropdown">
            <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Action
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

               <a href="<?= base_url() ?>admin/transaksi/status_kirim/<?= $header_transaksi['kode_transaksi'];?>" class="  bg-success dropdown-item"><i class="fa fa-check "></i> Kirim Pesanan</a>
               
               <a href="#"  class="bg-secondary dropdown-item" data-toggle="modal" data-target="#modal_resi-<?= $header_transaksi['kode_transaksi'] ?>"><i class="fa fa-upload"></i> Masukan No Resi</a>

               <a href="<?= base_url() ?>admin/transaksi/detail/<?= $header_transaksi['kode_transaksi'];?>" class="  bg-danger dropdown-item "><i class="fa fa-eye"></i> Detail Transaksi </a>

               <a href="<?= base_url() ?>admin/transaksi/pdf/<?= $header_transaksi['kode_transaksi'];?>" target='_blank' class="  bg-info  dropdown-item"><i class="fa fa-file-pdf"></i> Print Detail Transaksi </a>

               <a href="<?= base_url() ?>admin/transaksi/invoice/<?= $header_transaksi['kode_transaksi'];?>" target='_blank' class="  bg-primary dropdown-item "><i class="fa fa-dolly-flatbed"></i> Print Invoice </a>

            </div>
         </div>



      </td>
      <td><?= $header_transaksi['nama_pelanggan']; ?></td>
      <td><?= date('d-m-Y', strtotime($header_transaksi['tanggal_transaksi'])) ?></td>
      <td><?= $header_transaksi['kode_transaksi'] ?></td>
      <td class='text-center'><?= $header_transaksi['total_item'] ?></td>
      <td>IDR.    <?= number_format($header_transaksi['jumlah_transaksi']+$header_transaksi['ongkir']) ?></td>
      <td><?=$header_transaksi['status_bayar'] ?></td>
      <td><?= $header_transaksi['telepon'] ?></td>
      <td><?= $header_transaksi['email'] ?></td>
      <td><?= $header_transaksi['alamat'] ?>, <?= $header_transaksi['kota'] ?>, <?= $header_transaksi['provinsi'] ?></td>

   </tr>

      <!-- modal resi -->
      <div class="modal fade" id="modal_resi-<?= $header_transaksi['kode_transaksi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">MASUKAN NO.RESI</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url() ?>admin/transaksi/resi/<?= $header_transaksi['kode_transaksi'] ?>" class="was-validated" method="post">

            <div class="form-group">
               <label  class="col-form-label">Tanggal Kirim</label>
               <input type="date" name='tanggal_kirim' class='form-control' required >
               <div class="invalid-feedback">Maaf, Tidak Boleh Kosong</div>
            </div>

            <div class="form-group">
               <label class="col-form-label ">No. Resi</label>
               <input type="text" class='form-control' name='resi' placeholder="No.Resi" required>
               <div class="invalid-feedback">Maaf, Tidak Boleh Kosong</div>
            </div>


            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
         </div>
      </div>
      </div>

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