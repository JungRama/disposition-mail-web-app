<!-- Rubah All Atribut -->
<style media="screen">
</style>
<script type="text/javascript">
  document.getElementById("page-data").innerHTML = "Backup Restore";
</script>

<div class="kotak-content" style="height:170px;">
  <h3 class="text-no-margin">Backup Database</h3>
  <p>Lakukan backup database secara berkala untuk membuat cadangan database yang bisa direstore kapan saja ketika dibutuhkan. Silakan klik tombol "Backup" untuk memulai proses backup data. Setelah proses backup selesai, silakan download file backup database tersebut dan simpan di lokasi yang aman.</p>
  <a href="inc/backup.php" class="btn-form-submit" style="text-decoration:none;"><i class="fa fa-download"></i> Backup Database</a>
</div>

<div class="kotak-content" style="height:280px;">
  <h3 class="text-no-margin">Restore Database</h3>
  <p>Silakan pilih file database lalu klik tombol "Restore" untuk melakukan restore database dari hasil backup yang telah dibuat sebelumnya. Jika belum ada file database hasil backup, silakan lakukan backup terlebih dahulu diatas.</p>
  <p>Berhati - hatilah ketika merestore database karena data yang ada akan diganti dengan data yang baru. Pastikan bahwa file database yang akan digunakan untuk merestore adalah "benar - benar" file backup database yang telah dibuat sebelumnya sehingga sistem dapat berjalan dengan normal dan tidak mengalami error.</p>
  <form class="" action="inc/restore.php" enctype="multipart/form-data" method="post">
    <label for=""><b>File Database : </b></label>
    <input type="file" name="file" value="" accept=".sql"><br><br>
    <input type="submit" name="submit" class="btn-form-submit" value="Restore Database"></a>
  </form>
</div>
