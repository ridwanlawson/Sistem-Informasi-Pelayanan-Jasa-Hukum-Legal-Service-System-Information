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
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
          </div>
          <div class="section-body">
            <h2 class="section-title">Hi, <?php echo ucwords($_SESSION['nama']) ?></h2>
            <p class="section-lead">
              Ubah informasi tentang anda di halaman ini.
            </p>
<?php 
$sql = $conn->query("SELECT karyawan.*, jabatan.*, bidang.* FROM karyawan, jabatan, bidang WHERE karyawan.id_karyawan = '$_SESSION[id]' AND karyawan.id_bidang = bidang.id_bidang AND karyawan.id_jabatan = jabatan.id_jabatan") or die('Salah');
  $data = $sql->fetch_object();
 ?>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Followers</div>
                        <div class="profile-widget-item-value">6,8K</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Following</div>
                        <div class="profile-widget-item-value">2,1K</div>
                      </div>
                    </div>
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?php echo  ucwords($data->nm_karyawan) ?><div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?php echo ucwords($data->nm_jabatan).' '.ucwords($data->nm_bidang) ?></div></div>

                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=profil&fd=pribadi" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Edit Data Diri</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>Nama Lengkap</label>
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                            <input type="text" class="form-control" name="nm_karyawan" value="<?php echo $data->nm_karyawan ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $data->email ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>No Handphone</label>
                            <input type="tel" class="form-control" name="nohp" value="<?php echo $data->nohp ?>">
                          </div>
                        </div>
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <label>Nomor Rekening</label>
                            <input type="text" class="form-control" name="no_rek" value="<?php echo $data->no_rek ?>" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control  summernote-simple"><?php echo $data->alamat ?></textarea>
                          </div>
                        </div>
                        <div class="card-footer text-right">
                          <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>