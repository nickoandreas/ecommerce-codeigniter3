<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="flash-gambar" 
data-flashdata="<?= $this->session->flashdata('flash');?>">
</div>


<section class="content" >
<?php
if(isset($error)) {
   echo '<div class="alert alert-danger mt-3">';
   echo $error;
   echo '</div>';
}
 ?>
<div class="container-fluid mt-2">
<div class="row">
   <div class="col-12">
<div class="card ">
<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold" >TAMBAH GAMBAR PRODUK</h3>
<!--  -->

</div>

<div class="card-body" >

<?php echo form_open_multipart(base_url('admin/produk/gambar/'.$id) ); ?>

   <div class="form-group  row" >
      <label  class="col-md-3 col-form-label">Judul Gambar Produk</label>
      <div class="col-md-5">
      <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar">
      <small class="form-text text-danger"><?= form_error('judul_gambar') ?></small>
      </div>
   </div>

   <div class="form-group form row">
      <label  class="col-md-3 control-label">Upload Gambar Produk</label>
      <div class="col-md-3">
      <input type="file" class="form-control-file" name="gambar" require>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-3 control-label"></label>
      <div class="col-md-3 ">
         <button class="btn btn-info btn-sm" name="submit" type="submit">
            <i class="fa fa-save"></i> Upload Gambar
         </button>

         <button class="btn btn-danger btn-sm" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
         </button>

      </div>
   </div>
<?php echo 
form_close();
?>

<table id="example1" class="table table-bordered table-striped" >

<thead class="bg-secondary" >
   <tr >
      <th class="text-center">NO</th>
      <th class="text-center">ACTION</th>
      <th class="text-center">GAMBAR</th>
      <th>JUDUL</th>
   </tr>
</thead>

<tbody class="bg-dark " >

   <tr>
      <td style="vertical-align:middle;" class="text-center">1</td>

      <td rowspan=1 >
          
      </td>

      <td align="center" style="vertical-align:middle;">
            <img src="<?= base_url()?>assets/upload/image/thumbs/<?= $produk['gambar']; ?>" class="img img-responsive img-thumbnail "  style="width:60px;height:55px;" >
      </td>

      <td style="vertical-align:middle;" ><?= $produk['nama_produk']; ?></td>
      
      
   </tr>


   <?php $no=1; foreach ($dataGambar as $dataGambar) : ?>
   <tr>
      <td style="vertical-align:middle;" class="text-center"><?= $no+=1 ?></td>

      <td class="text-center" style="vertical-align:middle;" >
            <a href="<?= base_url() ?>admin/produk/deleteGbr/<?= $produk['id_produk'];?>/<?= $dataGambar['id_gambar'] ?>" class="badge  bg-danger tombolHapus" ><i class="fa fa-trash "></i> Hapus</a>
      </td>

      <td align="center" style="vertical-align:middle;">
            <img src="<?= base_url()?>assets/upload/image/thumbs/<?= $dataGambar['gambar']; ?>" class="img img-responsive img-thumbnail "  style="width:60px;height:55px;" >
      </td>

      <td style="vertical-align:middle;" ><?= $dataGambar['judul_gambar']; ?></td>
      
      
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