<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM jenis WHERE id_jenis='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=master&fd=jenis" enctype="multipart/form-data">
	<div class="form-group row">
		<div class="col-sm-8">
			<input type="hidden" class="form-control" value="<?php echo $data->id_jenis;?>" name="id">
		</div>
	</div>
    <div class="form-group">
      <label>Nama Jenis</label>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Nama Jenis" value="<?= $data->nm_jenis ?>" name="nm_jenis">
      </div>
    </div>
    <div class="form-group">
      <label>Deskripsi Jenis</label>
      <div class="input-group">
        <textarea class="" style="width:100%;" placeholder="Deskripsi Jenis" name="desk_jenis"><?= $data->desk_jenis ?></textarea>
      </div>
    </div>
    <div class="form-group">
      <label>Gambar</label>
      <div class="input-group">
        <input type="file" class="form-control" placeholder="Deskripsi <?php echo $nama ?>" name="foto">
        <input type="hidden" class="form-control" name="foto_lama" value="<?= $data->gambar ?>">
      </div>
    </div>
	<div class="modal-footer">
		<button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
		<button type="submit" class="btn btn-primary pull-right">Save</a></button>
	</div>            
</form>

<?php } } ?>