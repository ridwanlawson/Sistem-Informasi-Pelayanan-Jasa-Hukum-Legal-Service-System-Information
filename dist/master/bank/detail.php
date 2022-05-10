<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM bank WHERE id_bank='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=master&fd=bank" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama Bank</label>
    <div class="input-group">
      <input type="hidden" class="form-control" value="<?php echo $data->id_bank;?>" placeholder="250000" name="id">
      <input type="text" class="form-control" value="<?php echo $data->nm_bank;?>" placeholder="250000" name="nama">
    </div>
  </div>
  <div class="form-group">
    <label>No. Rekening</label>
    <div class="input-group">
      <input type="text" class="form-control" value="<?php echo $data->norek;?>" name="norek">
    </div>
  </div>
  <div class="form-group">
    <label>Kode Bank</label>
    <div class="input-group">
      <input type="text" class="form-control" value="<?php echo $data->kode;?>" name="kode">
    </div>
  </div>
  <div class="form-group">
    <label>Logo</label>
    <div class="input-group">
      <input type="hidden" class="form-control" value="<?php echo $data->logo;?>" name="logo_lama">
      <input type="file" class="form-control" name="logo">
    </div>
  </div>
	<div class="modal-footer">
    <button type="submit" class="btn btn-primary pull-right">Save</a></button>
		<button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
	</div>            
</form>

<?php } } ?>
