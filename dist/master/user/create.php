<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php';
$nm_lengkap = $_POST['nm_lengkap'];
$nm_user = $_POST['nm_user'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];
$password = sha1($_POST['password']);
$level = $_POST['level'];
$timestamp = date('Y-m-d H:i:s');

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

$sql = "INSERT INTO user VALUES (null, '$nm_lengkap', '$nm_user', '$email', '$nohp', '$alamat', '$password', '$level', '$gambar' ,'$timestamp')";
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