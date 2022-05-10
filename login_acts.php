<?php 
include 'dist/config/index.php';
$nama = $_POST['user'];
$pass = $_POST['pass'];
// echo $nama.$pass;
$pas=sha1($pass);
$query=mysqli_query($conn, "SELECT * FROM user WHERE nm_user='$nama' AND pass='$pas' OR email='$nama' AND pass='$pas'") or die(mysqli_error());
if(mysqli_num_rows($query)==1){
   $row = mysqli_fetch_assoc($query);
   if($row['level'] == "admin"){
      $_SESSION['id']=$row['id_user'];
      $_SESSION['nama']=$nama;
      $_SESSION['level']=$row['level'];
      $_SESSION['alamat']=$row['alamat'];
      $timestamp = date('Y-m-d H:i:s');
      $query=mysqli_query($conn, "INSERT INTO log VALUES(null, '$_SESSION[id]', '$_SESSION[nama] Login Berhasil', 'login', '$timestamp')");
      echo '<script>
				window.location.href = "dist/index.php?hd=master&&fd=file";
			</script>';
    }elseif ($row['level'] == "hukum"){
      $_SESSION['id']=$row['id_user'];
      $_SESSION['nama']=$nama;
      $_SESSION['level']=$row['level'];
      $_SESSION['alamat']=$row['alamat'];
      $timestamp = date('Y-m-d H:i:s');
      $query=mysqli_query($conn, "INSERT INTO log VALUES(null, '$_SESSION[id]', '$_SESSION[nama] Login Berhasil', 'login', '$timestamp')");
      echo '<script>
				window.location.href = "dist/index.php?hd=user&fd=jadwal&level=hukum";
			</script>';
   }elseif ($row['level'] == "user"){
      $_SESSION['id']=$row['id_user'];
      $_SESSION['nama']=$nama;
      $_SESSION['level']=$row['level'];
      $_SESSION['alamat']=$row['alamat'];
      $timestamp = date('Y-m-d H:i:s');
      $query=mysqli_query($conn, "INSERT INTO log VALUES(null, '$_SESSION[id]', '$_SESSION[nama] Login Berhasil', 'login', '$timestamp')");
      echo '<script>
				window.location.href = "dist/index.php?login=user";
			</script>';
   }
}else{
      $timestamp = date('Y-m-d H:i:s');
      // $query=mysqli_query($conn, "INSERT INTO log VALUES(null, '$_SESSION[id]', '$_SESSION[nama] Login Gagal', 'login', '$timestamp')");
      echo '<script>
				window.location.href = "index.php?aneh";
			</script>';
}
?>


<!-- <meta http-equiv="refresh" content="0; url:dist/index.php?amak=kau">';
header("location:testing/index.php"); -->