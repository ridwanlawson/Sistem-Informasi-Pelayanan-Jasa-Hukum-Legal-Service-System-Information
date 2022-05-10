<?php
include 'header/index.php';
if (@$_SESSION['id']) {
  $iduser = $_SESSION['id'];
}else{
  $iduser = 0;
}
$waktu = date('Y-m-d H:i:s');
$sql = "INSERT INTO lihat VALUES (null, '$_GET[idjasa]', '$iduser', 1, '$waktu')";
$query = $conn->query($sql);
?>
<style type="text/css">
  .splide__slide img {
    width : 100%;
    height: auto;
  }
</style>
    <link rel="stylesheet" type="text/css" href="assets/modules/images/dist/css/splide.min.css">
    <link rel="stylesheet" type="text/css" href="assets/modules/images/dist/css/themes/splide-skyblue.min.css">
      <div class="main-content">
        <section class="section">
            <div class="row">
              <?php 
                $id = $_GET['idjasa'];
                // echo $id;
                $query = "SELECT jasa.*, jenis.* FROM jasa, jenis WHERE jasa.id_jenis = jenis.id_jenis AND jasa.id_jasa = '$id' group by id_jasa";
                $result = $conn->query($query) or die(mysqli_error($conn));
                while ($data = $result->fetch_object()) {
                  // var_dump($data);
               ?>
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Detail File</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-md-7 col-lg-7">
                            <img src="assets/img/file/<?= $data->gambar ?>" width="100%" height="100%">
                        </div>
                        <div class="col-12 col-md-5 col-lg-5">
                          <div class="media-body"><br>
                            <h5 class=""><?= $data->nm_jenis ?></h5>
                            <small><b>Range Harga <?= $data->gambar ?></b></small><br>
                            <small style="text-align:justify-all;">Rp.<?= number_format($data->hargamin) ?>-Rp.<?= number_format($data->hargamax) ?></small>
                            <!-- <small><br><b>Kasus : <?= $data->keyword ?></b></small> -->
                            <hr>
                          </div>
                          <div class="media-footer">
                              <br>
                              <?php if (empty($_SESSION['id'])): ?>
                                <button  id="swal-5" name="status" class="btn btn-primary"><i class="fas fa-handshake"></i> Konsultasi</button>
                              <?php else: ?>
                                  <div class="btn-toolbar">
                                    <div class="btn-group mr-2">
                                      <form target="_blank" action="proses.php" method="post">
                                      <input type="hidden" class="form-control" name="id_jasa" value="<?= $data->id_jasa ?>">
                                      <input type="hidden" class="form-control" name="file" value="<?= $data->file ?>">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-handshake"></i> Konsultasi</button>

                                      </form>
                                    </div>
                                  </div>
                              <?php endif ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php 
                }
               ?>
            </div>
        </section>
      </div>


      <!-- Modal Insert -->
      <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="proses.php" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label>Pelayan Hukum</label>
                  <div class="input-group">
                    <select class="form-control select2" style="width:100%;" placeholder="userhukum" name="id_userhukum">
                      <?php 

                        $query = "SELECT user.* FROM user WHERE user.level = 'hukum' order by nm_lengkap desc";
                        $result = $conn->query($query) or die(mysqli_error($conn));
                        while ($datah = $result->fetch_object()) {
                       ?>
                          <option value="<?= $datah->id_user ?>"><?= $datah->nm_lengkap ?></option>
                       <?php } ?>
                    </select>
                    <input type="hidden" class="form-control" name="idjenis" value="<?= $_GET['idjasa'] ?>">
                    <input type="hidden" class="form-control" name="iduserbiasa" value="<?= $_SESSION['id'] ?>">
                    <input type="hidden" class="form-control" name="status" value="konsultasi">
                  </div>
                </div>
                <div class="form-group">
                  <label>Judul</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="judul" name="judul">
                  </div>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <div class="input-group">
                    <textarea class="form-control" placeholder="Deskripsi" name="desk"></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- //Modal Insert -->

<!-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script> -->
<script type="text/javascript" src="assets/modules/images/dist/js/splide.js"></script>
<script type="text/javascript" src="assets/modules/images/dist/js/splide.min.js"></script>
<?php
include 'footer/index.php';
?>