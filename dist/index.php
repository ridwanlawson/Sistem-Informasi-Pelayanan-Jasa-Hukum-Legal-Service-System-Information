<?php
include 'header/index.php';
// if (empty($_SESSION['nama'])) {
//   echo '<script>
// 			window.location.href = "../index.php";
// 		</script>';
// }
@$head = $_GET['hd']; 
@$folder = $_GET['fd'];

	if (!empty($head)&&!empty($folder)) {
		if (!isset($_SESSION['level'])) {
		        echo '<script>
		        window.location.href = "index.php";
		      </script>';
		}
		include $head.'/'.$folder.'/index.php';
	}elseif (!empty($folder)) {
		include $folder.'/index.php';
	}else{
		include 'main.php';
	}
?>

<?php
	include 'footer/index.php';
?>