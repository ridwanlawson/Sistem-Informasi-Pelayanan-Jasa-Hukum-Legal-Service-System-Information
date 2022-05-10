<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$karyawan = $_POST['nm_karyawan'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$id_bidang = $_POST['id_bidang'];
$id_jabatan = $_POST['id_jabatan'];
$no_rek = $_POST['no_rek'];

$sql = "INSERT INTO karyawan VALUES (null, '$karyawan', '$alamat', '$email', '$nohp', '$id_bidang', '$id_jabatan', '$no_rek')";
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