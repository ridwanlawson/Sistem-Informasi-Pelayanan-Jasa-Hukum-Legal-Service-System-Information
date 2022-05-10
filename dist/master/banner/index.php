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
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Waktu</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1; 
                            $query = "SELECT banner.* FROM banner";
                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= ucwords($data->judul); ?></td>
                            <td><?= ucwords($data->desk); ?></td>
                            <td><img width="200px" src="assets/img/banner/<?= $data->gambar; ?>"></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($data->waktu)); ?></td>
                            <td><button class="btn btn-primary"  data-toggle="modal" data-target="#show" data-id="<?php echo $data->id_banner ?>">Ubah</button> | <a href="<?php echo $_SESSION['direct'] ?>delete.php?hd=master&fd=banner&id=<?php echo $data->id_banner; ?>" class="btn btn-danger">Hapus</a></td>
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input <?php echo $nama ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SESSION['direct'] ?>create.php?hd=master&fd=banner" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label>Judul Banner</label>
                  <div class="input-group">
                    <input type="text" name="judul" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="desk">
                  </div>
                </div>
                <div class="form-group">
                  <label>Gambar</label>
                  <div class="input-group">
                    <input type="file" class="form-control" name="logo">
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Edit <?php echo $nama ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-data"></div>
      </div>
    </div>
  </div>
</div>
<!-- End of Modal -->
