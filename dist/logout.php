<?php  
session_start();
session_destroy();
include "config/index.php";
  $timestamp = date('Y-m-d H:i:s');
  // $query=mysqli_query($conn, "INSERT INTO log VALUES(null, '$_SESSION[id]', '$_SESSION[nama] Logout Berhasil', 'logout', '$timestamp')");
  echo '<script>
			window.location.href = "../index.php";
		</script>';


?>

