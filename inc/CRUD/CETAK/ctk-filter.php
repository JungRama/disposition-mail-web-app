<title>Cetak Surat</title>
<?php
  include '../fungsi.php';
  $fungsi = new Fungsi();

  $no=1;

  $query = $_GET['query'];

  $result = $fungsi->view($query);
?>

<style>
  @media print {
    table{
      width: 100%;
      border-collapse: collapse;
    }
    table th, table tr td{
      border: 1px solid #000;
      padding: 10px;
    }
  }
  @media screen {
    table{
      width: 100%;
      border-collapse: collapse;
    }
    table th, table tr td{
      border: 1px solid #000;
      padding: 10px;
    }
  }
</style>

<body onload="window.print()">
  <table>
    <th>No</th>
    <th>Kode Surat</th>
    <th style="width:150px">Dari - Ke</th>
    <th style="text-align:left">Surat</th>
    <th>Tanggal</th>
  <?php foreach ($result as $key => $row): ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $row['no_surat']; ?></td>
      <td><?php echo $row['kepada']; ?>
      </td>
      <td><b><?php echo $row['subjek']; ?></b><hr>
          <?php echo $row['isi_surat']; ?><hr>
          File : <?php echo $row['file_upload']; ?></td>

      <td><?php echo $row['tgl_surat_dibuat']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
</body>
