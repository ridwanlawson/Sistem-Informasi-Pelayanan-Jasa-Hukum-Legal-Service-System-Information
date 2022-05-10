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
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th>Tanggal</th>
                            <th>Nama Pengirim</th>
                            <th>Isi Pesan</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            if ($_SESSION['level'] != 'admin') {
                            $query = "SELECT pesan.*, user.* FROM pesan, user WHERE pesan.id_penerima = $_SESSION[id] AND pesan.id_pengirim = user.id_user GROUP BY tanggal_pesan ORDER BY tanggal_pesan desc";
                            }else{
                            $query = "SELECT pesan.*, user.* FROM pesan, user WHERE pesan.id_penerima = $_SESSION[id] AND pesan.id_pengirim = user.id_user AND pesan.status_pesan = 'terkirim'  GROUP BY tanggal_pesan ORDER BY status_pesan desc,tanggal_pesan desc";
                            }

                            echo mysqli_error($conn);
                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo date('d-m-Y H:i:s', strtotime($data->tanggal_pesan)); ?></td>
                            <td><?php echo ucwords($data->nm_user).' ('.ucwords($data->level).')';?></td>
                            <td><?php echo $data->isi_pesan; ?></td>
                            <td>
                            <?php if ($data->file) { ?>
                              <img width="100%" src="assets/img/data/file/<?php echo $data->file; ?>">
                            <?php  }else{ }?>
                            </td>
                            <td><?php echo ucwords($data->status_pesan); ?></td>
                            <?php if ($_SESSION['level']=='admin'): ?>
                            <td>
                                <!-- <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal<?php echo $data->id_pesan ?>"><i class="fas fa-warning"></i> Selesaikan Oleh Teknisi </button> -->
                                <?php if ($data->status_pesan=='terkirim'): ?>
                                  <button class="btn btn-success"  data-toggle="modal" data-target="#show" data-id="<?php echo $data->id_pesan ?>"><i class="fas fa-warning"></i> Proses dan Kirim Pesan Via Whatsapp </button>
                                <?php endif ?>
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
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input <?php echo $nama ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SESSION['direct'] ?>create.php?hd=pesan&fd=keluar" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Penerima</label>
                  <div class="input-group">
                    <select class="form-control" name="id_penerima" sty>
                      <?php
                        $data_nasabah = "SELECT * FROM user WHERE nm_user!='admin' ORDER BY id_user";
                        $result = $conn->query($data_nasabah);
                        if ($_SESSION['level']=='admin') {
                        while ($data = $result->fetch_object()) {
                           echo "<option value=$data->id_nasabah>$data->nama_nasabah -> $data->nama_ibu (Nasabah)</option>";
                         }
                        }

                        $data_user = "SELECT * FROM user WHERE level = 'admin' AND nm_user!='admin'";
                        $results = $conn->query($data_user);
                        while ($datas = $results->fetch_object()) {
                           echo "<option value=$datas->id_user>".ucwords($datas->nm_user)." (Admin) </option>";
                         } 
                       ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>isi Pesan</label>
                  <div class="input-group">
                    <textarea class="form-control" name="desk"></textarea>
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
    $no = 1;
    $query = "SELECT pesan.*, user.* FROM pesan, user WHERE pesan.id_penerima = $_SESSION[id] AND pesan.id_pengirim = user.id_user AND pesan.status_pesan != 'selesai'  GROUP BY tanggal_pesan ORDER BY status_pesan desc,tanggal_pesan desc";
    echo mysqli_error($conn);
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {
   ?>
      <!-- Modal Teknisi Start -->
      <div class="modal fade" id="exampleModal<?php echo $data->id_pesan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Input <?php echo $nama ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo $_SESSION['direct'] ?>teknisi.php?hd=pesan&fd=masuk" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama User</label>
                  <div class="input-group">
                  <input type="hidden" value="<?= ucwords($data->id_pesan) ?>" name="id_pesan">
                  <input type="hidden" value="<?= ucwords($data->nolayanan) ?>" name="nolayanan">
                    <select class="form-control" name="id_penerima" sty>
                       <option value="<?= $data->id_user ?>"><?php echo ucwords($data->nm_user).' ('.ucwords($data->level).')';?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Teknisi</label>
                  <div class="input-group">
                    <select class="form-control" name="id_pengirim" sty>
                      <?php
                        $data_user = "SELECT * FROM user WHERE level = 'teknisi' AND nm_user!='admin'";
                        $results = $conn->query($data_user);
                        while ($datas = $results->fetch_object()) {
                           echo "<option value=$datas->id_user>".ucwords($datas->nm_user)." (Teknisi) </option>";
                         } 
                       ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Judul Pesan</label>
                  <div class="input-group">
                    <input class="form-control" name="judul" value="Teknisi PT Telkom Akses">
                  </div>
                </div>
                <div class="form-group">
                  <label>isi Pesan</label>
                  <div class="input-group">
                    <textarea class="form-control" style="height:1000px" name="desk">Kami dari Tim Teknisi PT Telkom Akses Mengabarkan Kepada Anda Bahwa Tim Kami Sudah Mulai Beroperasi Untuk Mengatasi Masalah Pada Pengaduan Anda Hari Ini, Mohon Agar Bapak/Ibu Untuk Selalu Setia Menunggu Kedatangan Kami Dan Pastikan Nomor Handphone dan Emailnya Di Check Secara Berkala Agar Ketika Tim Teknisi Telah Sampai Ada Yang Menjelaskannya Masalah Anda Kepada Tim Teknisi Kami, Terima Kasih </textarea>
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
      <!-- //Modal Teknisi End -->
  <?php } ?>



<!-- Modal start here -->
<div class="modal fade" id="show" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModal">Detail Pesan <?php echo $nama ?></h5>
        <button type="button" onclick="window.location.reload()" class="close" data-dismiss="modal" aria-label="Close">
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
