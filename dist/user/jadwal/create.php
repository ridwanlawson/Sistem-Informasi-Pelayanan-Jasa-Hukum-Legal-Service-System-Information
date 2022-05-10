<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$idhuk = $_SESSION['id'];
$idubi = $_POST['client'];
$tanggal = $_POST['tanggal'];
$jammulai = $_POST['jammulai'];
$jamakhir = $_POST['jamakhir'];
$timestamp = date('Y-m-d H:i:s');


	$sql = "INSERT INTO jadwal VALUES (null, '$idhuk', '$idubi', '$tanggal', '$jammulai', '$jamakhir', '$timestamp')";
$query = $conn->query($sql);
echo mysqli_error($conn);
if ($query) {
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