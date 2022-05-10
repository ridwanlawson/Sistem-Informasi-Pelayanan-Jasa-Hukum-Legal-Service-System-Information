<?php 
$head = $_GET['hd']; 
$folder = $_GET['fd'];

  if (!empty($head)&&!empty($folder)) {
    $direct = $head.'/'.$folder.'/';
  }elseif (empty($head)&&!empty($folder)) {
    $direct = $folder.'/index.php';
  }else{
    $direct = '';
  }
$direct = $head.'/'.$folder.'/';
$_SESSION['direct'] = $direct;
$nama = ucwords($_GET['fd']);
 ?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $nama ?></h1>
          </div>

          <div class="section-body">
            <div class="row">
          <?php 
                include 'notif/index.php';
          ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data <?php echo $nama ?></h4>
                  </div>
                      <?php if ($_SESSION['level']=="admin"): ?>
                  <div class="card-header">
                    <div class="buttons">                        
                      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</button>
                    </div>
                  </div>
                      <?php endif ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Jenis Jasa</th>
                            <th>Pelayan Hukum</th>
                            <th>Email</th>
                            <th>No.Handphone</th>
                            <th>Status</th>
                            <!-- <th>Gambar</th> -->
                            <th>Waktu</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1; 
                            $iduser = $_SESSION['id'];
                            if ($_SESSION['level'] == "admin") {
                              $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_biasa = user.id_user group by id_kasus ";
                            }elseif ($_SESSION['level'] == "hukum") {
                              $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_biasa = user.id_user AND id_user_hukum = '$iduser' group by id_kasus ";
                            } else {
                              $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user AND id_user_biasa = '$iduser' group by id_kasus ";
                            }
                            
                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= ucwords($data->judul_kasus); ?></td>
                            <td>
                              <?= ucwords($data->deskripsi_kasus); ?>
                            </td>
                            <td><?= ucwords($data->nm_jenis); ?></td>
                            <td><?= ucwords($data->nm_lengkap); ?></td>
                            <td><a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $data->email; ?>&su=Pemberitahuan&body=Halo Sihin Advocates, ...."><?php echo $data->email; ?></a></td>
                            <td><a target="_blank" href="https://wa.me/62<?php echo $data->no_hp; ?>?text=Terima Kasih telah memilih kami sebagai konsultan hukum anda, anda akan dihubungi oleh Pelayan Hukum Kami">0<?php echo $data->no_hp; ?></a></td>
                            <td><?= ucwords($data->status); ?></td>
                            <!-- <td><img width="200px" src="assets/img/perkembangan/<?= $data->gambar; ?>"></td> -->
                            <td><?= date('d-m-Y H:i:s', strtotime($data->Waktu_kasus)); ?></td>
                            <td>
                              <button class="btn btn-primary"  data-toggle="modal" data-target="#show" data-id="<?php echo $data->id_kasus ?>">Lihat</button> 

                              <?php if ($_SESSION['level'] == "hukum" AND $data->status != "selesai"): ?>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalprog<?= $data->id_kasus ?>">+Progress</button>
                                <a href="<?php echo $_SESSION['direct'] ?>selesai.php?hd=user&fd=perkembangan&id=<?php echo $data->id_kasus ?>" class="btn btn-success">Kasus Done</a>
                              <?php endif ?>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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


  <?php
    $noss = 1; 
    if ($_SESSION['level'] == "admin") {
      $queryss = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user group by id_kasus ";
    }elseif ($_SESSION['level'] == "hukum") {
      $queryss = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_biasa = user.id_user AND id_user_hukum = '$iduser' group by id_kasus ";
    } else {
      $queryss = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user AND id_user_biasa = '$iduser' group by id_kasus ";
    }
    
    $resultss = $conn->query($queryss);
    while ($datasss = $resultss->fetch_object()) {
   ?>
      <!-- Modal Insert -->
      <div class="modal fade" id="exampleModalprog<?=$datasss->id_kasus?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input Progress</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SESSION['direct'] ?>progress.php?hd=user&fd=perkembangan" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label>Deskripsi Kasus</label>
                  <div class="input-group">
                    <input type="hidden" name="idkasus" value="<?=$datasss->id_kasus?>">
                    <textarea class="form-control" name="desk" required=""></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <div class="input-group">
                    <select name="status" class="form-control">
                      <option value="progress">Progress</option>
                      <option value="selesai">Selesai</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>File</label>
                  <div class="input-group">
                    <input type="file" name="foto" class="form-control">
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
<?php } ?>

<!-- Modal start here -->
<div class="modal fade" id="show" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Lihat <?php echo $nama ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-data"></div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal -->



    <script>
        CKEDITOR.replace('desk');
    </script>