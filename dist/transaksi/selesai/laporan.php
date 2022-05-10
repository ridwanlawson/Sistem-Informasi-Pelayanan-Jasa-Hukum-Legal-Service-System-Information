<?php 
  include '../../config/index.php';
if (empty($_SESSION['nama'])) {
  echo '<script>
			window.location.href = "../../../index.php";
		</script>';
}

  $sql = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan = 1");
  $judul = $sql->fetch_object();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $judul->nm_perusahaan ?></title>
	<link rel="stylesheet" href="../../assets/modules/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
    <table align="center"  height="100px"  width="60%">
      <tr>
        <td align="center">
            <img src="../../assets/img/sihin.png" width="100px">	
        </td>
        <td align="center">
            <h2><?php echo $judul->nm_perusahaan;?></h2>
            <h4>Laporan Data Lihat File</h4>
    		</td>
		<td></td>
	   </tr>
     <tr>
       <td align="left" colspan="3">Tanggal <?= $_GET['dtgl'] ?> s/d <?= $_GET['stgl'] ?></td>
     </tr>
	 
	</table>

                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              No.
                            </th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Jenis Jasa</th>
                            <th>Pelayan Hukum</th>
                            <th>Status</th>
                            <!-- <th>Gambar</th> -->
                            <th>Waktu</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1; 
                            $iduser = $_SESSION['id'];;

                            if (isset($_POST['dtgl'])&&isset($_POST['stgl'])) {
                              $dtgl = $_POST['dtgl'];
                              $stgl = $_POST['stgl'];

                              if ($_SESSION['level'] == "admin") {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user and kasus.status = 'selesai' AND Waktu_kasus BETWEEN '$dtgl' AND '$stgl' group by id_kasus ";
                              }elseif ($_SESSION['level'] == "hukum") {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_biasa = user.id_user AND id_user_hukum = '$iduser' and kasus.status = 'selesai' AND Waktu_kasus BETWEEN '$dtgl' AND '$stgl'group by id_kasus ";
                              } else {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user AND id_user_biasa = '$iduser' and kasus.status = 'selesai' AND Waktu_kasus BETWEEN '$dtgl' AND '$stgl' group by id_kasus ";
                              }

                            }else{
                              if ($_SESSION['level'] == "admin") {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user and kasus.status = 'selesai' group by id_kasus ";
                              }elseif ($_SESSION['level'] == "hukum") {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_biasa = user.id_user AND id_user_hukum = '$iduser' and kasus.status = 'selesai' group by id_kasus ";
                              } else {
                                $query = "SELECT kasus.*,  jasa.* , jenis.*, user.* FROM kasus, jasa, jenis, user WHERE jasa.id_jasa = kasus.id_jenis AND jasa.id_jenis = jenis.id_jenis AND kasus.id_user_hukum = user.id_user AND id_user_biasa = '$iduser' and kasus.status = 'selesai' group by id_kasus ";
                              }
                            }                            
                            $result = $conn->query($query);
                            while ($data = $result->fetch_object()) {
                           ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= ucwords($data->judul_kasus); ?></td>
                            <td>
                              <?= ucwords($data->deskripsi_kasus); ?>
                            </td>
                            <td><?= ucwords($data->nm_jenis); ?></td>
                            <td><?= ucwords($data->nm_lengkap); ?></td>
                            <td><?= ucwords($data->status); ?></td>
                            <!-- <td><img width="200px" src="assets/img/perkembangan/<?= $data->gambar; ?>"></td> -->
                            <td><?= date('d-m-Y H:i:s', strtotime($data->waktu)); ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
  <div style="font-size: 12px;">
		<p>Padang, <?php echo date('d-M-Y') ?></p>
    <p>Mengetahui</p>
    <br>
    <br>
    <br>
    <p>Pimpinan</p>
  </div>
</body>
</html>
<script>
	window.print();
</script>