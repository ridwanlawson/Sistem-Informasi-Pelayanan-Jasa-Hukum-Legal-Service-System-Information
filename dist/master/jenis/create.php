<?php
include '../../config/index.php'; 
$hd = $_GET['hd'];
$fd = $_GET['fd'];

$jenis = $_POST['nm_jenis'];
$desk = $_POST['desk_jenis'];
$waktu = date('Y-m-d H:i:s');
	
	$limit = 10 * 1024 * 1024;
	$ekstensi =  array('png','jpg','jpeg');
	$jumlahFile = count($_FILES['foto']['name']);

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

$sql = "INSERT INTO jenis VALUES (null, '$jenis', '$desk', '$gambar', '$waktu')";
$query = $conn->query($sql);
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