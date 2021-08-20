<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">

<div class="col-lg p-b-50">

<div class="card text-center ">
   <div class="card-header ">
      <h4 class="font-weight-bold"><?= $title ?></h4>
   </div>
   <div class="card-body bg-light">
      <h5 class="card-title font-weight-bold">TERIMA KASIH</h5>
      <h5 class="card-title font-weight-bold">PESANAN ANDA AKAN KAMI SEGERA PROSES</h5>
      <p class="card-text">Cara Melakukan Pembayaran :</p>
      <p class="card-text">Silahkan Melakukan Pembayaran Ke Salah Satu Rekening Kami :</p>
      <?php foreach($rekening as $rekening) : ?>
      <p class="card-text"><?= $rekening['nama_bank'] ?> : <?= $rekening['nomor_rekening'] ?> (<?= $rekening['nama_pemilik'] ?>) </p>
      <?php endforeach; ?>
      <br>
      <p class="card-text">Selanjutnya Lakukan Konfirmasi Pembayaran dan Meng-Upload Bukti Pembayaran/Transfer</p>
      <p class="card-text font-weight-bold">Pastikan Saat Melakukan Konfirmasi Pembayaran, Data Sesuai Dengan Bukti Pembayaran/Transfer</p>
      <a href="<?= base_url() ?>dashboard" class="btn btn-dark bo-rad-20 p-l-25 p-r-25 mt-2 hov1 ">Konfirmasi Pembayaran</a>
   </div>
</div>


</div>   

</div>
<!-- row -->
</div>
<!-- container -->
</section>