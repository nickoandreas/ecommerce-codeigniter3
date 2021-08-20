
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jquery -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- bootstrap 4.5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- datatables -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>/assets/adminlte/plugins/datepicker/js/bootsrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- sweetalert -->
<script src="<?= base_url() ?>/assets/template/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/sweetconfirm.js"></script>
<script src="<?= base_url() ?>/assets/template/js/scriptsweet.js"></script>
<!-- ckeditor -->
<script> initSample(); </script>

<script>
  $(function () {
    
    // data table
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('.datepicker').datepicker({
      'format' : 'dd-mm-yyyy',
      'autoclose' : true
    });

  });
</script>
</body>
</html>