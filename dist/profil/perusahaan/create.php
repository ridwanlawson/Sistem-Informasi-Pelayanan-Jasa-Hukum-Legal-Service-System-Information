<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php';

$nama = $_POST['nama'];
$inis = $_POST['inis'];
$desk = $_POST['desk'];

$sql = "INSERT INTO perusahaan VALUES (null, '$nama', '$inis', '$desk')";
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