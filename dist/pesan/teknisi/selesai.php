<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php';

	$id = $_GET['id'];

	$sql = "UPDATE pesan SET status_pesan = 'selesai teknisi' WHERE id_pesan = {$id}";
	$query = $conn->query($sql);

	if ($query) {
		echo '<script>
				window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=pesan&act=teknisi";
			 </script>';
	}else{
		$data = "Error ".$conn->error;
		echo '<script>
				window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=gagal&act=tolak&cau='.$data.'";
			 </script>';
	}

	$conn->close();

 ?>