<?php
include "sistem/proses.php";
// TGL OTOMATIS
$tgloto = date("Y-m-d");
// Jumlah Pelanggan
$hslplg = $db->get("*","pelanggan","");
$jmlplg = $hslplg->rowCount();
// Jumlah Petugas
$hslptg = $db->get("*","petugas","");
$jmlptg = $hslptg->rowCount();
//Jumlah Orderan
$hslord = $db->get("*","orderan","");
$jmlord = $hslord->rowCount();
// Jumlah Cucian Yang Belum Diambil
$hslbd = $db->get("*","orderan","WHERE orderan.status_cucian='Belum Diambil'");
$jmlbd = $hslbd->rowCount();
// Jumlah Cucian Yang Sudah Diambil
$hslsd = $db->get("*","orderan","WHERE orderan.status_cucian='Sudah Diambil'");
$jmlsd = $hslsd->rowCount();
//Jumlah Orderan Hari Ini
$hslordini = $db->get("*","orderan","WHERE tanggal_order='$tgloto'");
$jmlordini = $hslordini->rowCount();
//Jumlah Transaksi Hari Ini
$hsltransini = $db->get("*","transaksi","WHERE tgl_transaksi='$tgloto'");
$jmltransini = $hsltransini->rowCount();
// Jumlah Cucian Selesai Hari Ini
$hslcucini = $db->get("*","orderan","WHERE tgl_rencana_selesai='$tgloto'");
$jmlcucini = $hslcucini->rowCount();
// Jumlah Jasa
$hsljs = $db->get("*","jasa","");
$jmljs = $hsljs->rowCount();
?>
<!-- Judul Halaman -->
<title>Beranda | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
  </div>
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title">Home</h5>
        <ol class="breadcrumbs">
          <li><a href="home">Dashboard</a>
          </li>
          <li class="active">Home</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="container">
  <!--card stats start-->
  <div id="card-stats">
    <div class="row mt-1">
      <div class="col s12 m6 l3">
        <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
          <div class="padding-4">
            <div class="col s7 m7">
              <i class="material-icons background-round mt-5">add_shopping_cart</i>
              <p>Jumlah Order</p>
            </div>
            <div class="col s5 m5 right-align">
              <h5 class="mb-0"><?php echo $jmlordini;?></h5>
              <p class="no-margin">Hari Ini</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
          <div class="padding-4">
            <div class="col s7 m7">
              <i class="material-icons background-round mt-5">input</i>
              <p>Transaksi</p>
            </div>
            <div class="col s5 m5 right-align">
              <h5 class="mb-0"><?php echo $jmltransini;?></h5>
              <p class="no-margin">Hari Ini</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
          <div class="padding-4">
            <div class="col s7 m7">
              <i class="material-icons background-round mt-5">timeline</i>
              <p>Cucian Selesai</p>
            </div>
            <div class="col s5 m5 right-align">
              <h5 class="mb-0"><?php echo $jmlcucini;?></h5>
              <p class="no-margin">Hari Ini</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col s12 m6 l3">
        <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
          <div class="padding-4">
            <div class="col s7 m7">
              <i class="material-icons background-round mt-5">attach_money</i>
              <p>Jumlah Jasa</p>
            </div>
            <div class="col s5 m5 right-align">
              <h5 class="mb-0"><?php echo $jmljs;?></h5>
              <p class="no-margin">Semua</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="divider"></div>
<br>
<div class="row">
  <div class="col s12">
    <div class="row">
      <div class="col s12 m4 l4">
        <div class="card-panel gradient-45deg-amber-amber">
          <center>
            <font size="20px" class="white-text"><?php echo $jmlplg;?></font><br>
            <span class="white-text">Jumlah Pelanggan</span>
          </center>
        </div>
      </div>
      <div class="col s12 m4 l4">
        <div class="card-panel gradient-45deg-light-blue-cyan gradient-shadow">
          <center>
            <font size="20px" class="white-text"><?php echo $jmlord;?></font><br>
            <span class="white-text">Jumlah Order</span>
          </center>
        </div>
      </div>
      <div class="col s12 m4 l4">
        <div class="card-panel gradient-45deg-red-pink gradient-shadow">
          <center>
            <font size="20px" class="white-text"><?php echo $jmlptg;?></font><br>
            <span class="white-text">Pengguna</span>
          </center>
        </div>
      </div>
      <div class="col s12 m4 l4">
        <div class="card-panel gradient-45deg-purple-deep-orange gradient-shadow">
          <center>
            <font size="20px" class="white-text"><?php echo $jmlsd;?></font><br>
            <span class="white-text">Sudah Diambil</span>
          </center>
        </div>
      </div>
      <div class="col s12 m4 l4">
        <div class="card-panel gradient-45deg-green-teal gradient-shadow">
          <center>
            <font size="20px" class="white-text"><?php echo $jmlbd;?></font><br>
            <span class="white-text">Belum Diambil</span>
          </center>
        </div>
      </div>
      <div class="col s12 m4 l4">
        <div class="card-panel gradient-45deg-purple-light-blue gradient-shadow">
          <center>
            <font size="20px" class="white-text">0</font><br>
            <span class="white-text">Laporan</span>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row section" style="margin-left: 100px;">
  <div class="col s12 m7 l7">
    <div class="card medium">
      <div class="card-image">
        <img src="images/gallary/25.png" alt="sample">
        <span class="card-title">Cara Memulai Bisnis Laundry Bagi Pemula</span>
      </div>
      <div class="card-content">
        <p>Kali ini akan kita kupas secara lengkap mengenai bisnis laundry dari berapa modal bisnis yang di perlukan, cara memulai usaha laundry yang baik, dan hal-hal yang di perlukan lainnya akan kita kupas secara lengkap di artikel ini...</p>
      </div>
      <div class="card-action">
        <a target="_blank" href="http://www.usahalaundry.co.id/2017/10/19/cara-membuka-usaha-laundry-untuk-pemula/">Klik Disini</a>
      </div>
    </div>
  </div>
  <div class="col s12 m7 l4" style="margin-top: 2px;">
    <div id="profile-card" class="card">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="images/gallary/3.png" alt="user bg">
      </div>
      <div class="card-content">
        <img src="images/avatar/avatar-7.png" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
        <a target="_blank" href="http://localhost/laundry/index.php?p=input_petugas&kode_ptg=<?php echo $_SESSION['kode_ptg'];?>" class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
          <i class="material-icons">edit</i>
        </a><br>
        <span class="card-title activator grey-text text-darken-4"> <?php echo $_SESSION['nama_ptg'];?></span>
        <p>
          <i class="material-icons">perm_identity</i> <?php echo $_SESSION['kode_ptg'];?></p>
          <p>
            <i class="material-icons">grade</i> <?php echo $_SESSION['status'];?></p>
            <p>
              <i class="material-icons">email</i> hiskia@mtsdt.sch.id</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>