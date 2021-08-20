<div class="content-wrapper">

  <!-- sweet alert -->
   <div class="flash-kategori" 
   data-flashdata="<?= $this->session->flashdata('flash');?>">
   </div>
  

   <div >
		<div class="col-md">
			<a href="<?= base_url() ?>admin/kategori/tambah" class="btn btn-warning ml-2 mb-2 mt-2 font-weight-bold"><span class="fa fa-plus"></span> Tambah Kategori </a>
		</div>
	</div>


<section class="content ">
<div class="container-fluid">
<div class="row">
<div class="col-12"> 
<div class="card ">

<div class="card-header bg-dark">
   <h3 class="card-title font-weight-bold" >KATEGORI PRODUK</h3>
</div>

<div class="card-body ">

<table id="example1" class="table table-bordered table-striped">

<thead class="bg-secondary ">
   <tr>
      <th class="text-center">NO</th>
      <th class="text-center">ACTION</th>
      <th>NAMA</th>
      <th>SLUG</th>
   </tr>
</thead>

<tbody class="bg-dark " >
   <?php $no=0; foreach ($kategori as $kategori) : ?>
   <tr>
      <td class=" text-center"><?= $no+=1 ?></td>
      <td class=" text-center ">
         <a href="<?= base_url() ?>admin/kategori/edit/<?= $kategori['id_kategori'];?>" class="badge  bg-warning "><i class="fa fa-edit"></i> </a>


         <a href="<?= base_url() ?>admin/kategori/delete/<?= $kategori['id_kategori'];?>" class="badge  bg-danger tombolHapus"><i class="fa fa-trash "></i></a>
      </td>
      <td><?= $kategori['nama_kategori']; ?></td>
      <td><?= $kategori['slug_kategori']; ?></td>
      
    
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