<div class="flash-cart" 
      data-flashdata="<?= $this->session->flashdata('flash-cart2') ?>">
</div>

<section class=" p-t-50 p-b-40 flex-col-c-m bg-light">
   <h2 class="l-text4 t-center warna"> <?= $title ?> </h2>
   <?php if(isset($kategori)) : ?>
      <h4 class="m-text13 t-center warna"><?= $kategori ?></h4>
   <?php endif; ?>
   <p class="m-text13 t-center warna"> <?= $konfigurasi['tagline'] ?> </p>
</section>

<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">

<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
<div class="leftbar p-r-20 p-r-0-sm">

<div class="wrap_menu">
<nav class="menu">
<ul class="main_menu">
<li>
   <p class="m-text15 font-weight-bold" >Kategori Parts Motor</p>
   <ul class="sub_menu">
   <?php foreach($listing_kategorir2 as $listing_kategorir2) :?>
      <li>
         <a href="<?= base_url() ?>produk/kategorir2/<?= $listing_kategorir2['slug_kategori'] ?>" >
            <?= $listing_kategorir2['nama_kategori'] ?>
         </a>
      </li>
   <?php endforeach; ?>
   </ul>
</li>
</ul>
</nav>
</div>

<div class="wrap_menu">
<nav class="menu">
<ul class="main_menu">
<li>
   <p class="m-text15 font-weight-bold" >Kategori Parts Mobil</p>
   <ul class="sub_menu">
   <?php foreach($listing_kategorir4 as $listing_kategorir4) :?>
      <li>
         <a href="<?= base_url() ?>produk/kategorir4/<?= $listing_kategorir4['slug_kategori'] ?>">
            <?= $listing_kategorir4['nama_kategori'] ?>
         </a>
         <?php endforeach; ?>
      </li>
   </ul>
</li>
</ul>
</nav>
</div>


</div>
</div>

<!-- content produk -->
<div class="col-sm-6 col-md-8 col-lg-9 p-b-50" id="content-produk">
<div class="row">
<?php if($produk != NULL) : ?>
<?php foreach($produk as $produk):?>
<?php $periode = strtotime($produk['tanggal_post'])  + (30*60*60*24) ?>

<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
<div class="block2">

<form action="<?= base_url() ?>belanja/add" method='post'>
   <input type="hidden" name='id' value='<?= $produk['id_produk']?>' >
   <input type="hidden" name='qty' value=1 >

   <?php if(strtotime($produk['tanggal_mulai_diskon']) <= strtotime(date('Y-m-d')) && strtotime($produk['tanggal_akhir_diskon']) >= strtotime(date('Y-m-d')) ) : ?>
      <input type="hidden" name='price' value='<?= $produk['harga_diskon'] ?>'>
   <?php else: ?>
      <input type="hidden" name='price' value='<?= $produk['harga'] ?>'>
   <?php endif; ?>
   
   <input type="hidden" name='name' value='<?= $produk['nama_produk'] ?>'>
   <input type="hidden" name='redirect_page' value='<?= current_url() ?>'>


   <div class="block2-img wrap-pic-w of-hidden pos-relative <?php if(strtotime($produk['tanggal_mulai_diskon']) <= strtotime(date('Y-m-d')) && strtotime($produk['tanggal_akhir_diskon']) >= strtotime(date('Y-m-d')) ) : ?>
      <?php echo 'block2-labelsale' ?>
   <?php elseif($periode >= time() ) : ?>
      <?php echo 'block2-labelnew' ?>
   <?php endif; ?>">

         <img src="<?= base_url() ?>assets/upload/image/thumbs/<?= $produk['gambar'] ?>" alt="<?= $produk['gambar'] ?>">

      <div class="block2-overlay trans-0-4">
         <div class="block2-btn-addcart w-size1 trans-0-4">
            <button type='submit' value='submit' class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
               <span class="fa fa-plus"> Keranjang</span>
            </button>
         </div>
      </div>

   </div>

   <div class="block2-txt p-t-20">
   
      <a href="<?= base_url('produk/detail/'. $produk['slug_produk']) ?>" class="block2-name dis-block s-text3 p-b-5">
         <?= $produk['nama_produk'] ?>
      </a>

      <?php if(strtotime($produk['tanggal_mulai_diskon']) <= strtotime(date('Y-m-d')) && strtotime($produk['tanggal_akhir_diskon']) >= strtotime(date('Y-m-d')) ) : ?>
         <span class="block2-oldprice m-text7 p-r-5">
            IDR <?= number_format($produk['harga'], '0', ',', '.') ?>
         </span>
         <span class="block2-newprice m-text8 p-r-5">
            IDR <?= number_format($produk['harga_diskon'], '0', ',', '.') ?>
         </span>
      <?php else : ?>
         <span class="block2-price m-text6 p-r-5">
            IDR <?= number_format($produk['harga'], '0', ',', '.') ?>
         </span>
      <?php endif; ?>

   </div>

</div>
</div>
</form>
<?php endforeach; ?>

<?php else : ?>
   <p class="m-text17 font-weight-bold mx-auto" >Data Tidak Ada</p>
<?php endif; ?>

</div>
   <?php if($produk != NULL) : ?>
   <div class="pagination flex-m flex-w p-t-26 justify-content-center">
      <?= $pagination ?>
   </div>
   <?php endif; ?>
</div>   

</div>
<!-- row -->
</div>
<!-- container -->
</section>