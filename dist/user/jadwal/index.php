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
$nama = 'Jadwal Konsultasi';
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
                      <?php if ($_SESSION['level']!="user"): ?>
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
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <?php if ($_SESSION['level']=="user"): ?>
                            <th>Pelayan Hukum</th>
                            <?php elseif ($_SESSION['level']!="user"): ?>
                            <th>Client</th>
                                  <th>Action</th>
                            <?php endif ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1; 
                            $datenow = date('Y-m-d');
                            $id = $_SESSION['id'];
                            if ($_SESSION['level']=='hukum') {
                              $query = "SELECT jadwal.*,user.* FROM jadwal, user WHERE user.id_user = jadwal.id_userbiasa and level = 'user' and jadwal.id_userhukum = '$id' order by waktu";
                            }elseif ($_SESSION['level']=='user') {
                              $query = "SELECT jadwal.*,user.* FROM jadwal, user WHERE user.id_user = jadwal.id_userhukum and level = 'hukum' and jadwal.id_userbiasa = '$id'";
                            } else {
                              $query = "SELECT jadwal.*,user.* FROM jadwal, user WHERE user.id_user = jadwal.id_userhukum and level = 'hukum'";
                            }
                            
                            

                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date('d-m-Y' , strtotime($data->tanggal)); ?></td>
                            <td><?= date('H:i' , strtotime($data->jam_mulai)); ?>-<?= date('H:i' , strtotime($data->jam_akhir)); ?></td>
                            <td><?= ucwords(strtolower($data->nm_lengkap)); ?></td>
                            
                            <?php if ($_SESSION['level']!="user"): ?>
                            <td>
                              <a href="<?php echo $_SESSION['direct'] ?>delete.php?hd=user&fd=jadwal&id=<?php echo $data->id_jadwal; ?>" class="btn btn-danger">Hapus Jadwal</a>
                            </td>
                            <?php endif ?>
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
              <h5 class="modal-title" id="exampleModalLabel">Input <?php echo $nama ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SESSION['direct'] ?>create.php?hd=user&fd=jadwal" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label>Client</label>
                  <div class="input-group">
                    <select class="form-control select2" style="width: 100%" name="client" required>
                      <?php 
                        $queryss = "SELECT user.* FROM user WHERE level = 'user'";
                        $results = $conn->query($queryss);
                        while ($datajenis = $results->fetch_object()) { ?>
                          <option value="<?= $datajenis->id_user ?>"><?= ucwords($datajenis->nm_lengkap) ?></option>      
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <div class="input-group">
                    <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-6">
                    <label>Jam Mulai</label>
                    <div class="input-group">
                      <input type="time" id="starttime" onchange="tanggal()" class="form-control" name="jammulai" value="<?= date('H:i') ?>" required>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label>Jam Selesai</label>
                    <div class="input-group">
                      <input type="time" id="endtime" class="form-control" name="jamakhir" required>
                    </div>
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

<script>
    function tanggal(){
        starttime = $("#starttime").val();
        $("#endtime").attr({
           "min" : starttime
        });
    }
</script>