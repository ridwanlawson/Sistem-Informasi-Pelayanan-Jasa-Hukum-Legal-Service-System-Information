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
            <img src="../../assets/img/padang.png" width="100px">	
        </td>
        <td align="center">
            <h2><?php echo $judul->nm_perusahaan;?></h2>
            <h4>Laporan Data Download File</h4>
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
        <th>Jenis</th>
        <th>Nama Mahasiswa</th>
        <th>Judul</th>
        <th>Tahun</th>
        <th>Jurusan</th>
        <th>Halaman</th>
        <th>Jumlah Didownload</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;

        if (isset($_GET['dtgl'])&&isset($_GET['stgl'])) {
          $dtgl = $_GET['dtgl'];
          $stgl = $_GET['stgl'];

          $query = "SELECT sum(jml_download) as jml, download.*, jasa.*, jenis.*
                      FROM download, jasa, jenis
                      WHERE download.id_file = jasa.id_jasa
                      AND jenis.id_jenis = jasa.id_jenis
                      AND waktu_download BETWEEN '$dtgl' AND '$stgl'
                      GROUP BY download.id_file desc";

        }else{
          $query = "SELECT sum(jml_download) as jml, download.*, jasa.*, jenis.*
                      FROM download, jasa, jenis
                      WHERE download.id_file = jasa.id_jasa
                      AND jenis.id_jenis = jasa.id_jenis
                      GROUP BY download.id_file desc";
        }

        $result = $conn->query($query);
        echo mysqli_error($conn);
        while ($data = $result->fetch_object()) {
       ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data->nm_jenis; ?></td>
        <td><?php echo ucwords(strtolower($data->mahasiswa)); ?></td>
        <td><?php echo ucwords(strtolower($data->nm_jasa)); ?></td>
        <td><?php echo $data->tahun; ?></td>
        <td><?php echo ucwords(strtolower($data->jurusan)); ?></td>
        <td><?php echo number_format($data->halaman); ?></td>
        <td><?php echo number_format($data->jml); ?></td>
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