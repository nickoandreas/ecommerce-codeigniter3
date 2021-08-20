<section class="bgwhite p-t-55 p-b-65">
<div class="container">
<div class="row">

<div class="col-lg p-b-50">

      <?php if($this->session->flashdata('flash')) :?>
         <div class='alert alert-success mt-2' align='center'> 
            <?= $this->session->flashdata('flash') ?>
         </div>
      <?php endif; ?>

      <?php if($this->session->flashdata('upload_gagal')) :?>
         <div class='alert alert-danger mt-2' align='center'> 
            <?= $this->session->flashdata('upload_gagal') ?>
         </div>
      <?php endif; ?>

      <?php if($header_transaksi): ?>

      <?php foreach($header_transaksi as $header_transaksi) : ?>
            <div class="card text-center mt-3">
               <div class="card-header font-weight-bold">
                 <?= $title ?>
               </div>
               <div class="card-body bg-light">
                  <h5 class="card-title font-weight-bold"><?= $header_transaksi['kode_transaksi']; ?></h5>
                  <p class="card-text">JUMLAH ITEM : <?= $header_transaksi['total_item']  ?></p>
                  <p class="card-text">TOTAL BELANJA : IDR. <?= number_format($header_transaksi['jumlah_transaksi']+$header_transaksi['ongkir'], '0', ',', '.')  ?></p>
                  <p class="card-text">REKENING KAMI :</p>
                  <?php for($i=0; $i < count($rekening); $i++) : ?>
                     <p class="card-text"><?= $rekening[$i]['nama_bank'] ?> : <?= $rekening[$i]['nomor_rekening'] ?> (<?= $rekening[$i]['nama_pemilik'] ?>) </p>
                  <?php endfor; ?>
                  <a href="#" class="btn btn-dark hov1 bo-rad-20 mr-2 p-l-25 p-r-25 mt-2" data-toggle="modal" data-target="#modal_konfirmasi-<?= $header_transaksi['kode_transaksi'] ?>">Konfimasi</a>
                  <a href="<?= base_url() ?>dashboard/detail/<?= $header_transaksi['kode_transaksi'] ?>" class="btn btn-dark bo-rad-20 hov1 p-l-25 p-r-25 mt-2 mr-2">Detail</a>
                  <a href="<?= base_url() ?>dashboard/hapus/<?= $header_transaksi['kode_transaksi'] ?>" class="btn btn-dark bo-rad-20 hov1 p-l-25 p-r-25 mt-2">Batalkan</a>
               </div>
            </div>

            <!-- modal -->
            <div class="modal fade" id="modal_konfirmasi-<?= $header_transaksi['kode_transaksi'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">

                  <div class="modal-header">
                  <h5 class="modal-title font-weight-bold " id="exampleModalLabel">KONFIRMASI PEMBAYARAN</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>

                  <div class="modal-body">
                  <form action="dashboard/konfirmasi/<?= $header_transaksi['kode_transaksi'] ?>" method='post' enctype='multipart/form-data' class='was-validated'>

                     <div class="form-group">
                        <label >Pembayaran Ke Rekening</label>
                        <select name="id_rekening" class='custom-select border border-dark'  required> 
                           <option value="<?php null ?>" >Pilih Rekening Tujuan...</option>
                           <?php for($i=0; $i < count($rekening); $i++) : ?>
                           <option value="<?= $rekening[$i]['id_rekening'] ?>">
                              <?= $rekening[$i]['nama_bank'] ?>: <?= $rekening[$i]['nomor_rekening'] ?> (<?= $rekening[$i]['nama_pemilik'] ?>)
                           </option>
                           <?php endfor; ?>
                        </select>
                        <div class="valid-feedback">Pastikan Rekening Tujuan Sama Dengan Bukti Pembayaran</div>
                        <div class="invalid-feedback">Maaf, Tidak Boleh kosong</div>
                     </div>

                     <div class="form-group">
                        <label  class="col-form-label ">Tanggal Bayar</label>
                        <input type="date" name='tanggal_bayar' class='form-control border border-dark' required >
                        <div class="invalid-feedback">Maaf, Tidak Boleh Kosong</div>
                     </div>

                     <div class="form-group">
                        <label  class="col-form-label">Jumlah Pembayaran</label>
                        <input type="text" name="jumlah_bayar" class='form-control border border-dark' placeholder='Jumlah Pembayaran' required>
                        <div class="invalid-feedback">Maaf, Tidak Boleh Kosong</div>
                     </div>

                     <div class="form-group">
                        <label class="col-form-label"> Dari Bank </label>
                        <input type="text" class='form-control border border-dark' name='nama_bank' placeholder='Misal : Bank BCA' required>
                        <div class="invalid-feedback">Maaf, Tidak Boleh Kosong</div>
                     </div>

                     <div class="form-group">
                        <label class="col-form-label ">Dari No.Rekening</label>
                        <input type="text" class='form-control border border-dark' name='rekening_pembayaran' placeholder='020156xxxxx' required>
                        <div class="invalid-feedback">Maaf, Tidak Boleh Kosong</div>
                     </div>

                     <div class="form-group">
                        <label  class="col-form-label ">Nama Pemilik Rekening</label>
                        <input type="text" class='form-control border border-dark' name='rekening_pelanggan' placeholder='Nama Pemilik Rekening' required >
                        <div class="invalid-feedback">Maaf, Tidak Boleh Kosong</div>
                     </div>

                     <div class="form-group">
                        <label  class="col-form-label ">Bukti Pembayaran</label>
                        <input type="file" class='form-control-file' name='bukti_bayar' placeholder='Bukti Pembayaran' required>
                        <div class="invalid-feedback">Maaf, Tidak Boleh Kosong (Max.2,4MB)</div>
                     </div> <hr>

                     <button type="submit" name='submit' class="btn btn-dark hov1 bo-rad-20 p-l-25 p-r-25" >Submit</button>

                     <button type='reset' name='reset'class="btn btn-dark hov1 bo-rad-20 p-l-25 p-r-25 ">Hapus</button>
                    

                  </form>
                  </div>

               </div>
            </div>
            </div>
         <?php endforeach; ?>

         <?php else : ?>

            <div class="card text-center">
               <div class="card-header font-weight-bold">
                 <?= $title ?>
               </div>
               <div class="card-body bg-light">
                  <h5 class="card-title font-weight-bold">MAAF SAAT INI TIDAK ADA TRANSAKSI</h5>
                  <p class="card-text">Silahkan Mulai Melakukan Transaksi Dengan Belanja Sparepart Kendaraan Anda</p>
                  <a href="<?= base_url('produk') ?>" class="btn btn-dark bo-rad-20 p-l-25 p-r-25 mt-2">Mulai Belanja</a>
               </div>
            </div>

         <?php endif; ?>
   
</div>   

</div>
<!-- row -->
</div>
<!-- container -->
</section>

