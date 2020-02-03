<?php
  include '../fungsi.php';
  $nama_lengkap = $_POST['nama_lengkap'];
  $nama         = $_POST['nama'];
  $file         = $_FILES['file']['name'];
  $username     = $_POST['username'];
  $password     = $_POST['password'];
  $level        = $_POST['level'];

  // FILE LOKASI
  $lokasi=$_FILES['file']['tmp_name'];
  $dir="../../../img/foto/";

  // INISIALISASI VARIABLE FUNGSI
  $table = "tb_user";

  $field = "nama_lengkap,
            nama,
            username,
            password,
            level,
            foto
            ";

  $value = "'$nama_lengkap',
            '$nama',
            '$username',
            '$password',
            '$level',
            ";

  $files = "'$file'";

  $fungsi  = new Fungsi();
  $result  = $fungsi->postWfile($table,$field,$value,$files);

  if ($result) {
    move_uploaded_file($lokasi,"$dir$file");
    ?>
    <script type="text/javascript">
    alert('Berhasil Tambah Admin');
    location.href="../../../index.php?show=data-admin"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Menambah');
    location.href="../../../index.php?show=data-admin"
    </script>
    <?php
  }
?>
