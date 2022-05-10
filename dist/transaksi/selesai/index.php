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
            <h1>Kasus <?php echo $nama ?></h1>
          </div>

          <div class="section-body">
            <div class="row">  
          <?php 
                include 'notif/index.php';
          ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form action="" method="post">
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <label>Dari Tanggal</label>
                          <input type="date" name="dtgl" value="<?= @$_POST['dtgl'] ?>" class="form-control" required>                   
                        </div>
                        <div class="form-group col-md-2">
                          <label>Sampai Tanggal</label>
                          <input type="date" name="stgl" value="<?= @$_POST['stgl'] ?>" class="form-control" required>                    
                        </div>
                        <div class="form-group col-md-2">
                          <label><a href="" style="color: white">-</a></label>
                          <input type="submit" name="lihat"  class="form-control btn-primary" value="Lihat">
                        </div>
                        <div class="form-group col-md-2">
                          <label><a href="" style="color: white">-</a></label>
                          <a href="<?php echo $_SESSION['direct']; ?>laporan.php?dtgl=<?php echo @$_POST['dtgl']; ?>&stgl=<?php echo @$_POST['stgl']; ?>" target="_blank" name="cetak"  class="form-control btn-danger" align="center" style="text-decoration: none">Cetak</a>
                        </div>
                      </div> 
                    </form>
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
                            <th>Status</th>
                            <!-- <th>Gambar</th> -->
                            <th>Waktu</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1; 
                            $iduser = $_SESSION['id'];;

                            if (isset($_POST['dtgl'])&&isset($_POST['stgl'])) {
                              $dtgl = $_POST['dtgl'];
                              $stgl = $_POST['stgl'];

                              if ($_SESSION['level'] == "admin") {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user and kasus.status = 'selesai' AND Waktu_kasus BETWEEN '$dtgl' AND '$stgl' group by id_kasus ";
                              }elseif ($_SESSION['level'] == "hukum") {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_biasa = user.id_user AND id_user_hukum = '$iduser' and kasus.status = 'selesai' AND Waktu_kasus BETWEEN '$dtgl' AND '$stgl'group by id_kasus ";
                              } else {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user AND id_user_biasa = '$iduser' and kasus.status = 'selesai' AND Waktu_kasus BETWEEN '$dtgl' AND '$stgl' group by id_kasus ";
                              }

                            }else{
                              if ($_SESSION['level'] == "admin") {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user and kasus.status = 'selesai' group by id_kasus ";
                              }elseif ($_SESSION['level'] == "hukum") {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_biasa = user.id_user AND id_user_hukum = '$iduser' and kasus.status = 'selesai' group by id_kasus ";
                              } else {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user AND id_user_biasa = '$iduser' and kasus.status = 'selesai' group by id_kasus ";
                              }
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
                            <td><?= ucwords($data->status); ?></td>
                            <!-- <td><img width="200px" src="assets/img/perkembangan/<?= $data->gambar; ?>"></td> -->
                            <td><?= date('d-m-Y H:i:s', strtotime($data->waktu)); ?></td>
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
