<?php
session_start();
include 'dist/config/index.php';

$nm_user = strtolower($_POST['name']);
$email = strtolower($_POST['email']);
$nohp = strtolower($_POST['nohp']);
$alamat = strtolower($_POST['alamat']);
$password = sha1($_POST['password']);
$level = 'user';
$waktu = date('d-m-Y H:i:s');
$sql = "INSERT INTO user VALUES (null, '$nm_user', '$nm_user', '$email', '$nohp', '$alamat', '$password', '$level', '', '$waktu')";
$query = $conn->query($sql);
echo mysqli_error($conn);
if ($query) {
	echo '<script>
			window.location.href = "login.php?stat=berhasil";
		 </script>';
}else{
	$data = "Error ".$conn->error;
	echo '<script>
			window.location.href = "register.php?stat=gagal&isi='.$data.';
		 </script>';
}

$conn->close();

 ?>