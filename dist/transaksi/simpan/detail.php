<?php
include '../../config/index.php';  
  if($_POST['getDetail']) {
    $id = $_POST['getDetail'];
    $query = "SELECT * FROM pengajuan WHERE no_ktp='$id'";
    $result = $conn->query($query);
    while ($data = $result->fetch_object()) {
 ?>
 <!-- Modal -->
<form method="post" action="<?php echo $_SESSION['direct'] ?>update.php?hd=transaksi&fd=pendapatan">
  <div class="form-row">
    <div class="col-md-2 mb-3">
      <label for="validationDefault01">Nama Lengkap/Usaha</label>
      <input readonly type="text" name="nalen" readonly value="<?php echo $data->nama_nasabah;?>" onkeypress="<?php echo $hus; ?>" class="form-control" id="validationDefault01" placeholder="Ujang Maman" autofocus required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault02">Nama Panggilan (Alias)</label>
      <input readonly type="text" name="alias" onkeypress="<?php echo $hu; ?>" value="<?php echo $data->nama_alias;?>" class="form-control" id="validationDefault02" placeholder="Ujang" required>
    </div>
    <div class="col-md-2 mb-3">
    <div class="section-title">Jenis Kelamin</div>
      <label class="form-label"> </label>
      <div class="selectgroup w-100">
        <label class="selectgroup-item">
          <input disabled type="radio" name="jk" value="l" class="selectgroup-input" <?php if ($data->jekel == 'l') { echo 'checked'; } ?> >
          <span class="selectgroup-button">Lelaki</span>
        </label>
        <label class="selectgroup-item">
          <input disabled type="radio" name="jk" value="p" class="selectgroup-input" <?php if ($data->jekel == 'p') { echo 'checked'; } ?> >
          <span class="selectgroup-button">Perempuan</span>
        </label>
      </div>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault03">No. KTP (Identitas Diri)</label>
      <input readonly type="text" name="noktp" onkeypress="<?php echo $an; ?>" value="<?php echo $data->no_ktp;?>" class="form-control" id="validationDefault03" placeholder="12719291xxxxx" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault04">Tempat / Tanggal Lahir</label>
      <div class="input-group">
        <input readonly type="text" name="tplh" onkeypress="<?php echo $hu; ?>" value="<?php echo $data->tempat_lahir;?>" class="form-control" id="validationDefault04" placeholder="Jakarta" aria-describedby="inputGroupPrepend2" required>
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend2">/</span>
        </div>
        <input readonly type="date" name="tglah" class="form-control" value="<?php echo $data->tanggal_lahir;?>" id="validationDefault04" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-5 mb-3">
      <label for="validationDefault06">Alamat Sesuai KTP</label>
      <textarea disabled name="alkt" class="form-control" id="validationDefault06" required><?php echo $data->alamat_ktp;?></textarea>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault07">No.Tel KTP</label>
      <input readonly type="text" name="notek" onkeypress="<?php echo $an; ?>" value="<?php echo $data->telp_ktp;?>" class="form-control" id="validationDefault07" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault08">Kode Pos KTP</label>
      <input readonly type="text" name="kdpk" onkeypress="<?php echo $an; ?>" value="<?php echo $data->kodepos_ktp;?>" class="form-control" id="validationDefault08" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault05">Pekerjaan</label>
      <select disabled class="custom-select" name="peker" id="validationDefault05" required>
        <option selected disabled value="">Pilih Pekerjaan..</option>
        <?php 
          $sql = "SELECT * FROM pekerjaan";
          $querys = $conn->query($sql);
          echo mysqli_error($conn);
          while ($data_pekerjaan = $querys->fetch_object()) {
            if ($data->pekerjaan == $data_pekerjaan->id_pekerjaan) {
            echo "<option value=$data_pekerjaan->id_pekerjaan selected>$data_pekerjaan->nm_pekerjaan</option>";
            }else{
            echo "<option value=$data_pekerjaan->id_pekerjaan>$data_pekerjaan->nm_pekerjaan</option>";
            }
          }
         ?>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-5 mb-3">
      <label for="validationDefault09">Alamat Sesuai Domisili</label>
      <textarea disabled name="aldo" onkeypress="<?php echo $anhu; ?>" class="form-control" id="validationDefault09" required><?php echo $data->alamat_dom ?></textarea>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault10">No.Tel Domisili</label>
      <input readonly type="text" name="noted" onkeypress="<?php echo $an; ?>" value="<?php echo $data->telp_dom;?>" class="form-control" id="validationDefault10" required>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault11">Kode Pos Domisili</label>
      <input readonly type="text" name="kdpd" onkeypress="<?php echo $an; ?>" value="<?php echo $data->kodepos_dom;?>" class="form-control" id="validationDefault11" required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault12">Nama Gadis Ibu Kandung</label>
      <input readonly type="text" name="nmibu" onkeypress="<?php echo $hus; ?>" value="<?php echo $data->nama_ibu;?>" class="form-control" id="validationDefault12" required>
     </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault13">Jumlah Permohonan Kredit</label>
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
      <input readonly type="text" name="jpk" value="<?php echo number_format($data->jumlah_permohonan);?>" class="form-control" id="validationDefault13" required>
      </div>
    </div>
    <div class="col-md-8 mb-3">
      <label for="validationDefault14">Jangka Waktu Pinjaman</label>
      <div class="input-group-prepend">
      <input readonly type="number" min="1" value="<?php echo $data->jangka_waktu;?>" name="jwp" maxlength="4" onkeypress="<?php echo $an; ?>" placeholder="2" class="form-control" id="validationDefault14" required>
        <span class="input-group-text" id="inputGroupPrepend2">Bulan, untuk keperluan</span>
      <input readonly type="text" name="kep" placeholder="Membuka Usaha Baru" value="<?php echo $data->keperluan;?>" class="form-control" id="validationDefault14" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault15">Jaminan yang diserahkan</label>
      <div class="input-group-prepend">
      <input readonly type="text" name="jmn" placeholder="1 unit motor" value="<?php echo $data->jaminan;?>" onkeypress="<?php echo $anhu; ?>" class="form-control" id="validationDefault15" required>
        <span class="input-group-text" id="inputGroupPrepend2">Dengan harga Rp.</span>
      <input readonly type="text" name="hjmn"value="<?php echo number_format($data->harga_jaminan);?>" onkeypress="<?php echo $an; ?>" class="form-control" id="validationDefault15" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault16">Pendapatan Per Bulan</label>
      <div class="input-group-prepend">
       <span class="input-group-text" id="inputGroupPrepend1">Rp.</span>
      <input readonly type="text" name="pdptb" value="<?php echo number_format($data->pendapatan_bulanan);?>" class="form-control" id="validationDefault16" required>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault17">Pengeluaran Per Bulan</label>
      <div class="input-group-prepend">
       <span class="input-group-text" id="inputGroupPrepend1">Rp.</span>
      <input readonly type="text" name="pglnb" value="<?php echo number_format($data->pengeluaran_bulanan);?>" class="form-control" id="validationDefault17" required>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault18">Kesanggupan Membayar</label>
      <div class="input-group-prepend">
       <span class="input-group-text" id="inputGroupPrepend1">Rp.</span>
      <input readonly type="text" name="ksgp" value="<?php echo number_format($data->kesanggupan);?>" class="form-control" id="validationDefault18" required>
      </div>
      </div>
  </div>
<?php } 
    $querys = "SELECT * FROM file WHERE no_ktp='$id'";
    $results = $conn->query($querys);
    while ($datas = $results->fetch_object()) {
?>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="validationDefault16">File KTP</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/ktp/<?php echo $datas->ktp ?>">Lihat File KTP</a>
      </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault16">File KK</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/kk/<?php echo $datas->nik_kk ?>">Lihat File KK</a>
      </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault16">Surat Nikah</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/suni/<?php echo $datas->s_nikah ?>">Lihat File Surat Nikah</a>
      </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault16">File PBB</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/pbb/<?php echo $datas->pbb ?>">Lihat File PBB</a>
      </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault16">Rek.Listrik</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/rekli/<?php echo $datas->r_listrik ?>">Lihat File Rek. Listrik</a>
      </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="validationDefault16">Rek.Tabungan</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/rekta/<?php echo $datas->r_tabungan ?>">Lihat File Rek. Tabungan</a>
      <div class="input-groupgroup-prepend">
      </div>
      </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault16">File Slip Gaji</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/slip/<?php echo $datas->slip ?>">Lihat File Slip Gaji</a>
      </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault16">File Izin-izin Usaha</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/izin/<?php echo $datas->izin ?>">Lihat File Izin Usaha</a>
    </div>
    <div class="col-md-2 mb-3">
      <label for="validationDefault16">SHM/SHGB, IMB</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/imb/<?php echo $datas->shm ?>">Lihat File SHM, IMB</a>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault16">BPKB, Faktur, STNK, SIM</label><br>
      <a align="center" style="text-decoration: none;" target="_blank" class="form-control" href="assets/img/data/bpkb/<?php echo $datas->bpkb ?>">Lihat File BPKB, Faktur, STNK, SIM</a>
    </div>
  </div> 
  <div class="modal-footer">
    <a href="<?php echo $_SESSION['direct']; ?>lap_individu.php?id=<?php echo $datas->no_ktp; ?>" class="btn btn-primary" target="_blank">Print</a>
    <button class="btn btn-danger pull-left" data-dismiss="modal">Close</a></button>
  </div>            
</form>

<?php } } ?>
