<!-- Rubah All Atribut -->
<style media="screen">
  #home li{
    background-color: #2c3e50;
    -webkit-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    -moz-box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    box-shadow: 1px 1px 5px -1px rgba(0,0,0,0.63);
    color: #fff;
  }

</style>
<script type="text/javascript">
  document.getElementById("page-data").innerHTML = "Home";
</script>

<?php

?>

<div class="kotak-content" style="height:200px;" id="info-data">
  <div class="col-4 home-info-surat">

  <a href="?show=surat-masuk" style="text-decoration:none;">
    <div class="kotak-content-info" style="background-color:#2c3e50;;height:55px;margin-left:0px;color:#fff">
      <div class="col-3">
        <i class="fa fa-envelope fa-3x"></i>
      </div>
      <div class="col-9">
        <h4 class="text-no-margin">Surat Masuk</h4>
        <h3 class="text-no-margin"><b>
          <?php
            $count = new Count();
            $table = "tb_surat_masuk";
            $result = $count->countData($table);
            echo $result;
          ?>
        </b></h3>
      </div>
    </div>
  </a>

  <a href="?show=surat-keluar" style="text-decoration:none;">
    <div class="kotak-content-info" style="background-color:#2c3e50;height:55px;margin-left:0px;color:#fff">
      <div class="col-3">
        <i class="fa fa-envelope-open fa-3x"></i>
      </div>
      <div class="col-9">
        <h4 class="text-no-margin">Surat Keluar</h4>
        <h3 class="text-no-margin"><b>
          <?php
          $count = new Count();
          $table = "tb_surat_keluar";
          $result = $count->countData($table);
          echo $result;
          ?>
        </b></h3>
      </div>
    </div>
  </a>

  </div>
  <div class="col-8">
    <div class="kotak-content-info" style="background-color:#2c3e50;height:160px;color:#fff" id="info-data">
      <?php
        if ($_SESSION['level']==1) {
          ?>
            <div class="home-set-instansi">
              <a href="#" onclick="clickopenInstansi()" id="open-edit-instansi" style="color:#fff"><i class="fa fa-cog" style="float:right" ></i></a>
            </div>
          <?php
        }else {

        }
      ?>
      <?php
        $query = "SELECT * from tb_instansi WHERE id='1'";
        $result= $crud->view($query);
        ?>
        <?php foreach ($result as $key => $row) {  ?>

      <div class="instansi col-4">
        <img src="img/<?php echo $row['logo']; ?>" alt="" width="150px">
      </div>
      <div class="col-6">
        <h2 class="text-no-margin" style="margin-left:2px;"><?php echo $row['instansi_name']; ?></h2>
        <table>
          <tr>
            <td>Status</td><td>:</td>
            <td><?php echo $row['status']; ?></td>
          </tr>
          <tr>
            <td>Alamat</td><td>:</td>
            <td><?php echo $row['alamat']; ?></td>
          </tr>
          <tr>
            <td>Website</td><td>:</td>
            <td><?php echo $row['website']; ?></td>
          </tr>
          <tr>
            <td>Email</td><td>:</td>
            <td><?php echo $row['email']; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="kotak-content" style="height:200px;display:none" id="edit-instansi">
    <div>
      <a href="#" id="open-info-data" onclick="backInstansi()"><i class="fa fa-chevron-left" style="color:#2c3e50;"></i></a>
    </div>

    <form action="inc/crud/update/u-instansi.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="col-4">
        <div class="form-content">
          <label for="">Nama Instansi :</label>
          <input type="text" name="instansi_name" value="<?php echo $row['instansi_name']; ?>" placeholder="Nama Instansi">
        </div>
        <div class="form-content">
          <label for="">Alamat :</label>
          <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" placeholder="Alamat Instansi">
        </div>
      </div>
      <div class="col-4">
        <div class="form-content">
          <label for="">Website :</label>
          <input type="text" name="website" value="<?php echo $row['website']; ?>" placeholder="Kode Surat eg.17X/002/0980">
        </div>
        <div class="form-content">
          <label for="">Email :</label>
          <input type="text" name="email" value="<?php echo $row['email']; ?>" placeholder="Kode Surat eg.17X/002/0980">
        </div>
      </div>
      <div class="col-4">
        <div class="form-content">
          <label for="">Logo :</label><br>
          <input type="file" name="logo" value="">
        </div>
        <div class="form-content" style="margin-top:65px;">
          <input type="submit" name="" value="Simpan" class="btn-form-submit">
          <input type="reset" name="" value="Reset" class="btn-form-reset">
        </div>
      </div>
    </form>
    <?php } ?>
</div>

<div class="col-8">
  <?php
    $date_now = date("Y-m-d");
    $dataSuratMasuk = "SELECT * FROM tb_surat_masuk WHERE tgl_surat_dibuat='$date_now'";
    $dataSuratKeluar = "SELECT * FROM tb_surat_keluar WHERE tgl_surat_dibuat='$date_now'";
    $dataDisposisi = "SELECT * FROM tb_disposisi WHERE tgl_disposisi='$date_now'";

    $viewSuratMasuk = $crud->execute($dataSuratMasuk);
    $viewSuratKeluar = $crud->execute($dataSuratKeluar);
    $viewDisposisi = $crud->execute($dataDisposisi);
    ?>
    <div class="kotak-title">
      <p><b>Data Hari Ini</b></p>
    </div>

    <div class="kotak-content-info" style="height:77px;margin-left:0px;" id="data-hari-ini">
      <div class="col-2">
        <span><i class="fa fa-envelope fa-4x" style="color:#2c3e50"></i></span>
      </div>
      <div class="col-9" style="margin-top:15px;">
        <span style="color:#2c3e50;font-size:25px;">Surat Masuk</span>
      </div>
      <div class="col-1" style="margin-top:15px;">
        <span style="color:#fff;font-size:25px;background-color:#2c3e50;padding:10px;">
          <?php echo mysqli_num_rows($viewSuratMasuk); ?>
        </span>
      </div>
    </div>

    <div class="kotak-content-info" style="height:77px;margin-left:0px;" id="data-hari-ini">
      <div class="col-2">
        <span><i class="fa fa-envelope-open fa-4x" style="color:#2c3e50"></i></span>
      </div>
      <div class="col-9" style="margin-top:15px;">
        <span style="color:#2c3e50;font-size:25px;">Surat Keluar</span>
      </div>
      <div class="col-1" style="margin-top:15px;">
        <span style="color:#fff;font-size:25px;background-color:#2c3e50;padding:10px;">
          <?php echo mysqli_num_rows($viewSuratKeluar); ?>
        </span>
      </div>
    </div>

<style media="screen">
  #data-hari-ini{

  }
</style>

    <div class="kotak-content-info" style="height:77px;margin-left:0px;" id="data-hari-ini">
      <div class="col-2">
        <span><i class="fa fa-send fa-4x" style="color:#2c3e50"></i></span>
      </div>
      <div class="col-9" style="margin-top:15px;">
        <span style="color:#2c3e50;font-size:25px;">Disposisi</span>
      </div>
      <div class="col-1" style="margin-top:15px;">
        <span style="color:#fff;font-size:25px;background-color:#2c3e50;padding:10px;">
          <?php echo mysqli_num_rows($viewDisposisi); ?>
        </span>
      </div>
    </div>
</div>

<div class="col-4">
  <div class="kotak-content-info clock-time" style="height:240px;">
    <h1 style="font-size:40px"><?php echo date("h:i:a"); ?></h1>
    <h3 class="text-no-margin">•••</h3>
    <h3 class="text-no-margin"><?php echo date("l"); ?></h3>
    <h2 class="text-no-margin"><?php echo date("d F Y"); ?></h2>
  </div>
  <?php
    if ($_SESSION['level']==1) {
      ?>
      <a href="?show=backup-restore" style="text-decoration:none;">
        <div class="kotak-content-info" style="text-align:center;color:#fff;background-color:#2c3e50">
          <div>
            <i class="fa fa-cloud-download fa-4x"></i>
            <i class="fa fa-cloud-upload fa-4x"></i>
          </div>
          <div>
            <h2 class="text-no-margin">Backup / Restore Data</h2>
          </div>
        </div>
      </a>
      <?php
    }else {
      ?>
      <a href="?show=backup-restore" style="text-decoration:none;">
        <div class="kotak-content-info" style="text-align:center;color:#fff;background-color:#2c3e50">
          <div>
            <i class="fa fa-cloud-download fa-4x"></i>
          </div>
          <div>
            <h2 class="text-no-margin">Backup Database</h2>
          </div>
        </div>
      </a>
      <?php
    }
  ?>
</div>



<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#open-edit-instansi").click(function(){
        $("#info-data").hide();
        $("#edit-instansi").show();
    });
    $("#open-info-data").click(function(){
        $("#edit-instansi").hide();
        $("#info-data").show();
    });
  });
  </script> -->
