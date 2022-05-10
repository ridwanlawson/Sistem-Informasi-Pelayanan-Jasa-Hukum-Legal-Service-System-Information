<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php';
include '../../plugin/images.php';

$idpna = $_POST['id_penerima'];
$nolayanan = $_POST['nolayanan'];
$idpnm = $_SESSION['id'];
$judul = $_POST['judul'];
$pesan = htmlspecialchars($_POST['desk']);
$timestamp = date('Y-m-d H:i:s');
$status = 'pesan';

$sql = "INSERT INTO pesan VALUES (null, '$idpnm', '$idpna','$nolayanan', '$judul', '$pesan', '', '$status', '$timestamp')";
$query = $conn->query($sql);
echo mysqli_error($conn);
if ($query) {
	echo 'berhasil';
	echo '<script>
			window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=sukses&act=tambah";
		 </script>';
}else{
	$data = "Error ".$conn->error;
	echo $data;
	echo '<script>
			window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=gagal&act=tambah&cau='.$data.'";
		 </script>';
}

$conn->close();

 ?>