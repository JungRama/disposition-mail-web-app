<?php
  include '../fungsi.php';

  $id = $_GET['id'];

  $table = "tb_surat_masuk";
  $key = "id_surat_masuk='$id'";

  $fungsi = new Fungsi();
  $result  = $fungsi->delete($table,$key);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert('Berhasil Hapus');
      location.href="../../../index.php?show=surat-masuk"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Hapus');

    </script>
    <?php
  }
?>
