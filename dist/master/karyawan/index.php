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
                            <th>Nama <?php echo $nama ?></th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Bidang</th>
                            <th>Jabatan</th>
                            <th>No Rekening</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1; 
                            $query = "SELECT karyawan.*, bidang.*, jabatan.* FROM karyawan, bidang, jabatan WHERE karyawan.id_bidang = bidang.id_bidang AND karyawan.id_jabatan = jabatan.id_jabatan";
                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo ucwords($data->nm_karyawan); ?></td>
                            <td><?php echo ucwords($data->alamat); ?></td>
                            <td><?php echo $data->email; ?></td>
                            <td><?php echo $data->nohp; ?></td>
                            <td><?php echo ucwords($data->nm_bidang); ?></td>
                            <td><?php echo ucwords($data->nm_jabatan); ?></td>
                            <td><?php echo $data->no_rek; ?></td>
                            <td><button class="btn btn-primary"  data-toggle="modal" data-target="#show" data-id="<?php echo $data->id_karyawan ?>">Ubah</button> | <a href="<?php echo $_SESSION['direct'] ?>delete.php?hd=master&fd=karyawan&id=<?php echo $data->id_karyawan; ?>" class="btn btn-danger">Hapus</a></td>
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
            <form action="<?php echo $_SESSION['direct'] ?>create.php?hd=master&fd=karyawan" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama <?php echo $nama ?></label>
                  <div class="input-group">
                    <input type="text" class="form-control" minlength="3" required="" maxlength="100" placeholder="Nama <?php echo $nama ?>" name="nm_karyawan">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div class="input-group">
                    <textarea class="form-control" minlength="5" required="" placeholder="Jl Mahakam No.37 RT.03 RW.10 Kel.Pasaman Timur Kec.Pasaman Timur Kab.Pasaman Timur Prov.Sumatera Barat" name="alamat"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        @
                      </div>
                    </div>
                    <input type="email" minlength="5" required="" class="form-control" placeholder="user@user.com" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label>No Handphone</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        +62
                      </div>
                    </div>
                    <input type="number" minlength="10" min="999999999" maxlength="15" required="" class="form-control" placeholder="812909999090" name="nohp">
                  </div>
                </div>
                <div class="form-group">
                  <label>Bidang</label>
                  <div class="input-group">
                    <select name="id_bidang" class="form-control">
                      <?php 
                        $querys = $conn->query("SELECT * FROM bidang");
                        while ($data_bidang = $querys->fetch_object()) { ?>
                          <option value='<?php echo $data_bidang->id_bidang ?>'><?php echo $data_bidang->nm_bidang ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <div class="input-group">
                    <select name="id_jabatan" class="form-control">
                      <?php 
                        $queryss = $conn->query("SELECT * FROM jabatan");
                        while ($data_jabatan = $queryss->fetch_object()) { ?>
                          <option value='<?php echo $data_jabatan->id_jabatan; ?>'><?php echo $data_jabatan->nm_jabatan; ?></option>";
                      <?php  
                        }
                       ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>No Rekening</label>
                  <div class="input-group">
                    <input type="number" class="form-control" minlength="9" maxlength="20" min="1" placeholder="12312778979" name="no_rek">
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
