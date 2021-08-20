$(function() {
   const flashCart = $('.flash-cart').data('flashdata')

   if(flashCart){
      return Swal.fire({
         position: 'center',
         title: 'Produk',
         text: 'Berhasil' + flashCart,
         icon: 'success',
         showconfirmButton: false,
         timer: 2000
      })
   }
})