<section class="p-t-50 p-b-40 flex-col-c-m bg-light hal-checkout" >
   <h2 class="l-text4 t-center warna"> <?= $title ?> </h2>
</section>

<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">

<div class="container-table-cart pos-relative">
<div class="wrap-table-shopping-cart bgwhite">


<table class="table-shopping-cart">

   <tr class="table-head">
      <th class="column-1"></th> 
      <th width='20%'>Produk</th>
      <th class="column-3 text-center">Harga</th>
      <th class="text-center" width="10%">Jumlah</th>
      <th class="text-center" width="10%">Sub.Berat</th>
      <th class="column-5 text-center ">Subtotal</th>
   </tr>

<?php $data_berat = []; ?>
<?php foreach($keranjang as $keranjang) :?>
<?php $produk = $this->produk_model->listingbyid($keranjang['id']);?>
<?php $berat = $produk['berat'] * $keranjang['qty'] ?>
<?php $data_berat[] = $berat; ?>

<form >

<tr class="table-row">
   <td class="column-1">
      <div class="cart-img-product b-rad-4 o-f-hidden">
         <img src="<?= base_url() ?>assets/upload/image/thumbs/<?= $produk['gambar'] ?>" alt="<?= $produk['gambar'] ?>">
      </div>
   </td>

   <td class="column-2"><?= $keranjang['name'] ?> (<?= number_format($produk['berat'], '0',',','.')  ?> Gr)</td>

   <td class="column-1">IDR. <?= number_format($keranjang['price'], '0', ',', '.') ?></td>

   <td class="text-center">
      <?= number_format($keranjang['qty'], '0',',','.')  ?>
   </td>

   <td class="text-center">
      <?= number_format($berat, '0',',','.')  ?> Gr
   </td>

   <td class="column-5 text-center">IDR.<?php $sub_total = $keranjang['price'] * $keranjang['qty']; 
      echo number_format($sub_total, '0', ',', '.');?>
   </td>

</tr>
</form>
<?php endforeach; ?>


<tr class='table-row bg-light font-weight-bold'>
   <td colspan="5" class='column-1'>Total Pembelian</td>
   <td colspan='2' class='column-2 text-center'>IDR. <?= number_format($total_belanja, '0', ',', '.') ?></td>
</tr>

</table>
</div>
<!-- /wrap table -->
</div>
<!-- /container table -->
<?php $total_berat = 0; ?>
   <?php for($i=0; $i < count($data_berat); $i++ ) : ?>
   <?php $total_berat += $data_berat[$i] ?>
<?php endfor; ?>

<form action="<?= base_url() ?>belanja/checkout" method='post'>
<?php $kode_transaksi = date('dmY').random_string('alnum', 8) ?>
<input type="hidden" name='jumlah_transaksi' value='<?= $total_belanja ?>'>
<input type="hidden" name='tanggal_transaksi' value='<?= date('Y-m-d') ?>'>
<input type="hidden" name="kode_transaksi" value='<?= $kode_transaksi ?>'>
<input type="hidden" name="telepon" value='<?= $pelanggan['telepon'] ?>'>
<input type="hidden" name='asal' value="<?= $konfigurasi['id_kota'] ?>">
<input type="hidden" name='id_tujuan' value='<?= $pelanggan['id_kota'] ?>'>
<input type="hidden" name='id_tujuan_provinsi' value='<?= $pelanggan['id_provinsi'] ?>'>
<input type="hidden" name="provinsi" value="">
<input type="hidden" name="kota" value="">
<input type="hidden" name="berat" value="<?= $total_berat ?>">
<input type="hidden" name="ongkir" value="">
<input type="hidden" name="alamat" value="<?= $pelanggan['alamat'] ?>">


<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm shadow">
   <h5 class="m-text20 p-b-24">Detail Total Belanja</h5>

   <div class="flex-w flex-sb-m p-b-12">
      <span class="s-text18 w-size19 w-full-sm">ID Transaksi</span>
      <span class="m-text21 w-size20 w-full-sm">
         <?= $kode_transaksi ?>
      </span>
   </div>

   <div class="flex-w flex-sb-m p-b-12">
      <span class="s-text18 w-size19 w-full-sm">Pembelian</span>
      <span class="m-text21 w-size20 w-full-sm total-pembelian">
         IDR. <?= number_format($total_belanja, '0', ',', '.') ?>
      </span>
   </div>

   
   <div class="flex-w flex-sb-m p-b-12">
      <span class="s-text18 w-size19 w-full-sm">Total Berat</span>
      <span class="m-text21 w-size20 w-full-sm total-berat">
         
      </span>
   </div>
  
<div class="flex-w flex-sb p-b-20">
   <span class="s-text18 w-size19 w-full-sm">Ongkir</span>

<div class="w-size20 w-full-sm">

   <span class="m-text21 w-size20 w-full-sm ongkir">
      IDR. 0
   </span>

   <div class="form-group mt-3">
    <select class="form-control <?php if(form_error('expedisi') != '') { echo 'is-invalid'; } ?>" name="expedisi">
      <option value='<?php null ?>'>--Pilih Expedisi--</option>
      <option value="jne">JNE</option>
      <option value="pos">POS INDONESIA</option>
      <option value="tiki">TIKI</option>
    </select>
    <?php if(form_error('expedisi') != "") : ?>
      <div class="invalid-feedback">Maaf, Expedisi Tidak Boleh Kosong</div>
    <?php endif; ?>
   </div>

  <div class="form-group mt-3">
    <select class="form-control <?php if(form_error('expedisi') != '') { echo 'is-invalid'; } ?>" name="layanan">
      <option value='<?php null ?>'>--Pilih Layanan--</option>
    </select>
    <?php if(form_error('layanan') != "") : ?>
      <div class="invalid-feedback">Maaf, Layanan Tidak Boleh Kosong</div>
    <?php endif; ?>
  </div>

</div>
</div>

   <div class="flex-w flex-sb-m p-t-26 p-b-30">
      <span class="m-text22 w-size19 w-full-sm">Total:</span>
      <span class="m-text21 w-size20 w-full-sm total-belanja">-</span>
   </div>

<div class="size15 trans-0-4">
   <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
      Pesan Sekarang
   </button>
</div>

</form>



</div>
<!-- /container -->
</section>