<?php
  include '../fungsi.php';
  $id = $_GET['id'];

  $table = "tb_user";
  $key = "id_user='$id'";

  $fungsi = new Fungsi();
  $result = $fungsi->delete($table, $key);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert("Berhasil Hapus");
      location.href="../../../index.php?show=data-admin"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert("Berhasil Hapus");
      location.href="../../../index.php?show=data-admin"
    </script>
    <?php
  }

?>
