<?php 
session_start();
if (!isset($_SESSION['nama_ptg'])){
  header("location:login/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
  ================================================================================ -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css//materialize.css" type="text/css" rel="stylesheet">
    <link href="css//style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-green-teal">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.php" class="brand-logo darken-1">
                    <img src="images/logo/materialize-logo.png" alt="materialize logo">
                    <span class="logo-text hide-on-med-and-down">SIM Laundry</span>
                  </a>
                </h1>
              </li>
            </ul>
            <ul class="right hide-on-med-and-down">
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="images/avatar/avatar-11.png" alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="#" class="grey-text text-darken-1">
                  <i class="material-icons">settings</i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#!" onclick="$('#modal4').modal('open');" class="grey-text text-darken-1">
                    <i class="material-icons">keyboard_tab</i> Logout</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
          <!-- end header nav-->
          <!-- Logout Modal -->
          <!-- Modal Structure -->
          <div id="modal4" class="modal">
            <div class="modal-content">
              <h4>Konfirmasi Log Out.</h4>
              <p>Yakin Ingin Log Out?</p>
            </div>
            <div class="modal-footer">
              <a href="login/logout.php" class="modal-action modal-close btn gradient-45deg-amber-amber">Yes</a>
              <a href="#!" class="modal-action modal-close btn gradient-45deg-light-blue-cyan">No</a>
            </div>
          </div>
        </header>
        <!-- END HEADER -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START MAIN -->
        <div id="main">
          <!-- START WRAPPER -->
          <div class="wrapper">
            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
              <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                  <div class="row">
                    <div class="col col s4 m4 l4">
                      <img src="images/avatar/avatar-11.png" alt="" class="circle responsive-img valign profile-image cyan">
                    </div>
                    <div class="col col s8 m8 l8">
                      <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn"><?php echo $_SESSION['nama_ptg'];?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                      <p class="user-roal"><?php echo $_SESSION['status'];?></p>
                    </div>
                  </div>
                </li>
                <li class="no-padding">
                  <ul class="collapsible" data-collapsible="accordion">
                    <?php
                    if ($_SESSION['status']=="Admin") {
                      $lapetugas="";
                      $lapelanggan="";
                      $lajasa="";
                      $laorder="";
                      $latransaksi="";
                      $lalaporan="";
                      $latugas="";
                    }elseif ($_SESSION['status']=="Kasir") {
                      $lapetugas="hidden";
                      $lapelanggan="hidden";
                      $lajasa="hidden";
                      $laorder="";
                      $latransaksi="";
                      $lalaporan="hidden";
                      $latugas="hidden";
                    }elseif ($_SESSION['status']=="Manager") {
                      $lapetugas="hidden";
                      $lapelanggan="hidden";
                      $lajasa="hidden";
                      $laorder="hidden";
                      $latransaksi="hidden";
                      $lalaporan="";
                      $latugas="";
                    }
                    ?>
                    <li class="bold">
                      <a href="home" class="waves-effect waves-cyan">
                        <i class="material-icons">home</i>
                        <span class="nav-text">Beranda</span>
                      </a>
                    </li>
                    <li <?php echo $lapetugas;?> class="bold">
                      <a href="petugas" class="waves-effect waves-cyan">
                        <i class="material-icons">perm_identity</i>
                        <span class="nav-text">Petugas</span>
                      </a>
                    </li>
                    <li <?php echo $lapelanggan;?> class="bold">
                      <a href="pelanggan" class="waves-effect waves-cyan">
                        <i class="material-icons">account_circle</i>
                        <span class="nav-text">Pelanggan</span>
                      </a>
                    </li>
                    <li <?php echo $lajasa;?> class="bold">
                      <a href="jasa" class="waves-effect waves-cyan">
                        <i class="material-icons">assessment</i>
                        <span class="nav-text">Jasa</span>
                      </a>
                    </li>
                    <li <?php echo $laorder;?> class="bold">
                      <a href="order" class="waves-effect waves-cyan">
                        <i class="material-icons">add_shopping_cart</i>
                        <span class="nav-text">Order</span>
                      </a>
                    </li>
                    <li <?php echo $latransaksi;?> class="bold">
                      <a href="transaksi" class="waves-effect waves-cyan">
                        <i class="material-icons">input</i>
                        <span class="nav-text">Transaksi</span>
                      </a>
                    </li>
                    <li <?php echo $lalaporan;?> class="bold">
                      <a href="laporan" class="waves-effect waves-cyan">
                        <i class="material-icons">report</i>
                        <span class="nav-text">Laporan</span>
                      </a>
                    </li>
                    <li hidden="" class="bold">
                      <a href="tugas_laporan" class="waves-effect waves-cyan">
                        <i class="material-icons">report</i>
                        <span class="nav-text"><b>Tugas Laporan</b></span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
              <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
                <i class="material-icons">menu</i>
              </a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START CONTENT -->
            <section id="content">
              <!-- CONTENTNYA -->
              <?php
              if(empty($_GET['p'])){
                echo "<script>document.location.href='home'</script>";
              }else{
                $p=$_GET['p'];
                include "content/$p.php";
              }
              ?>
              <!-- end content -->
            </section>
            <!-- END CONTENT -->
          </div>
          <!-- END WRAPPER -->
        </div>
        <!-- END MAIN -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START FOOTER -->
        <footer class="page-footer gradient-45deg-green-teal">
          <div class="footer-copyright">
            <div class="container">
              <span>Copyright ©
                <script type="text/javascript">
                  document.write(new Date().getFullYear());
                </script> <a class="grey-text text-lighten-2" href="home" target="_blank">SIM Laundry</a> All rights reserved.</span>
                <span class="right hide-on-small-only"> Powered By <a class="grey-text text-lighten-2" href="https://www.hiskiaweb.com" target="_blank">Hiskia Anggi</a></span>
              </div>
            </div>
          </footer>
          <!-- END FOOTER -->
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="vendors/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="vendors/jquery.mask.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>
  </body>
  </html>