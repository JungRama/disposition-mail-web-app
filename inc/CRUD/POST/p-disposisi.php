<?php
  session_start();
  include '../fungsi.php';
  $id_surat         = $_GET['id'];
  $tgl_disposisi    = $_POST['tgl_disposisi'];
  $tujuan_disposisi = $_POST['tujuan_disposisi'];
  $isi_disposisi    = $_POST['isi_disposisi'];
  $sifat_disposisi  = $_POST['sifat_disposisi'];
  $id_user          = $_SESSION['idadmin'];

  $table = "tb_disposisi";
  $field = "tgl_disposisi,
            tujuan_disposisi,
            isi_disposisi,
            sifat_disposisi,
            id_surat,
            id_user
          ";
  $value = "'$tgl_disposisi',
            '$tujuan_disposisi',
            '$isi_disposisi',
            '$sifat_disposisi',
            '$id_surat',
            '$id_user'
          ";

  $fungsi  = new Fungsi();
  $result  = $fungsi->post($table,$field,$value);

  if ($result) {
    ?>
    <script type="text/javascript">
      alert('Berhasil Tambah Disposisi');
      location.href="../../../index.php?show=disposisi&id=<?php echo $id_surat; ?>"
    </script>
    <?php
  }else {
    ?>
    <script type="text/javascript">
      alert('Gagal Tambah Disposisi');
      location.href="../../../index.php?show=disposisi&id=<?php echo $id_surat; ?>"
    </script>
    <?php
  }

?>
