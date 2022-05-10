<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM perusahaan WHERE id_perusahaan='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=profil&fd=perusahaan">
  <input type="hidden" class="form-control" value="<?php echo $data->id_perusahaan;?>" name="id">
  <div class="form-group">
    <label>Nama Perusahaan</label>
    <div class="input-group">
      <input type="text" class="form-control" minlength="5" maxlength="100" value="<?php  echo $data->nm_perusahaan; ?>" placeholder="PT Bismillah" name="nama" required="">
    </div>
  </div>
  <div class="form-group">
    <label>Inisial Nama</label>
    <div class="input-group">
      <input type="text" class="form-control" minlength="" maxlength="10" value="<?php  echo $data->init_perusahaan; ?>" placeholder="BMH" name="inis" required="">
    </div>
  </div>
  <div class="form-group">
    <label>Deskripsi Perusahaan</label>
    <div class="input-group">
      <textarea class="form-control" minlength="9" name="desk" required=""><?php  echo $data->desk_perusahaan; ?></textarea>
    </div>
  </div>
	<div class="modal-footer">
		<button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
		<button type="submit" class="btn btn-primary pull-right">Save</a></button>
	</div>            
</form>

<?php } } ?>
