<!DOCTYPE html>
<html lang="en">
<head>
   <!-- icon -->
   <link rel="icon" type="image/png" href="<?= base_url() ?>assets/upload/image/<?= $konfigurasi['icon']; ?>" >
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?></title>
   <style type='text/css' media='print'>
      body {
         font-size: 12px;
         font-family: arial;
      }

      table {
         border: solid;
         border-collapse: collapse;
         width: 100%;
         margin-bottom: 1cm;

      }

      td {
         padding: 6px 12px;
         border: solid;
         text-align: left;
      }
      
   
   </style>
</head>
<body>
   <div style='width: 19cm; height: 27cm; padding-top: 1cm; '>
      <h1 style='text-align: center; font-size: 18px; font-weight: bold; border-top:solid thin #EEE; padding-top: 20px;'>INVOICE</h1>
      <h6 style='font-size: 13px; font-weight: bold; text-align: center;'>
         ID :<?= $header_transaksi['kode_transaksi'] ?>
      </h6>
         <table>
            <tr>
               <td>
                  <strong>PENGIRIM :</strong>
                  <P>
                     <?= $konfigurasi['namaweb'] ?><br>
                     <?= $konfigurasi['alamat'] ?><br>
                     No.Telepon : <?= $konfigurasi['telepon'] ?>
                  </P>
               </td>

               <td>
                  <strong>PENERIMA :</strong>
                  <P>
                     <?= $header_transaksi['nama_pelanggan'] ?><br>
                     <?= $header_transaksi['alamat'] ?>, <?= $header_transaksi['kota'] ?>, <?= $header_transaksi['provinsi'] ?><br>
                     No.Telepon : <?= $header_transaksi['telepon'] ?>
                  </P>
               </td>
            </tr>
         </table>

    

      <table width='100%' >
      <thead >
         <tr >
            <th>NO</th>
            <th>KODE PRODUK</th>
            <th>NAMA PRODUK</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
            <th>SUB TOTAL</th>
         </tr>
      </thead>
      <tbody >
         <?php $i=0; foreach($transaksi as $transaksi) : ?>
         <tr>
            <td><?= $i+=1 ?></td>
            <td><?= $transaksi['kode_produk'] ?></td>
            <td><?= $transaksi['nama_produk'] ?></td>
            <td><?= number_format($transaksi['jumlah'], '0', ',', '.') ?></td>
            <td>IDR.<?= number_format($transaksi['harga'], '0', ',', '.')?></td>
            <td>IDR.<?= number_format($transaksi['total_harga'], '0', ',', '.') ?></td>
         </tr>
         <?php endforeach; ?>
         <tr>
            <td colspan='5' style='text-align: center;'>ONGKOS KIRIM (<?= strtoupper($header_transaksi['expedisi']) ?> <?= $header_transaksi['layanan'] ?> <?= number_format($header_transaksi['berat'], '0',',','.') ?> Gr)</td>
            <td>IDR.<?= number_format($header_transaksi['ongkir'], '0', ',', '.') ?></td>
         </tr>
         <tr>
            <td colspan='5' style='text-align: center;'>TOTAL BELANJA</td>
            <td>IDR.<?= number_format($header_transaksi['jumlah_transaksi']+$header_transaksi['ongkir'], '0', ',', '.') ?></td>
         </tr>
      </tbody>
   </table>

   </div>
</body>
</html>