</div>
<!-- /.content wraper-->
<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2021 | Argopuro Kurir.</strong>
  <div class="float-right">
    <a href="#"><i class="fab fa-instagram-square fa-2x"></i></a>
    <a href="#"><i class="fab fa-twitter-square fa-2x"></i></a>
    <a href="#"><i class="fab fa-google-plus-square fa-2x"></i></a>
    <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
  </div>
</footer>
<!-- Control Sidebar -->
<!-- <aside class="control-sidebar control-sidebar-dark"> -->
<!-- Control sidebar content goes here -->
<!-- </aside> -->
<!-- /.control-sidebar -->
</div>
<!-- /.wraper -->


<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- starter template -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="<?= base_url() ?>assets/js/vendor/jquery.slim.min.js"><\/script>')
</script>
<script src="<?= base_url() ?>assets/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  // handling click button search
  var container = document.getElementById('container');
  var cari = document.getElementById('search');
  var keyword = document.getElementById('keyword');

  // cari.style.display = 'none';

  keyword.addEventListener('keyup', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        container.innerHTML = xhr.responseText;
        // console.log(xhr.responseText);
      }
    }
    xhr.open('get', '<?= base_url('kurir/ajax') ?>?keyword=' + keyword.value, true);
    xhr.send();
  });
</script>
<!-- <script>
  // handling click button search
  $('#search').on('click', '.action-edit', function(e) {
    e.preventDefault();
    var id_tag = $(this).attr('id');

    $.ajax({
      url: "<?= base_url('kurir/ajax'); ?>",
      method: "post",
      data: {
        ajax_menu: 'search',
        id_tag: id_tag,
      },
      success: function(data) {
        $('#modal-edit-body').html(data);
      }
    });
  })
</script> -->
<script>
  $(function() {
    $('#Tables').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>