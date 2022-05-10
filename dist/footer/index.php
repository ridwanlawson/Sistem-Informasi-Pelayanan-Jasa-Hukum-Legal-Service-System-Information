<?php 
  $sql = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan = 1");
  $juduls = $sql->fetch_object();
 ?>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?php echo date('Y'); ?> <div class="bullet"></div> Design By <a href="https://instagram.com/ridwanlawson"><?php echo $juduls->nm_perusahaan; ?></a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.js"></script>
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/modules/select2/dist/js/select2.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <script src="assets/modules/jquery.sparkline.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <script src="assets/modules/sweetalert/modules-sweetalert.js"></script>
  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>
  <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
  <script src="assets/modules/izitoast/js/modules-toastr.js"></script>
<!--   <script src="assets/modules/modal/jquery.min.js"></script>
  <script src="assets/modules/modal/popper.min.js"></script>
  <script src="assets/modules/modal/bootstrap.min.js"></script> -->

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/modules-datatables.js"></script>
  <script src="assets/js/page/bootstrap-modal.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/forms-advanced-forms.js"></script>
  <script src="assets/js/page/auth-register.js"></script>
  <!-- <script src="assets/js/page/components-chat-box.js"></script> -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

<?php if (@$_GET['res'] == 'sukses'): ?>
<script type="text/javascript">
  iziToast.show({
    icon: 'fas fa-check',
    title: 'Berhasil',
    message: 'Selamat Anda Berhasil!',
    position: 'topCenter',
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
  });
</script>
<?php elseif (@$_GET['res'] == 'gagal'): 
$data = str_replace("'"," ",$_GET['cau']);;
  ?>
<script type="text/javascript">
  iziToast.show({
    icon: 'fas fa-times',
    title: 'Gagal',
    message: 'Maaf Anda Gagal Karena : <?php echo $data ?>!',
    position: 'topCenter',
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
  });
</script>
<?php elseif (@$_GET['res'] == 'sudah'): ?>
<script type="text/javascript">
  iziToast.show({
    icon: 'fas fa-bookmark',
    title: 'Maaf',
    message: 'File ini sudah ada, silahkan cek tersimpan anda!',
    position: 'topCenter',
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
  });
</script>
<?php endif ?>
  <script type="text/javascript">

    $(document).ready(function(){

        $('#show').on('show.bs.modal', function (e) {

            var getDetail = $(e.relatedTarget).data('id');

            /* fungsi AJAX untuk melakukan fetch data */

            $.ajax({

                type : 'post',

                url : '<?php echo $direct ?>detail.php',

                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */

                data :  'getDetail='+ getDetail,

                /* memanggil fungsi getDetail dan mengirimkannya */

                success : function(data){

                $('.modal-data').html(data);

                /* menampilkan data dalam bentuk dokumen HTML */

                }

            });

         });

    });

  </script>
</body>
</html>