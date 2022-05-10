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
$nama = 'Pembiayaan Perkasus';
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
                  <div class="card-header">
                    <div class="buttons">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th>Jenis Kasus </th>
                            <th>Rentang Pembiayaan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $nod = 1; 
                            $query = "SELECT jasa.*, jenis.* FROM jasa, jenis WHERE jasa.id_jenis = jenis.id_jenis order by id_jasa desc";
                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?php echo $nod++ ?></td>
                            <td><?php echo ucwords($data->nm_jenis); ?></td>
                            <td>Rp.<?php echo number_format($data->hargamin); ?>-<?php echo number_format($data->hargamax); ?></td>
                            <td>
                              <button class="btn btn-primary"  data-toggle="modal" data-target="#show" data-id="<?php echo $data->id_jasa ?>">Ubah</button><a href="<?php echo $_SESSION['direct'] ?>delete.php?hd=master&fd=file&id=<?php echo $data->id_jasa; ?>" class="btn btn-danger">Hapus</a></td>
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
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input <?php echo $nama ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SESSION['direct'] ?>/create.php?hd=master&fd=file" enctype="multipart/form-data" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="form-group col-4">
                    <label>Jenis</label>
                    <div class="input-group">
                      <select class="form-control select2" style="width: 100%" name="jenis" required>
                        <?php 
                          $queryss = "SELECT jenis.* FROM jenis";
                          $results = $conn->query($queryss);
                          while ($datajenis = $results->fetch_object()) { ?>
                            <option value="<?= $datajenis->id_jenis ?>"><?= $datajenis->nm_jenis ?></option>      
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-4">
                    <label>Harga Min</label>
                    <input type="number" class="form-control" placeholder="Nama <?php echo $nama ?>" name="hrgmin" required>
                  </div>
                  <div class="form-group col-4">
                    <label>Harga Max</label>
                    <input type="number" class="form-control" placeholder="Nama <?php echo $nama ?>" name="hrgmax" required>
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


<!-- Modal start here -->
<div class="modal fade" id="show" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Edit <?php echo $nama ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=master&fd=file" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="modal-data"></div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End of Modal -->

      <?php 
        $dataas = mysqli_query($conn, "SELECT jasa.*, jenis.* FROM jasa, jenis WHERE jasa.id_jenis = jenis.id_jenis order by id_jasa desc");
        while ($datass =  mysqli_fetch_array($dataas)) {
       ?>
      <div class="modal fade" id="exampleModalgam<?= $datass['id_jasa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
             <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">File</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                <a href="assets/img/file/<?= $datass['file'] ?>" target="_blank"> View Fullscreen  </a>
                <iframe src="assets/img/file/<?= $datass['file'] ?>" width="100%" height="400px"></iframe>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php 
        }
       ?>