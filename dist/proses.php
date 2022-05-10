<?php
include 'config/index.php';
include 'plugin/uniqueKey.php'; 

if ($_POST['status'] == 'konsultasi') {
	$judul = $_POST['judul'];
	$desk = $_POST['desk'];
	$status = $_POST['status'];
	$idjenis = $_POST['idjenis'];
	$iduserbiasa = $_POST['iduserbiasa'];
	$userhukum = $_POST['id_userhukum'];
	$timestamp = date('Y-m-d H:i:s');

		$sql = "INSERT INTO kasus VALUES (null, '$idjenis', '$userhukum', '$iduserbiasa', '$judul', '$desk', 'pending', '$timestamp')";
		$query = $conn->query($sql);

		echo mysqli_error($conn);
		if ($query) {
			echo '<script>
					window.location.href = "detail.php?idjasa='.$idjenis.'&res=sukses&act=tambah";
				 </script>';
		}else{
			$data = "Error ".$conn->error;
			echo '<script>
					window.location.href = "detail.php?idjasa='.$idjenis.'&res=gagal&act=tambah&cau='.$data.'";
				 </script>';
		}

		$conn->close();

} else {

$id_jasa = $_POST['idjenis'];
	if (@$query) {
		echo '<script>
				window.location.href = "detail.php?idjasa='.$id_jasa.'&res=sukses&act=tambah";
			 </script>';
	}else{
		$data = "Error ".$conn->error;
		echo '<script>
				window.location.href = "detail.php?idjasa='.$id_jasa.'&res=gagal&act=tambah&cau='.$data.'";
			 </script>';
	}

	$conn->close();

}

 ?>