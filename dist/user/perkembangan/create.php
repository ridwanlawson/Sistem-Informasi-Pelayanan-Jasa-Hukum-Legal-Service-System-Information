<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
	$judul = $_POST['judul'];
	$desk = $_POST['desk'];
	$status = $_POST['status'];
	$idjenis = $_POST['idjenis'];
	$iduserbiasa = $_POST['iduserbiasa'];
	$userhukum = $_POST['id_userhukum'];
	$timestamp = date('Y-m-d H:i:s');

		$sql = "INSERT INTO kasus VALUES (null, '$idjenis', '$userhukum', '$iduserbiasa', '$judul', '$desk', 'pending', '$timestamp')";
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