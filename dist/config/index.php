<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

   $conn = new mysqli("localhost", "root", "", "jasahukum");

   // $host        = "host = 127.0.0.1";
   // $port        = "port = 5432";
   // $dbname      = "dbname = amp";
   // $credentials = "user = postgres password=admin";

   // $db = pg_connect("$host $port $dbname $credentials");

function tglKegiatan($tgl){
  //Date Start
  $tglmulai = substr($tgl,3,2);
  $blnmulai = substr($tgl,0,2);
  $thnmulai = substr($tgl,6,4);
  $mulai = $thnmulai.'-'.$blnmulai.'-'.$tglmulai;

  $tglakhir = substr($tgl,16,2);
  $blnakhir = substr($tgl,13,2);
  $thnakhir = substr($tgl,19,4);
  $akhir = $thnakhir.'-'.$blnakhir.'-'.$tglakhir;
  //Date End
  return array("mulai"=>$mulai, "akhir"=>$akhir,"tglmulai"=>$tglmulai,"blnmulai"=>$blnmulai,"thnmulai"=>$thnmulai,"tglakhir"=>$tglakhir,"blnakhir"=>$blnakhir,"thnakhir"=>$thnakhir);
}

function selisihss($tglawal,$tglakhir){
  $date1 = date_create($tglawal);
  $date2 = date_create($tglakhir);
  $datediff = date_diff($date1,$date2);
  $selisih = $datediff->format("%a")+1;
  return $selisih;
}
?>
<!-- <script>alert('Berhasil')</script> -->