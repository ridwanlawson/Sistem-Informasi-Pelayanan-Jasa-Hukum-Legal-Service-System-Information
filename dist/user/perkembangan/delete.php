<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM kasus WHERE id_kasus = {$id}";
	$query = $conn->query($sql);


	if ($query) {
		echo '<script>
				window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=sukses&act=hapus";
			 </script>';
	}else{
	$data = "Error ".$conn->error;
	echo '<script>
			window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=gagal&act=hapus&cau='.$data.'";
		 </script>';
	}

	$conn->close();

 ?>