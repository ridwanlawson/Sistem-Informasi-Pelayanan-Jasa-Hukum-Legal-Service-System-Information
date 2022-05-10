<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$judul = $_POST['judul'];
$desk = $_POST['desk'];
$timestamp = date('Y-m-d H:i:s');
$gambar = "";
$simpan = "";

$limit = 10 * 1024 * 1024;
$ekstensi =  array('png','jpg','jpeg');
$jumlahFile = count($_FILES['logo']['name']);
	$namafile = $_FILES['logo']['name'];
	$namafile = $_FILES['logo']['name'];
	$tmp = $_FILES['logo']['tmp_name'];
	$tipe_file = strtolower(pathinfo($namafile, PATHINFO_EXTENSION));
	$ukuran = $_FILES['logo']['size'];	
	if($ukuran > $limit){
		echo "<br>alert=gagal_ukuran";		
	}else{
		if(!in_array($tipe_file, $ekstensi)){
			echo "alert=gagal_ektensis";			
		}else{		
			move_uploaded_file($tmp, '../../assets/img/banner/'.date('d-m-Y').'-'.$namafile);
			$gambar = date('d-m-Y').'-'.$namafile;
			$sql = "INSERT INTO banner VALUES (null, '$judul', '$desk', '$gambar', '$timestamp')";
		}
	}


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