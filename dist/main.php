<style type="text/css">
  .card-img-top {
    width: 100%;
    height: 15vw;
    object-fit: cover;
  }
</style>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-body">
  <?php 
    $query = "SELECT * FROM pengumuman WHERE status_pengumuman = 'aktif'";
    $result = $conn->query($query);
    $data = $result->fetch_object();
    if ($data) {
     
  ?>
  <marquee scrollamount="8" onmouseover="this.stop();" onmouseout="this.start();">
  <p style="margin-top: 10px;">
  <?php 
    $query = "SELECT * FROM pengumuman WHERE status_pengumuman = 'aktif'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {
  ?>
    <b style="margin-right: 200px"><?php echo $data->nm_pengumuman ?></b>
  <?php 
    }
   ?>
   </p>
  </marquee>
  <?php } ?>
                  <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <?php 
                        $no = 0;
                        $banners = $conn->query("SELECT * FROM banner order by id_banner desc");
                        while ($banner = $banners->fetch_object()) {
                       ?>
                          <li data-target="#carouselExampleIndicators2" <?php if ($no == 0){ echo 'class="active"';} ?> data-slide-to="<?= $no++ ?>"></li>
                      <?php 
                        }
                       ?>
                    </ol>
                    <div class="carousel-inner">

                      <?php 
                        $nos = 0;
                        $datbanners = $conn->query("SELECT * FROM banner order by id_banner desc");
                        while ($datbanner = $datbanners->fetch_object()) {
                       ?>
                          <div class="carousel-item <?php if ($nos == 0){ echo 'active';} ?>">
                            <img class="d-block w-100" src="assets/img/banner/<?= $datbanner->gambar ?>" alt="slide<?= $nos++ ?>">
                            <div class="carousel-caption d-none d-md-block">
                              <h5><?= $datbanner->judul ?></h5>
                              <p><?= $datbanner->desk ?></p>
                            </div>
                          </div>
                      <?php 
                        }
                       ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php
              $no = 1; 
              if (!empty($_GET['jenis'])) {
                $query = "SELECT jasa.*, jenis.* FROM jasa, jenis WHERE jasa.id_jenis = jenis.id_jenis AND jenis.nm_jenis = '$_GET[jenis]' order by id_jasa desc";
              }
              elseif (!empty($_GET['search'])) {
                $query = "SELECT jasa.*, jenis.* FROM jasa, jenis WHERE jasa.id_jenis = jenis.id_jenis AND jasa.nm_jasa regexp '".$_GET['search']."' order by id_jasa desc";
              } 
              else {
                $query = "SELECT jasa.*, jenis.* FROM jasa, jenis WHERE jasa.id_jenis = jenis.id_jenis order by id_jasa desc";
              }
              
              $result = $conn->query($query) or die(mysqli_error($conn));
              while ($data = $result->fetch_object()) {
             ?>
              <div class="col-6 col-md-4 col-lg-3">
                <a href="detail.php?idjasa=<?= $data->id_jasa ?>" style="text-decoration: none;">
                  <div class="card">
                    <img src="assets/img/file/<?= $data->gambar ?>" width="100%" height="100%">
                    <div class="card-body">
                      <b style="font-size:10px;" class="card-text"><?= $data->nm_jenis ?></b>
                      <p style="line-height:; margin-bottom:-5px;">Range Harga</p>
                      <p style="font-size:11px;">Rp.<?= number_format($data->hargamin) ?>-Rp.<?= number_format($data->hargamax) ?></p>
                    </div>
                  </div>
                </a>
              </div>
            <?php 
              }
             ?>
          </div>
        </section>
      </div>