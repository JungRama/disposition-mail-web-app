<?php
include 'crud/fungsi.php';
$fungsi = new Fungsi();

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tb_user WHERE username='$username' and password='$password'";

$result = $fungsi->execute($query);

$row = mysqli_num_rows($result);

if ($row > 0) {
  $data = mysqli_fetch_array($result);
  session_start();
  $_SESSION['username']     = $data['username'];
  $_SESSION['password']     = $data['password'];
  $_SESSION['level']        = $data['level'];
  $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
  $_SESSION['idadmin']      = $data['id_user'];

  ?>
  <script type="text/javascript">
  location.href="../index.php";
  </script>
  <?php

}else {
?>
  <script type="text/javascript">
  alert("Password Atau Username Salah !")
   location.href="../index.php";
  </script>
<?php } ?>
