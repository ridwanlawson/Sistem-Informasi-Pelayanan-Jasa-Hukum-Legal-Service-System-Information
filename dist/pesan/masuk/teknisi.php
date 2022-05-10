<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php';

$idpsn = $_POST['id_pesan'];
$idpna = $_POST['id_penerima'];
$idpnm = $_POST['id_pengirim'];
$nolayanan = $_POST['nolayanan'];
$judul = $_POST['judul'];
$status = 'teknisi';
$status_teknisi = 'proses teknisi';
$pesan = htmlspecialchars($_POST['desk']);
$timestamp = date('Y-m-d H:i:s');

$sql = "INSERT INTO pesan VALUES (null, '$idpnm', '$idpna', '$nolayanan', '$judul', '$pesan', '','$status', '$timestamp')";
$query = $conn->query($sql);
$sqls = "UPDATE pesan SET  id_penerima = '$idpnm', status_pesan = '$status_teknisi' WHERE id_pesan = '$idpsn'";
$querys = $conn->query($sqls);
echo mysqli_error($conn);
if ($query AND $querys) {
	echo '<script>
			window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=sukses&act=tambah";
		 </script>';
}else{
	$data = "Error ".$conn->error;
	echo '<script>
			window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=gagal&act=tambah&cau='.$data.'";
		 </script>';
}

$conn->close();

 ?>