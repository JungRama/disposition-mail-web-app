<!-- Rubah All Atribut -->
<style media="screen">
  #surat-keluar li, .surat li{
    background-color: #2c3e50;
    -webkit-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    -moz-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    color: #fff;
  }
</style>
<script type="text/javascript">
  document.getElementById("page-data").innerHTML = "Update Surat Keluar";
</script>

<?php
  $id = $_GET['id'];
  $query = "SELECT * from tb_surat_keluar WHERE id_surat_keluar='$id'";
  $queryTipeSurat = "SELECT * FROM tb_tipe_surat";
  $no = 1;
  $fungsi = new Fungsi();
  $result= $fungsi->view($query);
  $resultTipeSurat = $fungsi->view($queryTipeSurat);
?>

<?php foreach ($result as $key => $row){ ?>
  <div class="kotak-content" style="height:400px;" id="form-content">
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="col-6">
        <div class="form-content">
          <label for="">Nomor Surat :</label>
          <input type="text" name="no_surat" value="<?php echo $row['no_surat']; ?>" placeholder="Nomor Surat eg.17X/002/0980">
        </div>
        <div class="form-content">
          <label for="">Tanggal Surat Dibuat :</label>
          <input type="date" name="tgl_surat_dibuat" value="<?php echo $row['tgl_surat_dibuat']; ?>" placeholder="Tanggal Surat Dibuat">
        </div>
        <div class="form-content">
          <label for="">Tujuan Surat :</label>
          <input type="text" name="kepada" value="<?php echo $row['kepada']; ?>" placeholder="Tujuan Surat">
        </div>
        <div class="form-content">
          <label for="">Tipe Surat :</label><br>
          <select class="form-select" name="id_tipe_surat">
            <?php
            foreach ($resultTipeSurat as $key => $rows){?>
              <option value="<?php echo $rows['id_tipe_surat']; ?>"
                <?php if ($row['id_tipe_surat'] == $rows['id_tipe_surat']) {echo "selected";} ?>>
                <?php echo $rows['tipe_surat']; ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col-6">
        <div class="form-content">
          <label for="">Judul Surat :</label>
          <input type="text" name="subjek" value="<?php echo $row['subjek']; ?>" placeholder="Judul Surat">
        </div>
        <div class="form-content">
          <label for="">Isi Surat :</label><br>
          <textarea placeholder="Isi Surat" name="isi_surat"><?php echo $row['isi_surat']; ?></textarea>
        </div>
        <div class="form-content">
          <div class="form-content">
              <label for="">File :</label><br>
              <input type="file" name="file" value="">
          </div>
        </div>
      </div>
      <div class="col-12">
        <input type="submit" name="submit" value="Simpan" class="btn-form-submit">
        <input type="reset" name="reset" value="Reset" class="btn-form-reset">
      </div>
    </form>
  </div>
<?php } ?>



<?php
if (isset($_POST['submit'])) {
  $no_surat             = $_POST['no_surat'];
  $tgl_surat_dibuat     = $_POST['tgl_surat_dibuat'];
  $kepada               = $_POST['kepada'];
  $subjek               = $_POST['subjek'];
  $isi_surat            = $_POST['isi_surat'];
  $id_tipe_surat        = $_POST['id_tipe_surat'];
  $file                 = $_FILES['file']['name'];
  // FILE LOKASI
  $lokasi=$_FILES['file']['tmp_name'];
  $dir="file/file-keluar/";

  // INISIALISASI VARIABLE FUNGSI
  $table = "tb_surat_keluar";

  $set = "no_surat='$no_surat',
          tgl_surat_dibuat='$tgl_surat_dibuat',
          kepada='$kepada',
          subjek='$subjek',
          isi_surat='$isi_surat',
          id_tipe_surat='$id_tipe_surat'
         ";

  $setFile = "no_surat='$no_surat',
          tgl_surat_dibuat='$tgl_surat_dibuat',
          kepada='$kepada',
          subjek='$subjek',
          isi_surat='$isi_surat',
          id_tipe_surat='$id_tipe_surat',
          file_upload='$file'
          ";

  $chckFiles = "'$file'";

  $key = "id_surat_keluar='$id'";

  $fileHapus = "file/file-keluar/".$row['file_upload'];

  $fungsi  = new Fungsi();
  $result  = $fungsi->updateWfile($table,$set,$setFile,$chckFiles,$key,$fileHapus);

  if ($result) {
    move_uploaded_file($lokasi,"$dir$file");
    ?>
    <script type="text/javascript">
      alert('Berhasil Update');
      location.href="index.php?show=surat-keluar"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Update');
      location.href="index.php?show=surat-keluar"
    </script>
    <?php
  }
}
?>
