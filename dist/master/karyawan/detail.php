<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM karyawan WHERE id_karyawan='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=master&fd=karyawan">
  <div class="form-group">
    <label>Nama Karyawan</label>
    <div class="input-group">
      <input type="hidden" class="form-control" value="<?php echo $data->id_karyawan;?>" name="id">
      <input type="text" class="form-control"  minlength="3" required="" maxlength="100" value="<?php echo $data->nm_karyawan;?>" name="nm_karyawan">
    </div>
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <div class="input-group">
      <textarea class="form-control" minlength="5" required="" placeholder="Jl Mahakam No.37 RT.03 RW.10 Kel.Pasaman Timur Kec.Pasaman Timur Kab.Pasaman Timur Prov.Sumatera Barat" name="alamat"><?php echo $data->alamat;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label>Email</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          @
        </div>
      </div>
      <input type="email" minlength="5" required=""  value="<?php echo $data->email;?>"  class="form-control" placeholder="user@user.com" name="email">
    </div>
  </div>
  <div class="form-group">
    <label>No Handphone</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text">
          +62
        </div>
      </div>
      <input type="number" minlength="10" min="999999999" maxlength="15" required="" value="<?php echo $data->nohp;?>" class="form-control" placeholder="0812909999090" name="nohp">
    </div>
  </div>
  <div class="form-group">
    <label>Nama Bidang</label>
    <div class="input-group">
      <select name="id_bidang" class="form-control">
        <?php 
          $querys = $conn->query("SELECT * FROM bidang");
          while ($data_bidang = $querys->fetch_object()) { 
            if ($data->id_bidang === $data_bidang->id_bidang) {?>
            <option value='<?php echo $data_bidang->id_bidang ?>' selected><?php echo $data_bidang->nm_bidang ?></option>
        <?php
            }else{ ?>
            <option value='<?php echo $data_bidang->id_bidang ?>'><?php echo $data_bidang->nm_bidang ?></option>
        <?php } 
          } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label>Nama Jabatan</label>
    <div class="input-group">
      <select name="id_jabatan" class="form-control">
        <?php 
          $queryss = $conn->query("SELECT * FROM jabatan");
          while ($data_jabatan = $queryss->fetch_object()) {
            if ($data->id_jabatan === $data_jabatan->id_jabatan) {?>
            <option value='<?php echo $data_jabatan->id_jabatan ?>' selected><?php echo $data_jabatan->nm_jabatan ?></option>
        <?php
            }else{ ?>
            <option value='<?php echo $data_jabatan->id_jabatan ?>'><?php echo $data_jabatan->nm_jabatan ?></option>
        <?php } 
          } ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label>No Rekening</label>
    <div class="input-group">
      <input type="number" class="form-control" minlength="9" value="<?php echo $data->no_rek;  ?>" maxlength="20" min="1" placeholder="12312778979" name="no_rek">
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
                    <input type="text" class="form-control" placeholder="Nama <?php //echo $nama ?>" name="nm_bidang">
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