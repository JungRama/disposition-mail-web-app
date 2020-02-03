<!-- Rubah All Atribut -->
<style media="screen">
  #data-admin li{
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
  document.getElementById("page-data").innerHTML = "Data Admin";
</script>

<?php
  $query = "SELECT * from tb_user";
  $no = 1;
  $fungsi = new Fungsi();
  $result= $fungsi->view($query);
?>

<div class="kotak-content" style="height:35px;">
  <span class="content-atas-title"><input id="search-data" onkeyup="filterData()" type="text" name="" value="" placeholder="Cari Sesuatu . . ."></span>
  <span class="content-atas-btn" id="see-form-content" onclick="openForm()"><a href="#!"><i class="fa fa-plus" style="margin-right:10px;"></i>Tambah Admin</a></span>
</div>

<div class="kotak-content" style="height:280px;" id="form-content">
  <form action="inc/crud/post/p-admin.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="col-6">
      <div class="form-content">
        <label for="">Nama Lengkap :</label>
        <input type="text" name="nama_lengkap" value="" placeholder="Nama Lengkap">
      </div>
      <div class="form-content">
        <label for="">Nama Panggilan :</label>
        <input type="text" name="nama" value="" placeholder="Nama Panggilan">
      </div>
      <div class="form-content">
        <label for="">Foto :</label><br>
        <input type="file" name="file" value="">
      </div>
    </div>
    <div class="col-6">
      <div class="form-content">
        <label for="">Username :</label>
        <input type="text" name="username" value="" placeholder="Username">
      </div>
      <div class="form-content">
        <label for="">Password :</label>
        <input type="password" name="password" value="" placeholder="Password">
      </div>
      <div class="form-content">
        <select class="form-select" name="level">
          <option value="1">Master</option>
          <option value="2">Resepsionis</option>
        </select>
      </div>
    </div>
    <div class="col-12">
      <input type="submit" name="submit" value="Simpan" class="btn-form-submit">
      <input type="reset" name="reset" value="Reset" class="btn-form-reset">
    </div>
  </form>
</div>

<div id="table-content">
  <table style="width:100%">
    <tr>
      <th>No</th>
      <th>Foto</th>
      <th>Username</th>
      <th>Nama Lengkap</th>
      <th>Level</th>
      <th style="width:140px;">Aksi</th>
    </tr>

    <tbody id="isi-table">
      <?php foreach ($result as $key => $row) {  ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><img src="img/foto/<?php echo $row['foto']; ?>" alt="" width="50px;"></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['nama_lengkap']; ?></td>
          <td>
            <?php
              if ($row['level']==1) {
                echo "Master";
              }elseif ($row['level']==2) {
                echo "Resepsionis";
              }
            ?>
          </td>
          <td class="table-td-aksi">
            <a href="index.php?show=u-data-admin&id=<?php echo $row['id_user']; ?>" class="btn-aksi-edit">
              <i class="fa fa-pencil"></i> Edit</a>

            <a href="inc/crud/delete/d-data-admin.php?id=<?php echo $row['id_user']; ?>" class="btn-aksi-hapus" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?')">
              <i class="fa fa-trash"></i> Delete </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
