<?php
include "sistem/proses.php";
if ($_SESSION['status']=="Admin" || $_SESSION['status']=="Manager") {
  $showcontent="";
  $showwarning="hidden";
}else{
  $showcontent="hidden";
  $showwarning="";
}
?>
<!-- Judul Halaman -->
<title>Laporan | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
   <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
 </div>
 <div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title">Laporan</h5>
      <ol class="breadcrumbs">
        <li><a href="home">Dashboard</a>
        </li>
        <li class="active">Laporan</li>
      </ol>
    </div>
  </div>
</div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="container">
  <p <?php echo $showwarning;?> class="caption">Anda Tidak Diperbolehkan Mengakses Halaman Ini!</p>
  <div <?php echo $showwarning;?> class="divider"></div>
  <div <?php echo $showcontent;?> class="section">
    <!--Card Reveal-->
    <div class="divider"></div>
    <div id="card-reveal" class="section">
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="row">
            <div class="col s12 m4 l4">
              <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="images/gallary/5.png" alt="office">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Laporan Per Hari
                    <i class="material-icons right">more_vert</i>
                  </span>
                  <p><a href="laporan_perhari">Klik Disini</a>
                  </p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Laporan Per Hari
                    <i class="material-icons right">close</i>
                  </span>
                  <p>Yang Terhormat "<?php echo $_SESSION['nama_ptg'];?>", Disini Anda Bisa Melihat Laporan Perhari Dari Jasa Laundry Anda</p>
                </div>
              </div>
            </div>
            <div class="col s12 m4 l4">
              <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="images/gallary/6.png" alt="office">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Laporan Per Bulan
                    <i class="material-icons right">more_vert</i>
                  </span>
                  <p><a href="laporan_perbulan">Klik Disini</a>
                  </p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Laporan Per Bulan
                    <i class="material-icons right">close</i>
                  </span>
                  <p>Yang Terhormat "<?php echo $_SESSION['nama_ptg'];?>", Disini Anda Bisa Melihat Laporan Perbulan Dari Jasa Laundry Anda</p>
                </div>
              </div>
            </div>
            <div class="col s12 m4 l4">
              <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="images/gallary/23.png" alt="office">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">Laporan Per Tahun
                    <i class="material-icons right">more_vert</i>
                  </span>
                  <p><a href="laporan_pertahun">Klik Disini</a>
                  </p>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Laporan Per Bulan
                    <i class="material-icons right">close</i>
                  </span>
                  <p>Yang Terhormat "<?php echo $_SESSION['nama_ptg'];?>", Disini Anda Bisa Melihat Laporan Pertahun Dari Jasa Laundry Anda</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Tabs in Cards-->
  </div>
  <div class="divider"></div>
</div>