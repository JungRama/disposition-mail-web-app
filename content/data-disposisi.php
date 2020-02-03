<!-- Rubah All Atribut -->
<style media="screen">
  #data-disposisi li{
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
  document.getElementById("page-data").innerHTML = "Data Disposisi";
</script>
<!-- SEARCH FILTER -->

<?php
  $no = 1;
  $dataDisposisi = "SELECT * from tb_disposisi ORDER BY tgl_disposisi desc";
  $resultDis = $crud->view($dataDisposisi);
?>

<div class="kotak-content" style="height:35px;">
  <span class="content-atas-title"><input id="search-data" onkeyup="filterData()"  type="text" name="" value="" placeholder="Cari Sesuatu . . ."></span>
</div>

<div id="table-content">
  <table style="width:100%">
    <tr>
      <th>No</th>
      <th>Tujuan Disposisi</th>
      <th style="width:150px">Isi Disposisi</th>
      <th style="text-align:left">Tanggal - Sifat</th>
      <th>Aksi</th>
    </tr>

    <tbody id="isi-table">
      <?php foreach ($resultDis as $key => $row){
      ?>
        <tr>
          <td style="width:10px"><?php echo $no++; ?></td>
          <td style="width:150px"><?php echo $row['tujuan_disposisi']; ?></td>
          <td><?php echo $row['isi_disposisi']; ?></td>
          <td style="width:70px"><?php echo $row['tgl_disposisi']; ?>
              <hr>
              <?php
              $sifat = $row['sifat_disposisi'];
              if ($sifat==1) {
                echo "Biasa";
              }elseif ($sifat==2) {
                echo "Penting";
              }elseif ($sifat==3) {
                echo "Rahasia";
              }
              ?>
          </td>
          <td class="table-td-aksi" style="width:40px">
            <a href="inc/crud/cetak/ctk-disposisi.php?id=<?php echo $row['id_disposisi']; ?>&idmail=<?php echo $row['id_surat']; ?>" class="btn-aksi-cetak">
              <i class="fa fa-print"></i> Cetak</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
