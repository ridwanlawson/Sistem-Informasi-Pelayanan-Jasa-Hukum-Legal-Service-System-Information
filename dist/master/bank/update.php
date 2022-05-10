<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$norek = $_POST['norek'];
$kode = $_POST['kode'];
$gambar = "";
$simpan = "";
if (empty($_FILES['logo']['name'])) {
	$gambar = $_POST['logo_lama'];
} else {
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
			move_uploaded_file($tmp, '../../assets/img/bank/'.date('d-m-Y').'-'.$namafile);
			$gambar = date('d-m-Y').'-'.$namafile;
		}
	}

}
$sql = "UPDATE bank SET nm_bank = '$nama', norek = '$norek', kode = '$kode', logo = '$gambar' WHERE id_bank='$id'";
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