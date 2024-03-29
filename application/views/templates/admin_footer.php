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
</div>
<!-- /.wraper -->


<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<!-- ChartJS -->
<!-- <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script> -->
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- overlayScrollbar -->
<script>
  // $(function() {
  //   //The passed argument has to be at least a empty object or a object with your desired options
  //   $("body").overlayScrollbars({});
  // });
  var osInstance = $('body').overlayScrollbars({}).overlayScrollbars();

  $('body').on('show.bs.modal', function() {
    setTimeout(function() {
      var osContentElm = $(osInstance.getElements().content);
      var backdropElms = $('body > .modal-backdrop');
      backdropElms.each(function(index, elm) {
        osContentElm.append(elm);
      });
    }, 1);
  });
</script>
<!-- ajax live search jQuery-->
<script>
  $(document).ready(function() {
    $('#keyword').on('keyup', function(e) {
      $('#container').load('<?= base_url('kurir/ajax') ?>?keyword=' + $('#keyword').val());
    });
  });
</script>
<script>
  $('#berat').on('keyup', function() {
    let ongkir = $('#berat').val() * 6500;
    // console.log(ongkir);
    $('#ongkir').attr("value", ongkir)
  });
</script>
<!-- ajax live search -->
<!-- <script>
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
</script> -->

<script>
  $(document).ready(function() {
    $('#Tables').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "dom": 'Bfrtip',
      buttons: [{
        className: 'btn-success btn-round btn-sm mr-2',
        extend: 'excelHtml5',
        text: 'Cetak (Excel) <i class="fa fa-file-excel-o"></i>',
        title: 'Data Pesanan'
      }],
    });
  });
</script>

<!-- Sweet Alert -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
  function displayAlert(deleteUrl) {
    Swal.fire({
      title: 'Apakah anda yakin ingin menghapusnya?',
      text: 'Data yang sudah di hapus tidak bisa di kembalikan lagi.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        window.location.href = deleteUrl;
      }
    })
  }

  const deleteButtons = [
    '.btn-danger',
  ]

  for (const btn of deleteButtons) {
    $(btn).on('click', function(e) {
      displayAlert($(this).data('url'));
    });
  }
</script>
<!-- End Sweet Alert -->
</body>

</html>