<?php
include '../../config/index.php'; 
$hd = $_GET['hd'];
$fd = $_GET['fd'];

// echo $_SESSION['id'];
$jenis = $_POST['jenis'];
$hrgmin = $_POST['hrgmin'];
$hrgmax = $_POST['hrgmax'];
$waktu = date('Y-m-d H:i:s');
$gambar = "";
$simpan = "";


$sql = "INSERT INTO jasa VALUES (null, '$jenis', '$hrgmin', '$hrgmax',  '$waktu', '$_SESSION[id]', '', '')";
$query = $conn->query($sql);

if ($query) {
	echo '<script>
			window.location.href = "../../../index.php?hd='.$hd.'&fd='.$fd.'&res=sukses&act=tambah";
		 </script>';
}else{
	$data = "Error ".$conn->error;
	echo '<script>
			window.location.href = "../../../index.php?hd='.$hd.'&fd='.$fd.'&res=gagal&act=tambah&cau='.$data.'";
		 </script>';
}

$conn->close();

 ?>

 082182849693