<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$pengumuman = $_POST['nm_pengumuman'];
$timestamp = date('Y-m-d H:i:s');

$sql = "INSERT INTO pengumuman VALUES (null, '$pengumuman', 'aktif','$timestamp')";
$query = $conn->query($sql);
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