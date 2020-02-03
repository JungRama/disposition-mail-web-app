<?php
  include '../fungsi.php';
  $fungsi = new Fungsi();

  $id = $_GET['id'];
  $id_mail = $_GET['idmail'];

  $table = "tb_disposisi";
  $key = "id_disposisi='$id'";
  $result  = $fungsi->delete($table,$key);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert('Berhasil Hapus');
      location.href="../../../index.php?show=disposisi&id=<?php echo $id_mail; ?>"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Hapus');
      location.href="../../../index.php?show=disposisi&id=<?php echo $id_mail; ?>"
    </script>
    <?php
  }
?>
