
<section class="bgwhite p-t-70 p-b-100">
<div class="container">

<div class="pos-relative">
<div class="bgwhite">

<h1 align='center'><b><?= $title ?></b></h1><hr>
<div class='clearfix'></div>
<br><br>

<?php if($this->session->flashdata('sukses_registrasi')) :?>
   <div class='alert alert-info ' align='center'> 
      <?= $this->session->flashdata('sukses_registrasi') ?>
   </div>
<?php endif; ?>

<p class='alert alert-success' align='center'>Registrasi Berhasil, Silahkan  <a href="<?= base_url('masuk') ?>" class='btn btn-info btn-sm'>Masuk Disini</a></p>



</div>
<!-- /wrap table -->
</div>
<!-- /container table -->
</div>
<!-- /container -->
</section>