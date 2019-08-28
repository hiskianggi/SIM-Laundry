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
if(empty($_GET['kode_pelanggan'])) {
  $Host = "localhost";
  $username = "root";
  $password = "";
  $database = "db_laundry";
  $koneksi = new mysqli( $Host, $username, $password, $database );
  $query = "SELECT max(kode_pelanggan) as maxKode FROM pelanggan";
  $hasil = mysqli_query($koneksi,$query);
  $data = mysqli_fetch_array($hasil);
  $kodePelanggan = $data['maxKode'];
  $noUrut = (int) substr($kodePelanggan, 3, 3);
  $noUrut++;
  $char = "PLG";
  $kodePelanggan = $char . sprintf("%03s", $noUrut);
  $sub='simpan';
  $aksinya='crud/cu_pelanggan.php';
}else{
  $kodePelanggan=$_GET['kode_pelanggan'];
  $sub='edit';
  $aksinya='crud/cu_pelanggan.php';
}
$qry=$db->get("*","pelanggan","WHERE kode_pelanggan='$_GET[kode_pelanggan]'");
$tampq=$qry->fetch();
?>
<!-- Judul Halaman -->
<title>Input Pelanggan | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
  </div>
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title">Input Pelanggan</h5>
        <ol class="breadcrumbs">
          <li><a href="home">Dashboard</a>
          </li>
          <li class="active">Input Pelanggan</li>
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
        <h4 class="header2">Input Pelanggan</h4>
        <div class="row">
          <form action="<?php echo $aksinya;?>" class="col s12" method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input required="" readonly="" value="<?php echo $kodePelanggan; ?>" id="kode_pelanggan" name="kode_pelanggan" type="text">
                <label for="kode_pelanggan">Kode Pelanggan</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input required="" onkeypress="return huruf(event)" value="<?php echo $tampq['nama_pelanggan'];?>" placeholder="Name" id="nama_pelanggan" name="nama_pelanggan" type="text">
                <label for="nama_pelanggan">Nama Pelanggan</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input required="" value="<?php echo $tampq['alamat'];?>" placeholder="Alamat" id="alamat" name="alamat" type="text">
                <label for="alamat">Alamat</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input required="" onkeypress="return angka(event)" value="<?php echo $tampq['no_telp'];?>" type="text" placeholder="08" id="no_telp" name="no_telp"></input>
                <label for="no_telp">Nomor Telepon</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <select id="status_pelanggan" name="status_pelanggan">
                  <option <?php if($tampq['status_pelanggan']){echo "selected";}?>>Aktif</option>
                  <option <?php if($tampq['status_pelanggan']){echo "selected";}?>>Tidak Aktif</option>
                </select>
                <label for="status_pelanggan">Status pelanggan</label>
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