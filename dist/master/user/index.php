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
            <h1>Pesan <?php echo $nama ?></h1>
          </div>

          <div class="section-body">
            <div class="row">
          <?php 
                include 'notif/index.php';
          ?>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pesan <?php echo $nama.' '.ucwords($_SESSION['nama']) ?> </h4>
                  </div>
                  <div class="card-header">
                    <div class="buttons">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Data Baru</button>
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
                            <th>Nama Lengkap</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Level</th>
                            <th>Mulai Bergabung</th>
                            <th>Foto</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                              $query = "SELECT user.* FROM user ORDER BY waktu_user desc";
                            echo mysqli_error($conn);
                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ucwords($data->nm_lengkap); ?></td>
                            <td><?php echo ucwords($data->nm_user); ?></td>
                            <td><a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo $data->email; ?>&su=Pemberitahuan&body=Terima Kasih telah memilih kami sebagai konsultan hukum anda, anda akan dihubungi oleh Pelayan Hukum Kami"><?php echo $data->email; ?></a></td>
                            <td><a target="_blank" href="https://wa.me/62<?php echo $data->no_hp; ?>?text=Terima Kasih telah memilih kami sebagai konsultan hukum anda, anda akan dihubungi oleh Pelayan Hukum Kami">0<?php echo $data->no_hp; ?></a></td>
                            <td><?php echo $data->alamat; ?></td>
                            <td><?php echo ucwords($data->level); ?></td>
                            <td><?php echo $data->waktu_user; ?></td>
                            <td><img src="assets/img/file/<?php echo $data->gambar; ?>" width="100%"></td>
                            <td><button class="btn btn-primary"  data-toggle="modal" data-target="#show" data-id="<?php echo $data->id_user ?>"> Edit </button> | <a href="<?php echo $_SESSION['direct'] ?>delete.php?hd=master&fd=user&id=<?php echo $data->id_user; ?>" class="btn btn-danger">Hapus</a></td>
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
            <form action="<?php echo $_SESSION['direct'] ?>create.php?hd=master&fd=user" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Lengkap </label>
                  <div class="input-group">
                    <input type="text" class="form-control" required="" placeholder="Nama Lengkap" name="nm_lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama <?php echo $nama ?></label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" required="" placeholder="Nama <?php echo $nama ?>" name="nm_user">
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">@</div>
                    </div>
                    <input type="email" class="form-control" required="" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label>Nomor Handphone</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">+62</div>
                    </div>
                    <input type="number" class="form-control" required="" placeholder="Nomor Handphone" name="nohp">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div class="input-group">
                    <textarea class="form-control" required="" placeholder="Jl Jati Parak Salai No.1" name="alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                      </div>
                    </div>
                    <input type="password" class="form-control pwstrength" data-indicator="pwindicator" required="" placeholder="Password" name="password">
                  </div>
                  <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Gambar</label>
                  <div class="input-group">
                    <input type="file" class="form-control" required="" name="foto" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <div class="input-group">
                    <select class="form-control" required="" name="level">
                      <option value="admin">Admin</option>
                      <option value="hukum">Pelayan Hukum</option>
                      <option value="user">User</option>
                    </select>
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
        <h5 class="modal-title" id="editModal">Detail Pesan <?php echo $nama ?></h5>
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
