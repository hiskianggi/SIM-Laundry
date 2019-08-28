<?php
include "sistem/proses.php";
if ($_SESSION['status']=="Admin") {
  $showcontent="";
  $showwarning="hidden";
}else{
  $showcontent="hidden";
  $showwarning="";
}
error_reporting(0);
if(empty($_GET['kode_jasa'])) {
  $Host = "localhost";
  $username = "root";
  $password = "";
  $database = "db_laundry";
  $koneksi = new mysqli( $Host, $username, $password, $database );
  $query = "SELECT max(kode_jasa) as maxKode FROM jasa";
  $hasil = mysqli_query($koneksi,$query);
  $data = mysqli_fetch_array($hasil);
  $kodeJasa = $data['maxKode'];
  $noUrut = (int) substr($kodeJasa, 3, 3);
  $noUrut++;
  $char = "JS";
  $kodeJasa = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  $aksinya='crud/cu_jasa.php';
}else{
  $kodeJasa=$_GET['kode_jasa'];
  $sub='edit';
  $aksinya='crud/cu_jasa.php';
}
$qry=$db->get("*","jasa","WHERE kode_jasa='$_GET[kode_jasa]'");
$tampq=$qry->fetch();
?>
<!-- Judul Halaman -->
<title>Input Jasa | SIM Laundry</title>

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
  </div>
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title">Input Jasa</h5>
        <ol class="breadcrumbs">
          <li><a href="home">Dashboard</a>
          </li>
          <li class="active">Input Jasa</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div  class="container">
  <p <?php echo $showwarning;?> class="caption">Anda Tidak Diperbolehkan Mengakses Halaman Ini!</p>
  <div <?php echo $showwarning;?> class="divider"></div>
  <div <?php echo $showcontent;?> class="section">
    <p class="caption">Silahkan Isi Semua Form Dengan Benar!</p>
    <div class="divider"></div>
    <!-- Form with placeholder -->
    <div class="col s12 m12 l6">
      <div class="card-panel">
        <h4 class="header2">Input Jasa</h4>
        <div class="row">
          <form action="<?php echo $aksinya;?>" class="col s12" method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input required="" readonly="" id="kode_jasa" name="kode_jasa" type="text" value="<?php echo $kodeJasa; ?>">
                <label for="kode_jasa">Kode Jasa</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input required="" onkeypress="return huruf(event)" placeholder="Nama Jasa" id="nama_jasa" name="nama_jasa" type="text" value="<?php echo $tampq['nama_jasa'];?>">
                <label for="nama_jasa">Nama Jasa</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input required="" placeholder="Harga" id="harga" name="harga" type="text" value="<?php echo $tampq['harga'];?>">
                <label for="harga">Harga</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <button class="btn waves-effect waves-light right" type="submit" name="<?php echo $sub;?>">Simpan
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>