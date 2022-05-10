<?php 
	
	function selisih($timestamp){
	    $selisih = time() - strtotime($timestamp) ;
	    $detik = $selisih ;
	    $menit = round($selisih / 60 );
	    $jam = round($selisih / 3600 );
	    $hari = round($selisih / 86400 );
	    $minggu = round($selisih / 604800 );
	    $bulan = round($selisih / 2419200 );
	    $tahun = round($selisih / 29030400 );
	    if ($detik <= 60) {
	        $waktu = $detik.' Detik Lalu';
	    } else if ($menit <= 60) {
	        $waktu = $menit.' Menit Lalu';
	    } else if ($jam <= 24) {
	        $waktu = $jam.' Jam Lalu';
	    } else if ($hari <= 7) {
	        $waktu = $hari.' Hari Lalu';
	    } else if ($minggu <= 4) {
	        $waktu = $minggu.' Minggu Lalu';
	    } else if ($bulan <= 12) {
	        $waktu = $bulan.' Bulan Lalu';
	    } else {
	        $waktu = $tahun.' Tahun Lalu';
	    }
	    return $waktu;
	}

 ?>