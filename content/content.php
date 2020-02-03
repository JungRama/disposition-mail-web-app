<?php

if (isset($_GET['show'])) {
  $show=$_GET['show'];
}else {
  $show = "home";
}

if ($show == "home") {
  include 'content/home.php';
}elseif ($show == "surat-masuk") {
  include 'content/surat-masuk.php';
}elseif ($show == "surat-keluar") {
  include 'content/surat-keluar.php';
}elseif ($show == "disposisi") {
  include 'content/disposisi.php';
}elseif ($show == "data-admin") {
  include 'content/data-admin.php';
}elseif ($show == "data-disposisi") {
  include 'content/data-disposisi.php';
}elseif ($show == "filter-surat") {
  include 'content/filter-surat.php';
}elseif ($show == "backup-restore") {
  include 'content/backup-restore.php';
}

// Tambah
elseif ($show == "surat-masuk-tambah") {
  include 'content/surat-masuk-tambah.php';
}


// UPDATE
elseif ($show == "u-akun") {
  include 'inc/crud/update/u-akun.php';
}elseif ($show == "u-surat-masuk") {
  include 'inc/crud/update/u-surat-masuk.php';
}elseif ($show == "u-disposisi") {
  include 'inc/crud/update/u-disposisi.php';
}elseif ($show == "u-surat-keluar") {
  include 'inc/crud/update/u-surat-keluar.php';
}elseif ($show == "u-data-admin") {
  include 'inc/crud/update/u-data-admin.php';
}

?>
