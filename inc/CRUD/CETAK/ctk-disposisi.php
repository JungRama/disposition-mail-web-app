<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CETAK SURAT</title>
    <link rel="stylesheet" href="../../../css/master.css">
  </head>
  <style>
  @media screen{
    body{
      margin: 3% 15%;
    }
    .cetak-instansi-info{
      height: 100px;
      padding: 20px;
      border-bottom: 2px solid #000;
    }
    .cetak-logo{
      margin-top: 20px;
    }
    .cetak-isi{
      margin-top: 20px;
    }
    table{
      border-collapse: collapse;
      width: 100%;
    }
    table tr{
      border: 1px solid #000;
    }
    #cetak-tab tr td{
      padding: 10px;
    }
    .td-ctk{
      width: 200px;
    }
    .td-tt{
      width: 10px;
    }
    .tanda-tangan{
      margin-top: 20px;
      width: 300px;
      text-align: center;
      float: right;
    }
    .tt-atas{
      height: 200px;
    }
  }
  @media print {
    .cetak-instansi-info{
      height: 100px;
      padding: 20px;
      border-bottom: 2px solid #000;
    }
    .cetak-logo{
      margin-top: 20px;
    }
    .cetak-isi{
      margin-top: 20px;
    }
    table{
      border-collapse: collapse;
      width: 100%;
    }
    table tr{
      border: 1px solid #000;
    }
    #cetak-tab tr td{
      padding: 10px;
    }
    .td-ctk{
      width: 200px;
    }
    .td-tt{
      width: 10px;
    }
    .tanda-tangan{
      margin-top: 20px;
      width: 300px;
      text-align: center;
      float: right;
    }
    .tt-atas{
      height: 130px;
    }
  }
  }
  </style>
  <?php
  include '../fungsi.php';
  $id_mail = $_GET['idmail'];
  $id_dispo = $_GET['id'];

  $query = "SELECT * FROM tb_surat_masuk WHERE id_surat_masuk='$id_mail'";
  $queryIns = "SELECT * FROM tb_instansi WHERE id='1'";
  $queryDispo = "SELECT * FROM tb_disposisi WHERE id_disposisi='$id_dispo'";

  // Join
  $JenisSurat = "SELECT * FROM tb_surat_masuk INNER JOIN tb_tipe_surat
  ON tb_surat_masuk.id_tipe_surat = tb_tipe_surat.id_tipe_surat WHERE id_surat_masuk='$id'";

  $fungsi  = new Fungsi();
  $viewSurat = $fungsi->view($query);
  $viewInstansi = $fungsi->view($queryIns);
  $viewDispo = $fungsi->view($queryDispo);
  $viewJenisSurat = $fungsi->view($JenisSurat);
  ?>

  <body onload="window.print()">
    <?php foreach ($viewInstansi as $key => $row){?>
    <div class="cetak-instansi-info">
      <div class="col-1 cetak-logo">
        <img src="../../../img/<?php echo $row['logo']; ?>" alt="" width="140px">
      </div>
      <div class="col-11" style="text-align:center;margin-top:30px;">
        <h2 class="text-no-margin"><?php echo $row['instansi_name']; ?></h2>
        <h4 class="text-no-margin"><?php echo $row['alamat']; ?> - <?php echo $row['email']; ?></h4>
      </div>
    </div>
  <?php } ?>
    <div class="cetak-isi">
      <table id="cetak-tab">
        <?php foreach ($viewSurat as $key => $row){?>
        <tr>
          <td class="td-ctk">Nomor Surat</td><td class="td-tt"> : </td>
          <td><?php echo $row['no_surat']; ?></td>
        </tr>
        <tr>
          <td class="td-ctk">Tanggal Surat</td><td class="td-tt"> : </td>
          <td><?php echo $row['tgl_surat_dibuat']; ?></td>
        </tr>
        <tr>
          <td class="td-ctk">Pengirim Surat</td><td class="td-tt"> : </td>
          <td><?php echo $row['surat_dari']; ?></td>
        </tr>
        <tr>
          <td class="td-ctk">Judul Surat</td><td class="td-tt"> : </td>
          <td><?php echo $row['subjek']; ?></td>
        </tr>
        <tr>
          <td class="td-ctk">Isi Surat</td><td class="td-tt"> : </td>
          <td></td>
        </tr>
        <tr >
          <td colspan="3" style="text-align:justify"><?php echo $row['isi_surat']; ?></td>
        </tr>
        <tr>
          <td class="td-ctk">Tipe Surat</td><td class="td-tt"> : </td>
          <td>
            <?php foreach ($viewJenisSurat as $key => $rows): ?>
              <?php echo $rows['tipe_surat'] ?>
            <?php endforeach; ?>
          </td>
        </tr>
        <?php } ?>

        <?php foreach ($viewDispo as $key => $row){?>
        <tr>
          <td colspan="3"><b>DISPOSISI :</b></td>
        </tr>
        <tr>
          <td class="td-ctk">Isi Disposisi</td><td class="td-tt"> : </td>
          <td><?php echo $row['isi_disposisi']; ?></td>
        </tr>
        <tr>
          <td class="td-ctk">Batas Waktu</td><td class="td-tt"> : </td>
          <td><?php echo $row['tgl_disposisi']; ?></td>
        </tr>
        <tr>
          <td class="td-ctk">Sifat Disposisi</td><td class="td-tt"> : </td>
          <td><?php echo $row['sifat_disposisi']; ?></td>
        </tr>
        <tr>
          <td class="td-ctk">Tujuan Disposisi</td><td class="td-tt"> : </td>
          <td><?php echo $row['tujuan_disposisi']; ?></td>
        </tr>
      <?php } ?>
      </table>

    </div>
    <div class="tanda-tangan">
      <div class="tt-atas">
        Tanggal, 25 Desember 2017
      </div>
      <div class="tt-bawah">
        ............................................
      </div>
    </div>
  </body>
</html>
