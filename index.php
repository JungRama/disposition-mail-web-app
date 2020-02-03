<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/master.css">

    <script src="js/master.js" charset="utf-8"></script>
    <!-- <script src="js/jquery.js" charset="utf-8"></script> -->
  </head>
  <body>
    <?php
     session_start();
     if(!isset($_SESSION['username']) and !isset($_SESSION['password'])){
       header('location:login.php');
     }else{
       ?>
       <?php
       // Fungsi
      include 'inc/crud/fungsi.php';
      $crud = new Fungsi();

       if ($_SESSION['level'] == "3") {
         include 'content\menu\menu-resepsionis.php';
       }else if ($_SESSION['level'] == "2") {
         include 'content\menu\menu-disposisi.php';
       }else if ($_SESSION['level'] == "1") {
         include 'content\menu\menu-admin.php';
       }
     }
    ?>
  </body>
</html>
