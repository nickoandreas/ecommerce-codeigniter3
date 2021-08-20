$(function() {

const flashData = $('.flash-data').data('flashdata');
const flashKategori = $('.flash-kategori').data('flashdata');
const flashProduk = $('.flash-produk').data('flashdata');
const flashGambar = $('.flash-gambar').data('flashdata');
const flashKonfigurasi = $('.flash-konfigurasi').data('flashdata');
const flashRekening = $('.flash-rekening').data('flashdata');
const flashStatusBayar = $('.flash-status').data('flashdata');
const flashStatusKirim = $('.flash-status-update').data('flashdata');
const flashResi = $('.flash-resi').data('flashdata');
const flashBatalPesanan = $('.flash-batal-pesanan').data('flashdata');


if(flashData) {  
   return swal.fire({
      title: 'Data Pengguna',
      text: 'Berhasil ' + flashData,
      icon: 'success'
    });
    
  };

if(flashKategori){
  return swal.fire({
    title: 'Data Kategori',
    text: 'Berhasil ' + flashKategori,
    icon: 'success'
  });

};

if(flashProduk) {
  return swal.fire({
    title: 'Data Produk',
    text: 'Berhasil ' + flashProduk,
    icon: 'success'
  });
};

if(flashGambar) {
  return swal.fire({
    title: 'Gambar Produk',
    text: 'Berhasil ' + flashGambar,
    icon: 'success'
  });
};

if(flashKonfigurasi) {
  return swal.fire({
    title: 'Data Website',
    text: 'Berhasil ' + flashKonfigurasi,
    icon: 'success'
  });
};

if(flashRekening) {
  return swal.fire({
    title: 'Data Rekening',
    text: 'Berhasil ' + flashRekening,
    icon: 'success'
  });
};

if(flashStatusBayar) {
  return swal.fire({
  title: 'Pembayaran',
  text: 'Berhasil ' + flashStatusBayar,
  icon: 'success'
});
};

if(flashStatusKirim) {
  return swal.fire({
    title: 'Status Pesanan',
    text: 'Berhasil ' + flashStatusKirim,
    icon: 'success'
  })
}

if(flashResi) {
  return swal.fire({
    title: 'NO RESI',
    text: 'Berhasil ' + flashResi,
    icon: 'success'
  })
}

if(flashBatalPesanan) {
  return swal.fire({
    title: "PESANAN",
    text: 'Berhasil ' + flashBatalPesanan,
    icon: 'success'
  })
}


});

