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
            <h1>File <?php echo $nama ?></h1>
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
                            <th>Jenis</th>
                            <th>Nama Mahasiswa</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Jurusan</th>
                            <th>Halaman</th>
                            <th>Jumlah Dilihat</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;

                            if (isset($_POST['dtgl'])&&isset($_POST['stgl'])) {
                              $dtgl = $_POST['dtgl'];
                              $stgl = $_POST['stgl'];

                              $query = "SELECT sum(jml_download) as jml, download.*, jasa.*, jenis.*
                                          FROM download, jasa, jenis
                                          WHERE download.id_file = jasa.id_jasa
                                          AND jenis.id_jenis = jasa.id_jenis
                                          AND waktu_download BETWEEN '$dtgl' AND '$stgl'
                                          GROUP BY download.id_file desc";

                            }else{
                              $query = "SELECT sum(jml_download) as jml, download.*, jasa.*, jenis.*
                                          FROM download, jasa, jenis
                                          WHERE download.id_file = jasa.id_jasa
                                          AND jenis.id_jenis = jasa.id_jenis
                                          GROUP BY download.id_file desc";
                            }

                            $result = $conn->query($query);
                            echo mysqli_error($conn);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data->nm_jenis; ?></td>
                            <td><?php echo ucwords(strtolower($data->mahasiswa)); ?></td>
                            <td><?php echo ucwords(strtolower($data->nm_jasa)); ?></td>
                            <td><?php echo $data->tahun; ?></td>
                            <td><?php echo ucwords(strtolower($data->jurusan)); ?></td>
                            <td><?php echo number_format($data->halaman); ?></td>
                            <td><?php echo number_format($data->jml); ?></td>
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
