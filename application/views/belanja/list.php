<section class="p-t-50 p-b-40 flex-col-c-m bg-light" >
   <h2 class="l-text4 t-center warna"> <?= $title ?> </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">

<?php if($this->session->flashdata('sukses')) :?>
   <div class='alert alert-warning mb-3' align='center'> 
      <?= $this->session->flashdata('sukses') ?>
   </div>
<?php endif; ?>

<div class="container-table-cart pos-relative">
<div class="wrap-table-shopping-cart bgwhite">

<table class="table-shopping-cart">
   <tr class="table-head">
      <th class="column-1"></th> 
      <th class="column-2">Produk</th>
      <th class="column-3">Harga</th>
      <th class="column-4 p-l-35">Jumlah</th>
      <th class="column-5">Subtotal</th>
      <th class="column-6 " width='10%' ></th>
   </tr>


<?php foreach($keranjang as $keranjang) :?>
<?php $produk = $this->produk_model->listingbyid($keranjang['id']);?>

<form action="<?= base_url() ?>belanja/update_cart/<?= $keranjang['rowid'] ?>" method="post">
<input type="hidden" name="price" value="<?= $keranjang['price'] ?>">

<tr class="table-row">
   <td class="column-1">
      <div class="cart-img-product b-rad-4 o-f-hidden">
         <img src="<?= base_url() ?>assets/upload/image/thumbs/<?= $produk['gambar'] ?>" alt="<?= $produk['gambar'] ?>">
      </div>
   </td>

   <td class="column-2"><?= $keranjang['name'] ?> (<?= number_format($produk['berat'], '0',',','.')  ?> Gr) </td>

   <td class="column-4">IDR. <?= number_format($keranjang['price'], '0', ',', '.') ?></td>

   <td class="column-4">
   <div class="flex-w bo5 bo-rad-23 of-hidden w-size17">
      <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
         <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
      </button>
         <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?= $keranjang['qty'] ?>">
      <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
         <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
      </button>
   </div>
   </td>

   <td class="column-5">IDR.<?php 
      echo number_format($keranjang['subtotal'], '0', ',', '.');?>
   </td>

   <td>
      <a href='<?= base_url() ?>belanja/hapus/<?= $keranjang['rowid'] ?>' class='btn btn-dark btn-sm'>
         <i class='fa fa-trash-o'></i>
      </a>

      <button type='submit' name='update' class='btn btn-dark btn-sm'>
         <i class='fa fa-edit'></i>
      </button>
   </td>
</tr>
</form>
<?php endforeach; ?>


<tr class='table-row bg-light font-weight-bold'>
   <td colspan="4" class='column-1'>Total Pembelian</td>
   <td colspan='2' class='column-2'>IDR. <?= number_format($total_belanja, '0', ',', '.') ?></td>
</tr>

</table>

<p class='pull-right mt-2 mr-2'>
   <a href="<?= base_url() ?>belanja/hapus" class='btn btn-dark bo-rad-20 hov1 p-l-25 p-r-25'>
       HAPUS SEMUA
   </a>

   <a href="<?= base_url() ?>belanja/checkout" class='btn btn-dark bo-rad-20 hov1 p-l-25 p-r-25'>
      CHECKOUT
   </a>
</p>


</div>
<!-- /wrap table -->
<div class="flex-w flex-sb-m p-t-10 bo8 p-l-35 p-r-60 p-lr-15-sm "></div>
</div>
<!-- /container table -->
</div>
<!-- /container -->
</section>