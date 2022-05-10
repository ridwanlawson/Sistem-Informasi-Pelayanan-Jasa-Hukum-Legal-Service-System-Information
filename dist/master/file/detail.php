<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM jasa WHERE id_jasa='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
    <div class="row">
      <div class="form-group col-3">
        <label>Jenis</label>
        <div class="input-group">
          <input type="hidden" name="id" value="<?= $data->id_jasa ?>">
          <select class="form-control select2" style="width: 100%" name="jenis" required>
          <?php 
            $queryss = "SELECT jenis.* FROM jenis";
            $results = $conn->query($queryss);
            while ($datajenis = $results->fetch_object()) { 
              if ($datajenis->id_jenis == $data->id_jenis) { 
          ?>
                <option value="<?= $datajenis->id_jenis ?>" selected><?= $datajenis->nm_jenis ?></option>
          <?php 
              }else{
          ?>
                <option value="<?= $datajenis->id_jenis ?>"><?= $datajenis->nm_jenis ?></option>
          <?php 
              }
            } 
          ?>
          </select>
        </div>
      </div>
      <div class="form-group col-3">
        <label>Judul</label>
        <input type="text" class="form-control" name="nm" value="<?= $data->nm_jasa ?>" required>
      </div>
      <div class="form-group col-3">
        <label>Abstrak</label>
        <textarea name="abstrak" required style="width:100%;"><?= $data->desk_jasa ?></textarea>
      </div>
      <div class="form-group col-3">
        <label>Keyword</label>
        <input type="text" class="form-control" name="kw" value="<?= $data->keyword ?>" required>
      </div>
      <div class="form-group col-3">
        <label>Nama Mahasiswa</label>
        <input type="text" class="form-control" name="nmmhs" value="<?= $data->mahasiswa ?>" required>
      </div>
      <div class="form-group col-3">
        <label>Nama Pembimbing 1</label>
        <input type="text" class="form-control" name="nmpbb1" value="<?= $data->namapemb1 ?>" required>
      </div>
      <div class="form-group col-3">
        <label>Nama Pembimbing 2</label>
        <input type="text" class="form-control" name="nmpbb2" value="<?= $data->namapemb2 ?>" required>
      </div>
      <div class="form-group col-3">
        <label>Nama Penguji</label>
        <input type="text" class="form-control" name="nmpgj" value="<?= $data->namapeng ?>" required>
      </div>
      <div class="form-group col-2">
        <label>Tahun</label>
        <input type="number" class="form-control" min="2000" max="<?= date('Y')?>"  name="tahun" value="<?= $data->tahun ?>" required>
      </div>
      <div class="form-group col-3">
        <label>Fakultas</label>
        <input type="text" class="form-control" name="fakultas" value="<?= $data->fakultas ?>" required>
      </div>
      <div class="form-group col-3">
        <label>Jurusan</label>
        <input type="text" class="form-control" name="jurusan" value="<?= $data->jurusan ?>" required>
      </div>
      <div class="form-group col-1">
        <label>Halaman</label>
        <input type="number" class="form-control" name="halaman" value="<?= $data->halaman ?>" required>
      </div>
      <div class="form-group col-3">
        <label>File</label>
        <input type="hidden" class="form-control" name="foto_lama" value="<?= $data->file ?>">
        <input type="file" class="form-control" name="foto" accept=".pdf,.docx,.doc">
      </div>
    </div>
  </div>        
</form>

<?php } } ?>