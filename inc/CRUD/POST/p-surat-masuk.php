<!-- POST -->
<?php
  session_start();
  include '../fungsi.php';
  $no_surat             = $_POST['no_surat'];
  $tgl_surat_masuk      = $_POST['tgl_surat_masuk'];
  $tgl_surat_dibuat     = $_POST['tgl_surat_dibuat'];
  $surat_dari           = $_POST['surat_dari'];
  $kepada               = $_POST['kepada'];
  $subjek               = $_POST['subjek'];
  $isi_surat            = $_POST['isi_surat'];
  $id_tipe_surat        = $_POST['id_tipe_surat'];
  $file                 = $_FILES['file']['name'];
  $id_user              = $_SESSION['idadmin'];

  // FILE LOKASI
  $lokasi=$_FILES['file']['tmp_name'];
  $dir="../../../file/file-masuk/";

  // INISIALISASI VARIABLE FUNGSI
  $table = "tb_surat_masuk";

  $field = "no_surat,
            tgl_surat_masuk,
            tgl_surat_dibuat,
            surat_dari,
            kepada,
            subjek,
            isi_surat,
            id_tipe_surat,
            id_user,
            status,
            file_upload
            ";

  $value = "'$no_surat',
            '$tgl_surat_masuk',
            '$tgl_surat_dibuat',
            '$surat_dari',
            '$kepada',
            '$subjek',
            '$isi_surat',
            '$id_tipe_surat',
            '$id_user',
            '0',
            ";

  $files = "'$file'";

  $fungsi  = new Fungsi();
  $result  = $fungsi->postWfile($table,$field,$value,$files);

  if ($result) {
    move_uploaded_file($lokasi,"$dir$file");
    ?>
    <script type="text/javascript">
    alert('Berhasil Tambah Surat Masuk');
    location.href="../../../index.php?show=surat-masuk"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Menambah');
      location.href="../../../index.php?show=surat-masuk"
    </script>
    <?php
  }
?>
