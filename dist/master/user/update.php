<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 

$id = $_POST['id'];
$nm_lengkap = $_POST['nm_lengkap'];
$nm_user = $_POST['nm_user'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$password = $_POST['password'];
$level = $_POST['level'];
$alamat = $_POST['alamat'];


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

if (empty($password)) {
	$sql = "UPDATE user SET gambar = '$gambar', alamat = '$alamat', nm_user = '$nm_user', nm_lengkap = '$nm_lengkap', email = '$email', no_hp = '$nohp', level = '$level' WHERE id_user = '$id'";
}else{
	$pass = sha1($password);
	$sql = "UPDATE user SET gambar = '$gambar', alamat = '$alamat', nm_user = '$nm_user', email = '$email', no_hp = '$nohp', pass = '$pass', level = '$level' WHERE id_user = '$id'";
}
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