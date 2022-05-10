<?php
include 'dist/config/index.php';
include 'dist/plugin/keywords.php';
if (!empty($_SESSION['nama'])) {
  echo '<script>
        window.location.href = "dist/index.php";
      </script>';
}
  $sql = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan = 1");
  $judul = $sql->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; <?php echo $judul->nm_perusahaan ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="dist/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="dist/assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="dist/assets/css/style.css">
  <link rel="stylesheet" href="dist/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Daftar</h4></div>

              <div class="card-body">
                <form method="POST" action="register_acts.php">
                    <div class="form-group">
                      <label for="frist_name">Username</label>
                      <input id="frist_name" placeholder="username" onkeypress="<?php echo $hu; ?>" type="text" class="form-control" name="name" value="" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <span>@</span>
                        </div>
                          <input id="email" type="text"  placeholder="username@email.com" class="form-control" name="email" value="" required autocomplete="email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Nomor Handphone</label>
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <span>+62</span>
                        </div>
                          <input id="nohp" type="number"  placeholder="08122290xxxx" min="999999999" max="9999999999999999" maxlength="16" minlength="9" class="form-control" name="nohp" value="" required autocomplete="nohp">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea id="alamat"  class="form-control"  placeholder="Jl Khidmad No.1" name="alamat" value="" required autocomplete="alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          <div class="float-right">
                            <a href="login.php" class="text-small">
                              Sudah Punya Akun?
                            </a>
                          </div>
                    </div>
  
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Daftar</button>
                    </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; <?php echo $judul->nm_perusahaan.' '.date("Y") ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="dist/assets/modules/jquery.min.js"></script>
  <script src="dist/assets/modules/popper.js"></script>
  <script src="dist/assets/modules/tooltip.js"></script>
  <script src="dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="dist/assets/modules/moment.min.js"></script>
  <script src="dist/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="dist/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="dist/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="dist/assets/js/page/auth-register.js"></script>
  
  <!-- Template JS File -->
  <script src="dist/assets/js/scripts.js"></script>
  <script src="dist/assets/js/custom.js"></script>
</body>
</html>