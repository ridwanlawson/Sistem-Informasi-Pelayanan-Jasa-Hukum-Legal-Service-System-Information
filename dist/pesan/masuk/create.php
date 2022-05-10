<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php';

$idpna = $_POST['id_penerima'];
$idpnm = $_SESSION['id'];
$pesan = htmlspecialchars($_POST['desk']);
$timestamp = date('Y-m-d H:i:s');

$sql = "INSERT INTO pesan VALUES (null, '$idpnm', '$idpna', '$pesan', '$timestamp')";
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