<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$id = $_POST['id'];
$karyawan = $_POST['nm_karyawan'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$id_bidang = $_POST['id_bidang'];
$id_jabatan = $_POST['id_jabatan'];
$no_rek = $_POST['no_rek'];

$sql = "UPDATE karyawan SET nm_karyawan = '$karyawan', alamat = '$alamat', email = '$email', nohp = '$nohp', id_bidang = '$id_bidang', id_jabatan = '$id_jabatan',  no_rek = '$no_rek' WHERE id_karyawan = '$id'";
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