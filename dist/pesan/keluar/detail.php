<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT pesan.*, user.* FROM pesan, user WHERE pesan.id_pengirim = $_SESSION[id] AND pesan.id_penerima = user.id_user AND pesan.id_pesan = '$id' GROUP BY tanggal_pesan ORDER BY tanggal_pesan";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=pesan&fd=keluar">
  <input type="hidden" class="form-control" value="<?php echo $data->id_pesan;?>" name="id">
  <div class="form-group">
    <label>Nama Penerima</label>
    <div class="input-group">
      <input type="text" class="form-control" readonly="" minlength="" maxlength="10" value="<?php echo ucwords($data->nm_user); ?>" placeholder="BMH" name="inis" required="">
    </div>
  </div>
  <div class="form-group">
    <label>Isi Pesan</label>
    <div class="input-group">
      <textarea class="form-control" name="desk" disabled="" required=""><?php  echo $data->isi_pesan; ?></textarea>
    </div>
  </div>
	<div class="modal-footer">
		<button class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
		<!-- <button type="submit" class="btn btn-primary pull-right">Save</a></button> -->
	</div>            
</form>

<?php } } ?>
