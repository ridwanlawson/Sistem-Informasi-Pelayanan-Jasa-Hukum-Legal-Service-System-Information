<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM banner WHERE id_banner='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=master&fd=banner" enctype="multipart/form-data">
  <div class="form-group">
    <label>Judul Banner</label>
    <div class="input-group">
      <input type="hidden" class="form-control" value="<?php echo $data->id_banner;?>" placeholder="250000" name="id">
      <input type="text" class="form-control" value="<?php echo $data->judul;?>" placeholder="250000" name="judul">
    </div>
  </div>
  <div class="form-group">
    <label>Deskripsi</label>
    <div class="input-group">
      <input type="text" class="form-control" value="<?php echo $data->desk;?>" name="desk">
    </div>
  </div>
  <div class="form-group">
    <label>Logo</label>
    <div class="input-group">
      <input type="hidden" class="form-control" value="<?php echo $data->gambar;?>" name="logo_lama">
      <input type="file" class="form-control" name="logo">
    </div>
  </div>
	<div class="modal-footer">
    <button type="submit" class="btn btn-primary pull-right">Save</a></button>
		<button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
	</div>            
</form>

<?php } } ?>
