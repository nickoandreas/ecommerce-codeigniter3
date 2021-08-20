$(function() {

$('.tombolHapus').on('click',function(e) {

   e.preventDefault();

   const linkHapus = $(this).attr('href');
   swal.fire({
      title: 'Yakin Hapus Data ?',
      text: 'Data Akan Dihapus Secara Permanen !',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus'
   }).then((result) => {
      if(result.isConfirmed) {
         document.location.href = linkHapus;
      }
   });


});

$('.logout').on('click',function(e) {

   e.preventDefault();

   const linkHapus = $(this).attr('href');
   swal.fire({
      title: 'Yakin Keluar Halaman ?',
      text: '',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Keluar'
   }).then((result) => {
      if(result.isConfirmed) {
         document.location.href = linkHapus;
      }
   });


});


})