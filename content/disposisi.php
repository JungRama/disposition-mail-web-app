<!-- Rubah All Atribut -->
<style media="screen">
  #surat-masuk li, .surat li{
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
  document.getElementById("page-data").innerHTML = "Disposisi Surat";
</script>
<!-- SEARCH FILTER -->
<!-- <script>
$(document).ready(function(){
  $("#search-data").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#isi-table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> -->

<!-- Open / Close Form -->
<!-- <script type="text/javascript">
$(document).ready(function(){
  $("#see-form-content").click(function(){
    if ($('#form-content').is(':hidden')) {
      $('#form-content').slideDown(150);
      $('#table-content').slideUp(150);
      $('#info-data-surat').slideUp(150);
    }else {
      $('#form-content').slideUp(150);
      $('#info-data-surat').slideDown(150);
      $('#table-content').slideDown(150);
    }
  });
});
</script> -->

<div class="kotak-content" style="height:35px;">
  <span class="content-atas-btn" id="see-form-content" onclick="openForm()"><a href="#!"><i class="fa fa-plus" style="margin-right:10px;"></i>Tambah Disposisi</a></span>
  <span class="content-atas-btn" style="margin-right:10px;"><a href="?show=surat-masuk  "><i class="fa fa-caret-left" style="margin-right:10px;"></i>Kembali</a></span>
</div>
<?php
  $id_mail = $_GET['id'];
  $no = 1;
  $dataSurat = "SELECT * from tb_surat_masuk WHERE id_surat_masuk='$id_mail'";
  $dataDisposisi = "SELECT * from tb_disposisi WHERE id_surat='$id_mail'";
  $result= $crud->view($dataSurat);
  $resultDis = $crud->view($dataDisposisi);

  // UPDATE
  $query = "SELECT * FROM tb_disposisi WHERE id_surat='$id_mail'";
  $resultJum  = $crud->execute($query);
  $num = mysqli_num_rows($resultJum);

  if ($num <= 0) {
    $queryStatus = "UPDATE tb_surat_masuk SET status='0' WHERE id_surat_masuk='$id_mail'";
    $updateStatus = $crud->execute($queryStatus);
  }
?>
<?php foreach ($result as $key => $row){
?>
<div class="kotak-content" style="height:auto;" id="info-data-surat">
<table>
  <tr>
    <td><b>Kode Surat</b></td>
    <td> : </td>
    <td><?php echo $row['no_surat']; ?></td>
  </tr>
  <tr>
    <td><b>Subject</b></td>
    <td> : </td>
    <td><?php echo $row['subjek']; ?></td>
  </tr>
  <tr>
    <td><b>Tanggal</b></td>
    <td> : </td>
    <td><?php echo $row['tgl_surat_dibuat']; ?></td>
  </tr>
  <tr>
    <td><b>Description</b></td>
    <td> : </td>
  </tr>
</table>
<table>
  <tr>
    <td style="text-align:justify"><?php echo $row['isi_surat']; ?></td>
  </tr>
</table>
<?php } ?>
</div>

<div class="kotak-content" style="height:310px;" id="form-content">
  <form action="inc/crud/post/p-disposisi.php?id=<?php echo $id_mail; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="col-6">
      <div class="form-content">
        <label for="">Tanggal :</label>
        <input type="date" name="tgl_disposisi" value="" placeholder="Tanggal Disposisi">
      </div>
      <div class="form-content">
        <label for="">Tujuan Disposisi :</label>
        <input type="text" name="tujuan_disposisi" value="" placeholder="Tujuan Disposisi">
      </div>
    </div>
    <div class="col-6">
      <div class="form-content">
        <label for="">Isi Disposisi :</label><br>
        <textarea placeholder="Isi Disposisi" name="isi_disposisi"></textarea>
      </div>
      <div class="form-content">
        <label for=""><b>Sifat :</b></label><br>
        <select class="form-select" name="sifat_disposisi">
          <option value="1">Biasa</option>
          <option value="2">Penting</option>
          <option value="3">Rahasia</option>
        </select>
      </div>
    </div>
    <div class="col-12">
      <input type="submit" name="" value="Simpan" class="btn-form-submit">
      <input type="reset" name="" value="Reset" class="btn-form-reset">
    </div>
  </form>
</div>

<div id="table-content">
  <table style="width:100%">
    <tr>
      <th>No</th>
      <th>Tujuan Disposisi</th>
      <th style="width:150px">Isi Disposisi</th>
      <th style="text-align:left">Tanggal - Sifat</th>
      <th style="width:160px;">Aksi</th>
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
          <td class="table-td-aksi" style="width:200px">
            <a href="inc/crud/cetak/ctk-disposisi.php?id=<?php echo $row['id_disposisi']; ?>&idmail=<?php echo $id_mail; ?>" class="btn-aksi-cetak">
              <i class="fa fa-print"></i> Cetak</a>

            <a href="?show=u-disposisi&id=<?php echo $row['id_disposisi']; ?>&idmail=<?php echo $id_mail; ?>" class="btn-aksi-edit">
              <i class="fa fa-pencil"></i> Edit</a>

            <a href="inc/crud/delete/d-disposisi.php?id=<?php echo $row['id_disposisi']; ?>&idmail=<?php echo $id_mail; ?>" class="btn-aksi-hapus" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">
              <i class="fa fa-trash"></i> Hapus</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
