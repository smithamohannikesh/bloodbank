
<!-- jQuery 2.1.4 -->

<!-- Bootstrap 3.3.5 -->
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="<?= base_url() ?>assets/dist/js/app.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/validation.js"></script>


<script src="<?= base_url() ?>assets/plugins/select2/select2.full.min.js"></script>


<script>
      $(function () {
             $(".select2").select2();
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    
