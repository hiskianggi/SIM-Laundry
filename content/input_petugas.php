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
if(empty($_GET['kode_ptg'])) {
  $Host = "localhost";
  $username = "root";
  $password = "";
  $database = "db_laundry";
  $koneksi = new mysqli( $Host, $username, $password, $database );
  $query = "SELECT max(kode_ptg) as maxKode FROM petugas";
  $hasil = mysqli_query($koneksi,$query);
  $data = mysqli_fetch_array($hasil);
  $kodePetugas = $data['maxKode'];
  $noUrut = (int) substr($kodePetugas, 3, 3);
  $noUrut++;
  $char = "PTG";
  $kodePetugas = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  $aksinya='crud/cu_petugas.php';
}else{
  $kodePetugas=$_GET['kode_ptg'];
  $sub='edit';
  $aksinya='crud/cu_petugas.php';
}
$qry=$db->get("*","petugas","WHERE kode_ptg='$_GET[kode_ptg]'");
$tampq=$qry->fetch();
?>
<!-- Judul Halaman -->
<title>Input Petugas | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
  </div>
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title">Input Petugas</h5>
        <ol class="breadcrumbs">
          <li><a href="home">Dashboard</a>
          </li>
          <li class="active">Input Petugas</li>
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
    <p class="caption">Silahkan Isi Semua Form Dengan Benar!</p>
    <div class="divider"></div>
    <!-- Form with placeholder -->
    <div class="col s12 m12 l6">
      <div class="card-panel">
        <h4 class="header2">Input Petugas</h4>
        <div class="row">
          <form action="<?php echo $aksinya;?>" class="col s12" method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input required="" readonly="" value="<?php echo $kodePetugas; ?>" id="kode_ptg" name="kode_ptg" type="text">
                <label for="kode_petugas">Kode Petugas</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input required="" onkeypress="return huruf(event)" placeholder="Nama Petugas" id="nama_ptg" name="nama_ptg" type="text" value="<?php echo $tampq['nama_ptg'];?>">
                <label for="nama_petugas">Nama Petugas</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name="password_ptg" id="password_ptg" type="password" placeholder="Password">
                <span class="input-group-btn">
                  <button id= "show_password" class="btn waves-effect waves-light btn-flat" type="button">
                    <i class="material-icons">highlight</i> Show Password
                  </button>
                </span>
                <label for="password">Password</label>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="input-field col s12">
                <select id="status" name="status">
                  <option <?php if($tampq['status']=="Admin"){echo "selected";}?>>Admin</option>
                  <option <?php if($tampq['status']=="Kasir"){echo "selected";}?>>Kasir</option>
                  <option <?php if($tampq['status']=="Manager"){echo "selected";}?>>Manager</option>
                </select>
                <label for="status">Status</label>
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