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
$nama = ucwords("Profil");
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
                      <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data</button> -->
                      <button class="btn btn-primary"  data-toggle="modal" data-target="#show" data-id="1"><i class="fas fa-pencil-ruler"></i> Ubah Data</button>
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
                            <th>Nama Profil</th>
                            <th>Singkatan Nama</th>
                            <th>Deskripsi Profil</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1; 
                            $query = "SELECT * FROM perusahaan";
                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ucwords($data->nm_perusahaan); ?></td>
                            <td><?php echo strtoupper($data->init_perusahaan); ?></td>
                            <td><?php echo ucwords($data->desk_perusahaan); ?></td>
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
            <form action="<?php echo $_SESSION['direct'] ?>create.php?hd=profil&fd=perusahaan" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Perusahaan</label>
                  <div class="input-group">
                    <input type="text" class="form-control" minlength="5" maxlength="100" placeholder="PT Bismillah" name="nama" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label>Inisial Nama</label>
                  <div class="input-group">
                    <input type="text" class="form-control" minlength="" maxlength="10" placeholder="BMH" name="inis" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label>Deskripsi Perusahaan</label>
                  <div class="input-group">
                    <textarea class="form-control" minlength="9" name="desk" required=""></textarea>
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
