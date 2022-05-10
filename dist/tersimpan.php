<?php
include 'header/index.php';
?>
<style type="text/css">
  .list-group{
    max-height: 300px;
    margin-bottom: 10px;
    overflow:scroll;
    -webkit-overflow-scrolling: touch;
  }
</style>
      <div class="main-content">
        <section class="section">
            
              <form action="proses.php" method="post">
              <?php 
               ?>
                  <div class="card">
                    <div class="card-header">
                      <h4>File Tersimpan</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                          <div class="list-group">
                              <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1">File Tersimpan</h5>
                                </div>
                                <p class="mb-1">
                            <?php 
                              $query = "SELECT jasa.*, transaksi.* 
                                        FROM jasa, transaksi
                                        WHERE jasa.id_jasa = transaksi.id_jasa 
                                        AND transaksi.id_user = $_SESSION[id]
                                        AND status = 'tersimpan' order by id_transaksi desc";
                              $result = $conn->query($query) or die(mysqli_error($conn));
                              if (mysqli_num_rows($result)>0) { ?>
                            <?php 
                              } 
                            ?>
                                </p>
                              </div>
                            <?php 
                              $no = 1;
                              if (mysqli_num_rows($result)>0) {
                                while ($data = $result->fetch_object()) {
                               ?>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                  <div class="row">
                                    <div class="col-12 col-md-6 col-lg-3" style="margin-top: 10px">
                                      <iframe src="assets/img/file/<?= $data->file ?>" width="100%" height="100%"></iframe>
                                    </div>
                                    <div class="col-12 col-md-9 col-lg-8" style="margin-top: 10px">
                                      <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1"><a href="detail.php?idjasa=<?= $data->id_jasa ?>" style="text-decoration: none;color: black"><?= $data->nm_jasa ?></a></h6>
                                        <small><?= selisih($data->timestampp_pemesanan) ?></small>
                                      </div>
                                      <p class="mb-2"><?= ucwords($data->mahasiswa) ?></p>
                                      <small><?= date('d-m-Y H:i:s', strtotime($data->timestampp_pemesanan)) ?></small><br>
                                      <a href="tersimpan_delete.php?id=<?= $data->id_jasa ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                  </div>
                                </div>
                              <?php 
                                } 
                              } else { ?>
                              <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1">Tidak Ada Yang Tersimpan</h5>
                                </div>
                              </div>
                              <?php
                                } 
                              ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
             </form>
        </section>
      </div>
<script type="text/javascript">
</script>
<?php
include 'footer/index.php';
?>
<script type="text/javascript">
$(document).ready(function() {
  $("#select_all").click(function() {
    $(".child").prop("checked", this.checked);
  });

  $('.child').click(function() {
    if ($('.child:checked').length == $('.child').length) {
      $('#select_all').prop('checked', true);
    } else {
      $('#select_all').prop('checked', false);
    }
  });
});

$(function(){
  $("input[type='checkBox']").change(function(){
    var len = $("input[type='checkBox']:checked").length;
    if(len == 0)
      $("button[type='submit']").prop("disabled", true).removeClass('form-control btn-primary').addClass('form-control btn btn-secondary');
    else
      $("button[type='submit']").removeAttr("disabled").removeClass('form-control btn-secondary').addClass('form-control btn btn-primary');
  });
  $("input[type='checkBox']").trigger('change');
});
</script>