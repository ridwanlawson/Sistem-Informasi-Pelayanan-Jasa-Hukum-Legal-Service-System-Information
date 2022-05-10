<?php 
	include 'config/index.php';

		$id = $_GET['id'];
		
		$sql = "DELETE FROM transaksi WHERE id_jasa = {$id}";
		$query = $conn->query($sql);


		if ($query) {
			echo '<script>
					window.location.href = "tersimpan.php?res=sukses&act=hapus";
				 </script>';
		}else{
			$data = "Error ".$conn->error;
			echo '<script>
					window.location.href = "tersimpan.php?res=gagal&act=hapus&cau='.$data.'";
				 </script>';
		}

		$conn->close();

 ?>