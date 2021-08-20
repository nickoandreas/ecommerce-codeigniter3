<section class="newproduct bgwhite p-t-45 p-b-105">
<div class="container">

<div class="flash-cart" 
      data-flashdata="<?= $this->session->flashdata('flash-cart2') ?>">
</div>

<div class="sec-title p-b-60">
   <h3 class="m-text5 t-center">Promo Special </h3>
</div>

<div class="wrap-slick2">
<div class="slick2">

<?php foreach($produk as $produk): ?>
   <div class="item-slick2 p-l-15 p-r-15">

   <form action="<?= base_url() ?>belanja/add" method='post'>
      <input type="hidden" name='id' value='<?= $produk['id_produk']?>' >
      <input type="hidden" name='qty' value=1 >
      <input type="hidden" name='price' value='<?= $produk['harga_diskon'] ?>'>
      <input type="hidden" name='name' value='<?= $produk['nama_produk'] ?>'>
      <input type="hidden" name='redirect_page' value='<?= current_url() ?>'>


      <div class="block2">
      <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
         <!-- gambar produk -->
         <img src="<?= base_url() ?>assets/upload/image/<?= $produk['gambar'] ?>" alt="<?= $produk['nama_produk'] ?> ">
      <!-- overlay & link whislist -->
      <div class="block2-overlay trans-0-4"> 
            <!-- add chart -->
            <div class="block2-btn-addcart w-size1 trans-0-4">
               <button type='submit' value='submit' class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                  <span class="fa fa-plus"> Keranjang</span>
               </button>
            </div>
      </div>
      </div>

         <div class="block2-txt p-t-20">
            <a href="<?= base_url('produk/detail/'. $produk['slug_produk']) ?>" class="block2-name dis-block s-text3 p-b-5">
            <?= $produk['nama_produk'] ?></a>
               <span class="block2-oldprice m-text7 p-r-5">
                  IDR <?= number_format($produk['harga'], '0', ',', '.') ?>
               </span>
               <span class="block2-newprice m-text8 p-r-5">
                  IDR <?= number_format($produk['harga_diskon'], '0', ',', '.') ?>
               </span>  
         </div>

     </div>
 
   </form>
   </div>
<?php endforeach; ?>

</div>
</div>

</div>
</section>