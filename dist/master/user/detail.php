<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM user WHERE id_user='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=master&fd=user" enctype="multipart/form-data">
      <input type="hidden" class="form-control" value="<?php echo $data->id_user;?>" name="id">
  <div class="form-group">
    <label>Nama Lengkap </label>
    <div class="input-group">
      <input type="text" class="form-control" value="<?php echo $data->nm_lengkap;?>" required="" placeholder="Nama Lengkap" name="nm_lengkap">
    </div>
  </div>
  <div class="form-group">
    <label>Nama User</label>
    <div class="input-group">
      <input type="text" class="form-control" value="<?php echo $data->nm_user;?>" name="nm_user">
    </div>
  </div>
  <div class="form-group">
    <label>Password</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-lock"></i>
        </div>
      </div>
      <input type="password" class="form-control pwstrength" data-indicator="pwindicator" placeholder="Isi jika ingin ganti Password" name="password">
    </div>
    <div id="pwindicator" class="pwindicator">
      <div class="bar"></div>
      <div class="label"></div>
    </div>
  </div>
  <div class="form-group">
    <label>Email</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">@</div>
      </div>
      <input type="email" class="form-control" value="<?php echo $data->email;?>" required="" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label>Nomor Handphone</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">+62</div>
      </div>
      <input type="number" class="form-control" value="<?php echo $data->no_hp;?>" required="" placeholder="Nomor Handphone" name="nohp">
    </div>
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <div class="input-group">
      <textarea class="form-control" required="" placeholder="Jl Jati Parak Salai No.1" name="alamat"><?php echo $data->alamat;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label>Foto</label>
    <div class="input-group">
      <input type="file" class="form-control" name="foto">
      <input type="hidden" class="form-control" name="foto_lama" value="<?php echo $data->gambar;?>">
    </div>
  </div>
  <div class="form-group">
    <label>Level</label>
    <div class="input-group">
      <select class="form-control" name="level">
        <?php 
          if ($data->level=='user') {
            echo '<option value="user" selected>User</option>';
            echo '<option value="admin">Admin</option>';
            echo '<option value="hukum">Pelayan Hukum</option>';
          }elseif ($data->level=='admin') {
            echo '<option value="user">User</option>';
            echo '<option value="admin" selected>Admin</option>';
            echo '<option value="hukum">Pelayan Hukum</option>';
          }elseif ($data->level=='hukum') {
            echo '<option value="user">User</option>';
            echo '<option value="admin">Admin</option>';
            echo '<option value="hukum" selected>Pelayan Hukum</option>';
          }else {
            echo '<option value="user">User</option>';
            echo '<option value="admin">Admin</option>';
            echo '<option value="hukum">Pelayan Hukum</option>';
          }
         ?>
      </select>
    </div>
  </div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary pull-right">Save</a></button>
    <button class="btn btn-danger pull-left" data-dismiss="modal">Cancel</a></button>
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
                    <input type="text" class="form-control" placeholder="Nama <?php //echo $nama ?>" name="nm_user">
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