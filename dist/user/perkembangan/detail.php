<?php
include '../../config/index.php';  
	if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM perkembangan WHERE id_kasus='$id'";
    $result = $conn->query($query);

    $queryss = "SELECT status FROM kasus WHERE id_kasus='$id'";
    $resultss = $conn->query($queryss);
    $datasss  = $resultss->fetch_object();
    while ($data = $result->fetch_object()) {

 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=user&fd=perkembangan" enctype="multipart/form-data">
  <div class="form-row"> 
    <div class="form-group col-md-7">
      <label>Deskripsi</label>
        <input type="hidden" class="form-control" value="<?php echo $data->id_perkembangan;?>"  name="id">
        <textarea class="" style="width:100%;" name="desk"><?php echo $data->deskripsi_perkembangan;?></textarea>
    </div>
    <div class="form-group col-md-4">
      <label>Status</label>
      <input type="" name="" value="<?php echo $data->status;?>" class="form-control">
      <a href="assets/img/file/<?php echo $data->file;?>">Lihat File</a>
    </div>
<?php if ($_SESSION['level'] == 'hukum' AND $datasss->status != "selesai"): ?>
    <div class="form-group col-md-1">
      <label>Action</label>
      <a href="<?php echo $_SESSION['direct'] ?>delperkembangan.php?hd=user&fd=perkembangan&id=<?php echo $data->id_perkembangan;?>" class="btn btn-danger">Hapus</a>
    </div>
<?php endif ?>

  </div>
</form>

<?php } } ?>
