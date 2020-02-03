<!-- Rubah All Atribut -->
<style media="screen">
  #set-akun li{
    background-color: #2c3e50;
    -webkit-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    -moz-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    color: #fff;
  }
</style>
<script type="text/javascript">
  document.getElementById("page-data").innerHTML = "Setting Akun";
</script>

<div class="kotak-content" style="height:260px;" id="form-content">
  <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <?php
      $username = $_SESSION['username'];
      $query = "SELECT * from tb_user WHERE username='$username'";
      $result= $crud->view($query);
    ?>
    <?php foreach ($result as $key => $row) {  ?>
    <div class="col-6">
      <div class="form-content">
        <label for="">Nama Lengkap :</label>
        <input type="text" name="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" placeholder="Nama Lengkap">
      </div>
      <div class="form-content">
        <label for="">Nama Panggilan :</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" placeholder="Nama Panggilan">
      </div>
      <div style="margin-top:40px;">
        <input type="submit" name="submit" value="Simpan" class="btn-form-submit">
        <input type="reset" name="reset" value="Reset" class="btn-form-reset">
      </div>
    </div>
    <div class="col-6">
      <div class="form-content">
        <label for="">Username :</label>
        <input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Username">
      </div>
      <div class="form-content">
        <label for="">Password :</label>
        <input type="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Password">
      </div>
      <div class="form-content">
        <div class="col-3">
          <img src="img/foto/<?php echo $row['foto']; ?>" alt="" width="70px">
        </div>
        <div class="col-9">
          <label for="">Foto :</label><br>
          <input type="file" name="file" value="<?php echo $row['foto']; ?>">
        </div>
      </div>
    </div>
  <?php } ?>
  </form>
</div>

<?php
if (isset($_POST['submit'])) {
  $nama_lengkap          = $_POST['nama_lengkap'];
  $nama                  = $_POST['nama'];
  $username              = $_POST['username'];
  $password              = $_POST['password'];
  $level                 = $_POST['level'];
  $file                 = $_FILES['file']['name'];
  // FILE LOKASI
  $lokasi=$_FILES['file']['tmp_name'];
  $dir="img/foto/";

  // INISIALISASI VARIABLE FUNGSI
  $table = "tb_user";

  $set = "nama_lengkap='$nama_lengkap',
          nama='$nama',
          username='$username',
          password='$password',
          level='$level'
         ";

  $setFile = "nama_lengkap='$nama_lengkap',
            nama='$nama',
            username='$username',
            password='$password',
            level='$level',
            foto='$file'
           ";

  $chckFiles = "'$file'";

  $key = "username='$username'";

  $fileHapus = "img/foto/".$row['foto'];

  $fungsi  = new Fungsi();
  $result  = $fungsi->updateWfile($table,$set,$setFile,$chckFiles,$key,$fileHapus);

  if ($result) {
    move_uploaded_file($lokasi,"$dir$file");
    ?>
    <script type="text/javascript">
      alert('Berhasil Update');
      location.href="index.php?show=u-akun"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Update');
      location.href="index.php?show=u-akun"
    </script>
    <?php
  }
}
?>
