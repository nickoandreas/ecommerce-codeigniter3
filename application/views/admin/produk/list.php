<div class="content-wrapper">

  <!-- sweet alert -->
   <div class="flash-produk" 
   data-flashdata="<?= $this->session->flashdata('flash');?>">
   </div>

   <div >
		<div class="col-md">
			<a href="<?= base_url() ?>admin/produk/tambah" class="btn btn-warning ml-2 mb-2 mt-2 font-weight-bold"><span class="fa fa-plus "></span> Tambah Produk</a>
		</div>
	</div>

<section class="content">

<div class="container-fluid">
<div class="row">
<div class="col-12"> 
<div class="card ">

<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold">DATA PRODUK</h3>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped" >

<thead class="bg-secondary" >
   <tr>
      <th class="text-center">NO</th>
      <th class="text-center">ACTION</th>
      <th class="text-center">GAMBAR</th>
      <th class="text-center ">NAMA </th>
      <th>KODE PRODUK</th>
      <th>KATEGORI</th>
      <th>MIN.PEM</th>
      <th>STOK PRODUK</th>
      <th>STATUS</th>
      <th>BERAT</th>
      <th>UKURAN</th>
      <th>HRG.JUAL</th>
      <th>HRG.BELI</th>
      <th>HRG.DISKON</th>
      <th>PERIODE DISKON</th>
   </tr>
</thead>

<tbody class="bg-dark ">
   <?php $no=0; foreach ($produk as $produk) : ?>
   <tr >
      <td style="vertical-align:middle;" class="text-center"><?= $no+=1 ?></td>
      <td class="text-center" style="vertical-align:middle;" >

         <div class="dropdown">
            <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Gambar <span class="badge badge-light"><?= $produk['total_gambar'] ?></span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                <a href="<?= base_url() ?>admin/produk/gambar/<?= $produk['id_produk'];?>" class="dropdown-item bg-info "><i class="fa fa-image" ></i>  Tambah Gambar</a>

                <a href="<?= base_url() ?>admin/produk/edit/<?= $produk['id_produk'];?>" class="dropdown-item  bg-primary "><i class="fa fa-edit"></i> Edit </a>

               <a href="<?= base_url() ?>admin/produk/delete/<?= $produk['id_produk'];?>" class="dropdown-item  bg-danger tombolHapus" ><i class="fa fa-trash "></i> Hapus</a>

            </div>
         </div>
         
      </td>

      <td align="center" style="vertical-align:middle;">
         <img src="<?= base_url()?>assets/upload/image/thumbs/<?= $produk['gambar']; ?>" class="img img-responsive img-thumbnail "  style="width:60px;height:55px;" >
      </td>

      <td style="vertical-align:middle;" ><?= $produk['nama_produk']; ?></td>

      <td style='vertical-align:middle;'><?= $produk['kode_produk'] ?></td>

      <td style="vertical-align:middle;"><?= $produk['nama_kategori']; ?></td>

      <td style="vertical-align:middle;" class="text-center" ><?= $produk['stok_minimal']; ?></td>

      <td style="vertical-align:middle;" class='text-center' ><?= $produk['stok']; ?></td>

      <td style="vertical-align:middle;"><?= $produk['status_produk'] ?></td>

      <td style="vertical-align:middle;"><?= $produk['berat'] ?></td>

      <td style="vertical-align:middle;"><?= $produk['ukuran'] ?></td>

      <td style="vertical-align:middle;"><?= number_format($produk['harga'],'0',',','.') ?></td>

      <td style="vertical-align:middle;"><?= number_format($produk['harga_beli'],'0',',','.') ?></td>

      <td style="vertical-align:middle;"><?= number_format($produk['harga_diskon'],'0',',','.') ?></td>

      <td>  <?= date('d M Y', strtotime($produk['tanggal_mulai_diskon'])) ?> S/D <?= date('d M Y', strtotime($produk['tanggal_akhir_diskon'])) ?> </td>

      
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