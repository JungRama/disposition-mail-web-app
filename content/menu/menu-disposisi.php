<style media="screen">
  body{
    margin: 0px;
    background: #f2f2f2;
  }
  .all{
    margin-top:-100px;
  }
  .menu{
    /* position: fixed; */
    width: 20%;
    height: 662px;
    float: left;
  }
  .content{
    width: 80%;
    float: right;
    height: 200px;
  }
  .menus-link{
    list-style-type: none;
    padding-left: 0px;
    width: 250px;
  }
  .menus-link li{
    padding: 15px;
    background-color: #f2f2f2;
    margin: 15px;
    border-radius: 2px;
  }
  .menus-link a{
    text-decoration: none;
    color: black;
  }
  .menu-cont-link{
    margin-left: 10px;
  }
  .menu-link-bottom{
    margin-left: 20px;
  }
  .menu-link-bottom{
    display: none;
  }
  /* menu header content */
  .menu-header{
    padding-top: 50px;
    height: 100px;
  }
  .menu-header-content{
    padding: 15px;
  }
  .menu-profil-img{
    float: left;
    width: 35%;
  }
  .menu-profil-text{
    margin-top: 15px;
    float: right;
    width: 65%;
    color: #fff;
  }
  /* menu atas */
  .menu-atas{
    height: 200px;
    background-image: url("img/bg-menu.jpg");
    background-size: cover;
  }
  .menu-atas-right{
    width: 40%;
    margin-top: 10px;
    margin-right: 55px;
    padding: 6px;
    float: right;
  }
  /* content */
  .kotak-title p b{
    box-shadow: 1px 1px 5px 0px rgba(79,79,79,0.3);
    background-color: #fff;
    color: #2c3e50;
    padding: 10px;
    border-radius: 2px;
  }
</style>

  <div class="">
    <div class="menu-atas">
      <div class="menu-atas-right">
        <a href="inc/logout.php" style="float:right">
          <span class="btn-1">
            <i class="fa fa-sign-out" style="color:#2c3e50;"></i>
          </span>
        </a>
      </div>
    </div>
    <div class="menu" style="margin-top:-150px;">
      <div class="menu-header">
        <div class="menu-header-content">
          <?php
            $username = $_SESSION['username'];
            $query = "SELECT * from tb_user WHERE username='$username'";
            $result= $crud->view($query);
          ?>
          <?php foreach ($result as $key => $row) {  ?>
          <div class="menu-profil-img">
            <img class="circle-profil" src="img/foto/<?php echo $row['foto'] ?>" alt="" width="70px;" height="70px">
          </div>
          <div class="menu-profil-text">
            <span>Hello, <?php echo $row['nama'] ?></span><br>
          <?php } ?>
            <span><b>Admin</b></span>
          </div>
        </div>
      </div>

      <div class="menu-link">
        <ul class="menus-link">
          <a href="?show=home" id="home"><li>
            <span><i class="fa fa-home"></i></span>
            <span class="menu-cont-link"> Home</span>
          </li></a>

          <a href="?show=u-akun" id="set-akun"><li>
            <span><i class="fa fa-cog"></i></span>
            <span class="menu-cont-link"> Setting Akun</span>
          </li></a>

          <a href="#!" id="1-atas" class="surat" onclick="click1()"><li>
            <span><i class="fa fa-envelope"></i></span>
            <span class="menu-cont-link"> Surat</span>
          </li></a>

          <div class="menu-link-bottom" id="1-bawah">
            <a href="?show=surat-masuk" id="surat-masuk"><li>
              <span><i class="fa fa-share"></i></span>
              <span class="menu-cont-link"> Surat Masuk</span>
            </li></a>
            <a href="?show=surat-keluar" id="surat-keluar"><li>
              <span><i class="fa fa-share" style="transform: rotate(180deg);"></i></span>
              <span class="menu-cont-link"> Surat Keluar</span>
            </li></a>
          </div>

          <a href="?show=data-disposisi" id="data-disposisi"><li>
            <span><i class="fa fa-paper-plane"></i></span>
            <span class="menu-cont-link"> Data Disposisi</span>
          </li></a>

          <a href="?show=filter-surat" id="filter-surat"><li>
            <span><i class="fa fa-search"></i></span>
            <span class="menu-cont-link"> Filter Surat</span>
          </li></a>
        </ul>
      </div>
    </div>

    <div class="content">
      <div class="all">
        <div class="kotak-title">
          <!-- Title Halaman -->
          <p><b id="page-data"></b></p>
        </div>
        <div class="content-container">
          <?php include 'content/content.php'; ?>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function click1() {
    var x = document.getElementById("1-bawah");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
  }
  </script>

<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#1-atas").click(function(){
        if ( $('#1-bawah').is(':hidden') ) {
          $("#1-bawah").slideDown(150);
          $("#2-bawah").slideUp(150);
        }else {
          $("#1-bawah").slideUp(150);
        }
    });

    $("#2-atas").click(function(){
        if ( $('#2-bawah').is(':hidden') ) {
          $("#2-bawah").slideDown(150);
          $("#1-bawah").slideUp(150);
        }else {
          $("#2-bawah").slideUp(150);
        }
    });
  });
  </script> -->
