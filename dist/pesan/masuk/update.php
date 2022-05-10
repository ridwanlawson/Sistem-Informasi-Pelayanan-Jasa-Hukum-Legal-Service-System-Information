<?php
$hd = $_GET['hd'];
$fd = $_GET['fd'];
include '../../config/index.php'; 
$id_pesan = $_POST['id_pesan'];
$id_user = $_POST['id_user'];
$nohp = $_POST['nohp'];
$desk = $_POST['desk'];
$timestamp = date('Y-m-d H:i:s');

$sql = "UPDATE pesan SET status_pesan = 'proses' WHERE id_pesan = '$id_pesan'";
// echo $sql;
$query = $conn->query($sql);
$sql1 = "INSERT INTO pesan VALUES(null, '$_SESSION[id]', '$id_user', 'Pengaduan diproses', '$desk', '', '', '$timestamp')";
// echo "<br>".$sql1;
$query1 = $conn->query($sql1);
echo mysqli_error($conn);
if ($query) {
	echo '<script>
			window.location.href = "https://api.whatsapp.com/send?phone=62'.$nohp.'&text='.$desk.'";
		 </script>';
}else{
	$data = "Error ".$conn->error;
	echo '<script>
			window.location.href = "../../index.php?hd='.$hd.'&fd='.$fd.'&res=gagal&act=ubah&cau='.$data.'";
		 </script>';
}

$conn->close();

 ?>