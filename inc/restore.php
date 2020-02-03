<?php
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'arsip';
$file       = $_FILES['file']['name'];
$date_now = date('Y-m-d-h:i:s');

$lokasi=$_FILES['file']['tmp_name'];
$dir="../file/file_restore/";
move_uploaded_file($lokasi,"$dir$file");

$fileBackup = $dir.$file;

$filePath   = $fileBackup;

restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath);

function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath){
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    $templine = '';

    $lines = file($filePath);

    $error = '';

    foreach ($lines as $line){

        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        $templine .= $line;

        if (substr(trim($line), -1, 1) == ';'){

            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }

            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}
?>
<script language="javascript">
  window.alert("Berhasil Melakukan Restore Data");
  window.location.href="../index.php?show=home";
</script>
