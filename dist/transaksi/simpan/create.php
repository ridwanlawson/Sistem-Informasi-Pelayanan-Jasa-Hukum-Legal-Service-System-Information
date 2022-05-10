<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$tgl = $_POST['tgl'];
$rincian = $_POST['rincian'];
$kredit = $_POST['kredit'];

$sql = "INSERT INTO arus VALUES (null, '$rincian', '', '$kredit', '$tgl')";
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