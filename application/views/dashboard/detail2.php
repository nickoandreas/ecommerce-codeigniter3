<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row"> 
<div class="col-lg-12">
   
      <h4 class='font-weight-bold'><?= $title ?></h4><hr>
            <div class="table-resposive">
            <?php if($header_transaksi): ?>
            <table class='table table-striped'>
               <thead >
                  <tr>
                     <td width='20%'>KODE TRANSAKSI</td>
                     <td>: <?= $header_transaksi['kode_transaksi'] ?></td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Tanggal Checkout</td>
                     <td>: <?= date('d-m-Y', strtotime($header_transaksi['tanggal_transaksi'])) ?></td>
                  </tr>
                  <tr>
                     <td>Tanggal Bayar</td>
                     <td>: <?php if(isset($header_transaksi['tanggal_bayar'])) {echo date('d-m-Y', strtotime($header_transaksi['tanggal_bayar'])); } else { echo 'Belum Melakukan Konfirmasi Pembayaran';} ?> </td>
                  </tr>
                  <tr>
                     <td>Tanggal Kirim</td>
                     <?php if($header_transaksi['tanggal_kirim'] != null) : ?>
                        <td>: <?= date('d-m-Y', strtotime($header_transaksi['tanggal_transaksi'])) ?></td>
                     <?php else : ?>
                        <td>: Pesanan Belum Dikirim</td>
                     <?php endif; ?>
                  </tr>
                  <tr>
                     <td>Total Pembelian</td>
                     <td>: IDR.<?= number_format($header_transaksi['jumlah_transaksi'], '0', ',', '.') ?></td>
                  </tr>
                  <tr>
                     <td>Ongkos Kirim</td>
                     <td >: IDR.<?= number_format($header_transaksi['ongkir'], '0', ',', '.') ?> (<?= strtoupper($header_transaksi['expedisi']) ?> <?= $header_transaksi['layanan'] ?> <?= number_format($header_transaksi['berat'], '0',',','.') ?> Gr)</td>
                  </tr>
                  <tr>
                     <td>Total Belanja</td>
                     <td>: IDR.<?= number_format($header_transaksi['ongkir']+$header_transaksi['jumlah_transaksi'], '0', ',', '.') ?></td>
                  </tr>
                  <tr>
                     <td>Status</td>
                     <td>: <?=$header_transaksi['status_bayar'] ?></td>
                  </tr>
                  <tr>
                     <td>No.Resi</td>
                     <?php if($header_transaksi['resi'] != null) : ?>
                        <td>: <?= $header_transaksi['resi'] ?></td>
                     <?php else : ?>
                        <td>: Belum Ada No Resi</td>
                     <?php endif; ?>
                  </tr>
                  <tr>
                     <td>Invoice</td>
                     <?php if($header_transaksi['jumlah_bayar'] != null) : ?>
                        <td>: <a href="<?= base_url() ?>admin/transaksi/invoice/<?= $header_transaksi['kode_transaksi'];?>" class="badge badge-warning" target="_blank"> Lihat Invoice</a></td>
                     <?php else : ?>
                        <td>: Belum Ada Invoice</td>
                     <?php endif; ?>
                  </tr>
               </tbody>
            </table>
            </div>
            
            <div class="wrap-slick2">
            <div class="slick2">
            <?php foreach($transaksi as $produk) : ?>
            <div class="item-slick2 p-l-15 p-r-15">
            <div class="card mr-1 mt-1 bg-light">

               <div class="block2-img wrap-pic-w of-hidden pos-relative">
                  <img src="<?= base_url() ?>assets/upload/image/thumbs/<?= $produk['gambar'] ?>" class="card-img-top" alt="...">
                  <div class="block2-overlay trans-0-4"> 
                  <div class="block2-btn-addcart w-size1 trans-0-4">
                     <a href="<?= base_url() ?>produk/detail/<?= $produk['slug_produk'] ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                        Lihat Produk
                     </a>
                  </div>
                  </div>
               </div>

               <div class="card-body" style="height: 300px;">
                  <h5 class="card-title"></a><?= $produk['nama_produk'] ?></h5>
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
                  <p class="card-text">Kode Produk    : <?= $produk['kode_produk'] ?></p>
                  <p class='card-text'>Jumlah Item    : <?= number_format($produk['jumlah'], '0', ',', '.') ?></p>
                  <p class='card-text'>Sub Total          : IDR.<?= number_format($produk['total_harga'], '0', ',', '.') ?></p>   
                  </div>
                  
            </div>
            </div>
            <?php endforeach; ?>
            </div>
            </div>
         <?php endif; ?>
   
</div>   

</div>
<!-- row -->
</div>
<!-- container -->
</section>