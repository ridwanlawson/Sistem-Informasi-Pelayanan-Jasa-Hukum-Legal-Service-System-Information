<?php 

function uploadFile(){
	
	$hd = $_GET['hd'];
	$fd = $_GET['fd'];

	$namaFile = $_FILES['file']['name'];
	$ukuranFile = $_FILES['file']['size'];
	$error = $_FILES['file']['error'];
	$tmpName = $_FILES['file']['tmp_name'];

	if ($error === 4) {
		$file_old = '';
		return $file_old;
	}

	$allowedExt = ['jpeg', 'jpg', 'png', 'pdf'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $allowedExt)) {
		$data = "Error Format File Harus berupa gambar (.jpg, .png, .jpeg) atau pdf!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	if ($ukuranFile > 10000000) {
		$data = "Error Ukuran File Harus kurang dari 10 MB!";
		echo '<script>
				alert("'.$data.'");
			 </script>';
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
 
	move_uploaded_file($tmpName, '../../assets/img/data/file/'.$namaFileBaru);

	return $namaFileBaru;
}


 ?>
<!--  <a target='_blank' href='https://www.ps2pdf.com/compress-jpg'>Klik Disini Untuk Perkecil Ukuran File</a> -->