<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$id = $_POST['id'];
$pengumuman = $_POST['nm_pengumuman'];
$status = $_POST['status'];

$sql = "UPDATE pengumuman SET nm_pengumuman = '$pengumuman', status_pengumuman = '$status' WHERE id_pengumuman = '$id'";
$query = $conn->query($sql);
echo mysqli_error($conn);
if ($query) {
	echo '<script>
			window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=sukses&act=ubah";
		 </script>';
}else{
	$data = "Error ".$conn->error;
	echo '<script>
			window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=gagal&act=ubah&cau='.$data.'";
		 </script>';
}

$conn->close();

 ?>