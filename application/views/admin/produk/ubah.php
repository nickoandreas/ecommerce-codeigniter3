<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
   <h3 class="card-title font-weight-bold" >UPDATE DATA PRODUK</h3>
<!--  -->

</div>

<div class="card-body" >

<form action="" method="post" enctype="multipart/form-data">

   <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>"> 

   <div class="form-group  row" >
      <label  class="col-md-2 col-form-label">Nama Produk</label>
      <div class="col-md-5">
      <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?= $produk['nama_produk']; ?>">
      <small class="form-text text-danger"><?= form_error('nama_produk') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Kode Produk</label>
      <div class="col-md-5">
      <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?= $produk['kode_produk']; ?> " >
      <small class="form-text text-danger"><?= form_error('kode_produk') ?></small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Kategori Produk</label>
      <div class="col-md-5">
         <select name="id_kategori" class="form-control">
            <?php foreach($kategori as $kategori) :?>
               <option value="<?= $kategori['id_kategori'] ?>" 
               <?php if($kategori['id_kategori'] == $produk['id_kategori']) 
               {echo 'selected';} ?>> 
               <?= $kategori['nama_kategori'] ?>
               </option>
            <?php endforeach; ?>
         </select>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Harga Produk</label>
      <div class="col-md-2">
         <input type="number" name="harga" class="form-control" placeholder="Harga Produk" value='<?= $produk['harga'] ?>'>
         <small class="text-success">Harga Jual</small>
      </div>

      <div class="col-md-2">
         <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" value="<?= $produk['harga_beli'] ?>">
         <small class="text-success">Harga Beli</small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Harga Diskon Produk</label>
      <div class="col-md-2">
         <input type="number" name="harga_diskon" class="form-control" placeholder="Harga Diskon" value="<?= $produk['harga_diskon'] ?>">
         <small class="text-success">Harga Diskon</small>
      </div>

      <div class="col-md-2 dates">
         <input type="text" name="tanggal_mulai_diskon" class="form-control datepicker" placeholder="dd-mm-yy" 
         <?php if($produk['tanggal_mulai_diskon'] == null ) : ?> 
            value="<?php null ?>"
         <?php else : ?>
            value="<?= date('d-m-Y', strtotime($produk['tanggal_mulai_diskon']))   ?>" 
         <?php endif; ?>>
         <small class="text-success">Tanggal Mulai Diskon</small>
      </div>
      
      <div class="col-md-2">
         <input type="text" name="tanggal_akhir_diskon" class="form-control datepicker"  placeholder="dd-mm-yy" 
         <?php if($produk['tanggal_akhir_diskon'] == null ) : ?> 
            value="<?php null ?>"
         <?php else : ?>
            value="<?= date('d-m-Y', strtotime($produk['tanggal_akhir_diskon'] ))  ?>" 
         <?php endif; ?>>
         <small class="text-success">Tanggal Selesai Diskon</small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Stok Produk & Stok Minimal</label>
      <div class="col-md-2">
         <input type="number" name="stok" class="form-control" placeholder="Stok Produk" value='<?= $produk['stok'] ?>' >
         <small class="text-success">Jumlah Stok Produk</small>
      </div>

      <div class="col-md-2">
         <input type="number" name="stok_minimal" class="form-control" placeholder="Minimal Pemesanan" value='<?= $produk['stok_minimal'] ?>' required> 
         <small class="text-success">Minimal Pemesanan</small>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Berat</label>
      <div class="col-md-5">
      <input type="text" name="berat" class="form-control" placeholder="Berat" value="<?= $produk['berat']; ?>">
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Ukuran</label>
      <div class="col-md-5">
      <input type="text" name="ukuran" class="form-control" placeholder="Ukuran" value="<?= $produk['ukuran']; ?>">
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Keterangan</label>
      <div class="col-md-8">
      <textarea name="keterangan" class="form-control" placeholder="Keterangan" id="editor" ><?= $produk['keterangan']; ?></textarea>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label">Keyword</label>
      <div class="col-md-8">
      <textarea name="keywords" class="form-control" placeholder="Keyword" ><?= $produk['keywords']; ?></textarea>
      </div>
   </div>

   <div class="form-group form row">
      <label  class="col-md-2 control-label">Gambar Produk</label>
      <div class="col-md-4">
      <img src="<?= base_url() ?>assets/upload/image/thumbs/<?= $produk['gambar']; ?>" width="100" alt="">
      <br><br>
      <input type="file" class="form-control-file" name="gambar" >
      </div>
   </div>

   <div class="form-group form row">
      <label  class="col-md-2 control-label">Status Produk</label>
      <div class="col-md-5">
      <select name="status_produk" class="form-control">
   
         <?php if($produk['status_produk'] == 'Publish' ) : ?>
            <option value="Publish" selected>Publikasikan</option>
            <option value="Draft" >Simpan Sebagai Draft</option>
         <?php else : ?>
            <option value="Publish" >Publikasikan</option>
            <option value="Draft" selected>Simpan Sebagai Draft</option>
         <?php endif; ?>

      </select>
      </div>
   </div>

   <div class="form-group row">
      <label  class="col-md-2 control-label"></label>
      <div class="col-md-5">
      <button class="btn btn-info btn-sm" name="submit" type="submit">
         <i class="fa fa-save"></i> Update
      </button>

      <button class="btn btn-danger btn-sm" name="reset" type="reset">
         <i class="fa fa-times"></i> Reset
      </button>
   </div>

</form>

