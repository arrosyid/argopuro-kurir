<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- overlayScrollbar function-->
<script>
  $(function() {
    //The passed argument has to be at least a empty object or a object with your desired options
    $("body").overlayScrollbars({});
  });
</script>
<!-- onkir funtion -->
<script>
  $('#berat').on('keyup', function() {
    let ongkir = $('#berat').val() * 6500;
    // console.log(ongkir);
    $('#ongkir').attr("value", ongkir)
  });
</script>
</body>

</html>