<?php
  include '../fungsi.php';
  $fungsi = new Fungsi();

  $instansi_name            = $_POST['instansi_name'];
  $alamat                   = $_POST['alamat'];
  $website                  = $_POST['website'];
  $email                    = $_POST['email'];
  $logo                     = $_FILES['logo']['name'];
  // FILE LOKASI
  $lokasi=$_FILES['logo']['tmp_name'];
  $dir="../../../img/";

  // INISIALISASI VARIABLE FUNGSI
  $table = "tb_instansi";
  $set = "instansi_name='$instansi_name',
          alamat='$alamat',
          website='$website',
          email='$email'
          ";

  $setFile = "instansi_name='$instansi_name',
          alamat='$alamat',
          website='$website',
          email='$email',
          logo='$logo'";

  $chckFiles = "'$logo'";

  $key = "id='1'";

  $fileHapus = "img/-";

  $fungsi  = new Fungsi();
  $result  = $fungsi->updateWfile($table,$set,$setFile,$chckFiles,$key,$fileHapus);

  if ($result) {
    move_uploaded_file($lokasi,"$dir$logo");
    ?>
    <script type="text/javascript">
      alert('Berhasil Update');
      location.href="../../../index.php?show=home"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Update');
      location.href="../../../index.php?show=home"
    </script>
    <?php
  }
?>
