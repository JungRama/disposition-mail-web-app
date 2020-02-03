<!-- Rubah All Atribut -->
<style media="screen">
  #surat-masuk li, .surat li{
    background-color: #2c3e50;
    -webkit-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    -moz-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    color: #fff;
  }
  #form-content{
    display: none;
  }
</style>
<script type="text/javascript">
  document.getElementById("page-data").innerHTML = "Update Disposisi";
</script>



<?php
  $id_mail = $_GET['idmail'];
  $id_dispo = $_GET['id'];
  $no = 1;
  $dataSurat = "SELECT * from tb_disposisi WHERE id_disposisi='$id_dispo'";
  $result= $crud->view($dataSurat);
?>

<?php foreach ($result as $key => $row){?>
<div class="kotak-content" style="height:310px;">
  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="col-6">
      <div class="form-content">
        <label for="">Tanggal :</label>
        <input type="date" name="tgl_disposisi" value="<?php echo $row['tgl_disposisi']; ?>" placeholder="Tanggal Disposisi">
      </div>
      <div class="form-content">
        <label for="">Tujuan Disposisi :</label>
        <input type="text" name="tujuan_disposisi" value="<?php echo $row['tujuan_disposisi']; ?>" placeholder="Tujuan Disposisi">
      </div>
    </div>
    <div class="col-6">
      <div class="form-content">
        <label for="">Isi Disposisi :</label><br>
        <textarea placeholder="Isi Surat" name="isi_disposisi"><?php echo $row['isi_disposisi']; ?></textarea>
      </div>
      <div class="form-content">
        <label for=""><b>Sifat :</b></label><br>
        <select class="form-select" name="sifat_disposisi">
          <option value="1"<?php if ($row['sifat_disposisi'] == '1') echo ' selected="selected"'; ?>>Biasa</option>
          <option value="2"<?php if ($row['sifat_disposisi'] == '2') echo ' selected="selected"'; ?>>Penting</option>
          <option value="3"<?php if ($row['sifat_disposisi'] == '3') echo ' selected="selected"'; ?>>Rahasia</option>
        </select>
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
  $tgl_disposisi = $_POST['tgl_disposisi'];
  $tujuan_disposisi = $_POST['tujuan_disposisi'];
  $isi_disposisi = $_POST['isi_disposisi'];
  $sifat_disposisi = $_POST['sifat_disposisi'];

  $table = "tb_disposisi";
  $set = "tgl_disposisi='$tgl_disposisi',
          tujuan_disposisi='$tujuan_disposisi',
          isi_disposisi='$isi_disposisi',
          sifat_disposisi='$sifat_disposisi'
        ";
  $key = "id_disposisi='$id_dispo'";

  $fungsi  = new Fungsi();
  $result  = $fungsi->update($table,$set,$key);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert('Berhasil Update');
      location.href="index.php?show=disposisi&id=<?php echo $id_mail; ?>"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Update');
      location.href="index.php?show=disposisi&id=<?php echo $id_mail; ?>"
    </script>
    <?php
  }
}
?>
