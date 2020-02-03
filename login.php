<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <script src="js/jquery.js" charset="utf-8"></script>
  </head>
  <body>

    <style media="screen">
      body{
        background-image: url("img/bg-login.jpg");
        text-align: center;
      }
      .pesan{
        display: none;
        margin-top: 5px;
        text-align:left;
        color:#fff;
        margin-left:5px;
      }

    </style>

    <?php
    session_start();
     if(isset($_SESSION['username']) and isset($_SESSION['password'])){
      header("location:index.php");
    }else{
    ?>
    <div class="login-background">
      <center>
        <img src="img/logo.png" alt="" width="200px" style="margin-bottom:20px;">
        <div class="login-kotak">
          <form class="login" action="inc/proses-login.php" method="post" autocomplete="off" onsubmit="validasi()">

            <div class="login-form">
              <input type="text" id="username" name="username" value="" placeholder="Username">
              <div class="pesan pesan-username">
                <span>Mohon Isi Usename Anda !</span>
              </div>
            </div>

            <div class="login-form">
              <input type="password" id="password" name="password" value="" placeholder="Password">
              <div class="pesan pesan-password">
                <span>Mohon Isi Password Anda !</span>
              </div>
            </div>

            <div class="login-form">
              <input type="submit" name="submit" value="Login">
            </div>

          </form>
        </div>
      </center>
    </div>
    <?php } ?>
  </body>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.login').submit(function() {
        var username = $('#username').val().length;
        var password = $('#password').val().length;

        if (username == 0 && password == 0) {
          $(".pesan-username").css('display','block');
          $(".pesan-password").css('display','block');
          return false;
        }else if (username == 0) {
          $(".pesan-username").css('display','block');
          $(".pesan-password").css('display','none');
          return false;
        }else if (password == 0) {
          $(".pesan-password").css('display','block');
          $(".pesan-username").css('display','none');
          return false;
        }
      });
    });
  </script>
</html>
