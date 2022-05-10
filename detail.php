 <?php 
  include 'dist/config/index.php';
  $sql = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan = 1");
  $judul = $sql->fetch_object();  
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $judul->nm_perusahaan; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <link rel="stylesheet" href="dist/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="dist/assets/modules/bootstrap/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,800;1,800&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Nunito', sans-serif;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="#"><?php echo $judul->nm_perusahaan; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a style="color: white" class="nav-link" href="index.php"><b>Home</b></a>
        </li>
        <li class="nav-item">
          <a style="color: white" class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
   </nav>
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
 
    <h1 align="center" style="color:white;"> - </h1>
    <div class="container">
    <?php 
      $id = $_GET['id'];
      $detail = "SELECT solusi.*, faq.* FROM solusi, faq WHERE solusi.id_faq = faq.id_faq AND id_solusi = '$id'";
      $result = $conn->query($detail);
      while ($data = $result->fetch_object()) {
     ?>
      <p>Pertanyaaan : <?php echo $data->nm_faq ?></p>
      <h1 align="center"><?php echo $data->nm_solusi ?></h1>
      <p><?php echo $data->desk_solusi ?></p>
      <?php } ?>
    </div>
 <div class="footer-copyright text-center py-3">©<?php echo date('Y') ?> Copyright. <?php echo $judul->nm_perusahaan; ?>


  <script src="dist/assets/modules/modal/popper.min.js"></script>
  <script src="dist/assets/modules/modal/bootstrap.min.js"></script>
  <script src="dist/assets/modules/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>