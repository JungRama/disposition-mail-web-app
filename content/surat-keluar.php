<!-- Rubah All Atribut -->
<style media="screen">
  #surat-keluar li, .surat li{
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
  document.getElementById("page-data").innerHTML = "Surat Keluar";
</script>

  <?php
    $query = "SELECT * from tb_surat_keluar";
    $queryTipeSurat = "SELECT * FROM tb_tipe_surat";
    $no = 1;
    $fungsi = new Fungsi();
    $result= $fungsi->view($query);
    $resultTipeSurat = $fungsi->view($queryTipeSurat);
  ?>

<div class="kotak-content" style="height:35px;">
  <span class="content-atas-title"><input id="search-data" onkeyup="filterData()" type="text" name="" value="" placeholder="Cari Sesuatu . . ."></span>
  <?php
    if ($_SESSION['level']==1) {
      ?>
      <span class="content-atas-btn" id="see-form-content" onclick="openForm()"><a href="#!"><i class="fa fa-plus" style="margin-right:10px;"></i>Tambah Surat Keluar</a></span>
      <?php
    }elseif($_SESSION['level']==2){

    }elseif ($_SESSION['level']==3) {
      ?>
        <span class="content-atas-btn" id="see-form-content" onclick="openForm()"><a href="#!"><i class="fa fa-plus" style="margin-right:10px;"></i>Tambah Surat Keluar</a></span>
      <?php
    }
  ?>
</div>

<div class="kotak-content" style="height:400px;" id="form-content">
  <form action="inc/crud/post/p-surat-keluar.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="col-6">
      <div class="form-content">
        <label for="">Nomor Surat :</label>
        <input type="text" name="no_surat" value="" placeholder="Nomor Surat eg.17X/002/0980">
      </div>
      <div class="form-content">
        <label for="">Tanggal Surat Dibuat :</label>
        <input type="date" name="tgl_surat_dibuat" value="" placeholder="Tanggal Surat Dibuat">
      </div>
      <div class="form-content">
        <label for="">Tujuan Surat :</label>
        <input type="text" name="kepada" value="" placeholder="Tujuan Surat">
      </div>
      <div class="form-content">
        <label for="">Tipe Surat :</label><br>
        <select class="form-select" name="id_tipe_surat">
          <?php foreach ($resultTipeSurat as $key => $row){?>
            <option value="<?php echo $row['id_tipe_surat']; ?>"><?php echo $row['tipe_surat']; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-6">
      <div class="form-content">
        <label for="">Judul Surat :</label>
        <input type="text" name="subjek" value="" placeholder="Judul Surat">
      </div>
      <div class="form-content">
        <label for="">Isi Surat :</label><br>
        <textarea placeholder="Isi Surat" name="isi_surat"></textarea>
      </div>
      <div class="form-content">
        <label for="">File :</label><br>
        <input type="file" name="file" value="">
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
      <th>Kode Surat</th>
      <th style="width:150px">Dari - Ke</th>
      <th style="text-align:left">Surat</th>
      <th>Tanggal</th>
      <th style="width:200px;">Aksi</th>
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
              File : <a target="_blank" href="inc/crud/file/lht-file-keluar.php?file=<?php echo $row['file_upload']; ?>"><?php echo $row['file_upload']; ?></a>
            </td>

          <td><?php echo $row['tgl_surat_dibuat']; ?></td>
          <?php
          if ($_SESSION['level']==1) {
            ?>
            <td class="table-td-aksi">
              <a href="index.php?show=u-surat-keluar&id=<?php echo $row['id_surat_keluar']; ?>" class="btn-aksi-edit">
                <i class="fa fa-pencil"></i> Edit</a>

              <a href="inc/crud/cetak/ctk-surat-keluar.php?id=<?php echo $row['id_surat_keluar']; ?>" class="btn-aksi-cetak">
                <i class="fa fa-print"></i> Cetak</a>

              <a href="inc/crud/delete/d-surat-keluar.php?id=<?php echo $row['id_surat_keluar']; ?>" class="btn-aksi-hapus" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">
                <i class="fa fa-trash"></i> Delete </a>
            </td>
            <?php
          }elseif ($_SESSION['level']==2) {
            ?>
            <td class="table-td-aksi">
              <a href="inc/crud/cetak/ctk-surat-keluar.php?id=<?php echo $row['id_surat_keluar']; ?>" class="btn-aksi-cetak">
                <i class="fa fa-print"></i> Cetak</a>
            </td>
            <?php
          }elseif ($_SESSION['level']==3) {
            ?>
            <td class="table-td-aksi">
              <a href="index.php?show=u-surat-keluar&id=<?php echo $row['id_surat_keluar']; ?>" class="btn-aksi-edit">
                <i class="fa fa-pencil"></i> Edit</a>

              <a href="inc/crud/cetak/ctk-surat-keluar.php?id=<?php echo $row['id_surat_keluar']; ?>" class="btn-aksi-cetak">
                <i class="fa fa-print"></i> Cetak</a>

              <a href="inc/crud/delete/d-surat-keluar.php?id=<?php echo $row['id_surat_keluar']; ?>" class="btn-aksi-hapus" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">
                <i class="fa fa-trash"></i> Delete </a>
            </td>
            <?php
          }
          ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
