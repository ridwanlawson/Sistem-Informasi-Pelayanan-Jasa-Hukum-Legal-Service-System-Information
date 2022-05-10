<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT pesan.*, user.* FROM pesan, user WHERE pesan.id_penerima = $_SESSION[id] AND pesan.id_pengirim = user.id_user AND pesan.id_pesan = '$id' GROUP BY tanggal_pesan ORDER BY tanggal_pesan";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
  <script>    
    // membuat function tampilkan_nama
    function tutup(){
      document.getElementById("tutup").innerHTML = "<h3>Klik Untuk Melihat Hasilnya</h3>";
    }
    
  </script>
 <!-- Modal -->
<form method="post" target="_blank"  action="<?php echo $_SESSION['direct'] ?>update.php?hd=pesan&fd=masuk">
  <input type="hidden" class="form-control" value="<?php echo $data->id_pesan;?>" name="id_pesan">
  <input type="hidden" class="form-control" value="<?php echo $data->id_user;?>" name="id_user">
  <input type="hidden" value="<?php echo ucwords($data->no_hp); ?>" name="nohp">
  <div class="form-group">
    <label>Nama Penerima</label>
    <div class="input-group">
      <input type="text" class="form-control" readonly="" minlength="" maxlength="10" value="<?php echo ucwords($data->nm_user); ?>" placeholder="BMH" name="inis" required="">
    </div>
  </div>
  <div class="form-group">
    <label>Isi Pesan</label>
    <div class="input-group">
      <textarea class="col-md-12" style="height: 100px; border-color: cyan;" name="desk" required="">Selamat Siang Bapak/Ibu Kami dari Teknisi PT Telkom Akses Mengabarkan bahwa Pengaduan anda sedang kami proses, ditunggu konfirmasi dari kami yaa!. Semoga dalam keadaan bahagia dan sehat selalu :-)</textarea>
    </div>
  </div>
	<div class="modal-footer">
		<button class="btn btn-danger pull-left" onclick="window.location.reload()" data-dismiss="modal"><b id="tutup">Close</b></button>
		<button type="submit" class="btn btn-success pull-right" onclick="tutup()" >Send</a></button>
	</div>            
</form>

<?php } } ?>

"