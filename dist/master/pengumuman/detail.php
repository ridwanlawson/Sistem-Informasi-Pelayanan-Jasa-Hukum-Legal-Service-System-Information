<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM pengumuman WHERE id_pengumuman='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {
 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=master&fd=pengumuman">
  <div class="form-group">
    <label>Pengumuman</label>
    <div class="input-group">
      <input type="hidden" class="form-control" value="<?php echo $data->id_pengumuman;?>" name="id">
      <textarea class="form-control" placeholder="<?php echo $nama ?>" name="nm_pengumuman"><?php echo $data->nm_pengumuman;?></textarea>
    </div>
  </div>
	<div class="form-group">
    <label>Status</label>
    <div class="input-group">
      <select class="form-control" placeholder="<?php echo $nama ?>" name="status"><?php echo $data->nm_pengumuman;?>
      <?php if ($data->status_pengumuman == 'aktif') { ?>
        <option selected="" value="aktif">Aktif</option>
        <option value="nonaktif">NonAktif</option>
      <?php }elseif ($data->status_pengumuman == 'nonaktif') { ?>
        <option value="aktif">Aktif</option>
        <option selected="" value="nonaktif">NonAktif</option>
        # code...
      <?php } ?>
      </select>
    </div>
  </div>
	<div class="modal-footer">
		<button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
		<button type="submit" class="btn btn-primary pull-right">Save</a></button>
	</div>            
</form>

<?php } } ?>
      <!-- Modal Edit -->
<!--       <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModal">Edit <?php //echo $nama ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="update.php" method="post">
              <div class="modal-body">
              <p>Modals body text goes here.</p>
                <div class="form-group">
                  <label>Nama <?php //echo $nama ?></label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nama <?php //echo $nama ?>" name="nm_pengumuman">
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div> -->
      <!-- //Modal Edit -->