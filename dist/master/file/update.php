<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$id = $_POST['id'];
$jenis = $_POST['jenis'];
$hrgmin = $_POST['hrgmin'];
$hrgmax = $_POST['hrgmax'];
$waktu = date('Y-m-d H:i:s');


$sql = "UPDATE jasa SET id_jenis = '$jenis', hargamin = '$hargamin', hargamax = '$hargamax', waktu_diubah = '$waktu', user_pengubah = '$_SESSION[id]' WHERE id_jasa = '$id'";
$query = $conn->query($sql);

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