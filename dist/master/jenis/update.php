<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$id = $_POST['id'];
$jenis = $_POST['nm_jenis'];
$desk = $_POST['desk_jenis'];

	$limit = 10 * 1024 * 1024;
	$ekstensi =  array('png','jpg','jpeg');
	$jumlahFile = count($_FILES['foto']['name']);

	if (empty($_FILES['foto']['name'])) {
		$gambar = $_POST['foto_lama'];
	}else{

		$namafile = $_FILES['foto']['name'];
		$tmp = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
		$ukuran = $_FILES['foto']['size'];	
		if($ukuran > $limit){
			header("location:index.php?alert=gagal_ukuran");		
		}else{
			if(!in_array($tipe_file, $ekstensi)){
				header("location:index.php?alert=gagal_ektensi");			
			}else{		
				move_uploaded_file($tmp, '../../assets/img/file/'.date('d-m-Y').'-'.$namafile);
				$gambar = date('d-m-Y').'-'.$namafile;
			}
		}
	}

$sql = "UPDATE jenis SET gambar = '$gambar', desk_jenis = '$desk', nm_jenis = '$jenis' WHERE id_jenis = '$id'";
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