<?php
  include '../fungsi.php';

  $id = $_GET['id'];

  $table = "tb_surat_keluar";
  $key = "id_surat_keluar='$id'";

  $fungsi = new Fungsi();
  $result  = $fungsi->delete($table,$key);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert('Berhasil Hapus');
      location.href="../../../index.php?show=surat-keluar"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Hapus');
      location.href="../../../index.php?show=surat-keluar"
    </script>
    <?php
  }
?>
