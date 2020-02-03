<!-- Rubah All Atribut -->
<style media="screen">
  #filter-surat li{
    background-color: #2c3e50;
    -webkit-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    -moz-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    color: #fff;
  }
  #form-content{
    display: none;
  }
</style>
<script type="text/javascript">
  document.getElementById("page-data").innerHTML = "Filter Surat";
</script>

<?php
  $no = 1;

  $query="SELECT * FROM tb_surat_masuk";

  if (isset($_POST['submit'])) {
    $jenis_surat = $_POST['jenis_surat'];
    $tanggal_dari = $_POST['tanggal_dari'];
    $tanggal_sampai = $_POST['tanggal_sampai'];

    if ($jenis_surat==1) {
      $jenSur = "tb_surat_masuk";
    }elseif ($jenis_surat==2) {
      $jenSur = "tb_surat_keluar";
    }

    $query = "SELECT * FROM $jenSur WHERE tgl_surat_dibuat BETWEEN '$tanggal_dari' AND '$tanggal_sampai'";
  }

  $fungsi = new Fungsi();
  $result = $fungsi->view($query);
?>

<div class="kotak-content">
  <?php
    if ($query=="SELECT * FROM tb_surat_masuk") {
      echo "<b>Data Surat Masuk</b>";
    }else {
      ?>
      <h4 class="text-no-margin">
        <b>
          <?php
          if ($jenSur=="tb_surat_masuk") {
            echo "Data Surat Masuk";
          }elseif ($jenSur=="tb_surat_keluar") {
            echo "Data Surat Keluar";
          }
          ?>
        </b>
      </h4>
      <h4 class="text-no-margin">
        <?php
        echo "Dari Tanggal $tanggal_dari - ";
        echo "Sampai Tanggal $tanggal_sampai";
        ?>
      </h4>
      <?php
    }
  ?>

</div>

<div class="kotak-content" style="height:35px;">
  <form class="" action="" method="post">
    <span class="content-atas-title">
      <select class="form-select-filter" name="jenis_surat">
        <option value="1">Surat Masuk</option>
        <option value="2">Surat Keluar</option>
      </select>
    </span>
    <span class="content-atas-title">
      <input type="date" name="tanggal_dari" value=""required>
      <input type="date" name="tanggal_sampai" value="" required>
    </span>
    <span class="content-atas-btn" id="see-form-content"><input class="filter-submit" type="submit" name="submit" value="Search"></span>
  </form>
</div>

<br>
<div class="">
  <a href="inc/crud/cetak/ctk-filter.php?query=<?php echo $query; ?>"
  style="background-color:#2c3e50;color:#fff;padding:10px;text-decoration:none;">
  Cetak</a>
</div><br>

<div id="table-content">
  <table style="width:100%">
    <tr>
      <th>No</th>
      <th>Kode Surat</th>
      <th style="width:150px">Dari - Ke</th>
      <th style="text-align:left">Surat</th>
      <th>Tanggal</th>
    </tr>

    <tbody id="isi-table">
      <?php foreach ($result as $key => $row) {  ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['no_surat']; ?></td>
          <td><?php echo $row['kepada']; ?>
          </td>
          <td><b><?php echo $row['subjek']; ?></b><hr>
              <?php echo substr($row['isi_surat'],0,100)." ..."; ?><hr>
              File : <?php echo $row['file_upload']; ?></td>

          <td><?php echo $row['tgl_surat_dibuat']; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
