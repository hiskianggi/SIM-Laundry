<?php
include "sistem/proses.php";
if ($_SESSION['status']=="Admin") {
  $showcontent="";
  $showwarning="hidden";
}else{
  $showcontent="hidden";
  $showwarning="";
}
if (isset($_POST['cari'])) {
  $cd ="$_POST[cari_data]";
  $jp ="$_POST[jenis_pencarian]";
}else{
  $cd ="";
  $jp ="";
}
if(isset($_POST['cari'])){
  if ($jp=="notfound" || $cd=="") {
    echo "<script>alert('Salah Satu Data Pencarian Belum Terisi')</script>";
    echo "<script>document.location.href='/laundry/pelanggan'</script>";
  }else{
    if($jp=="status_pelanggan"){
      $qw=$db->get("*","pelanggan","WHERE status_pelanggan LIKE '$cd' AND kode_pelanggan like 'PLG%'");
    }else{
      $qw=$db->get("*","pelanggan","WHERE $jp LIKE '%$cd%' AND kode_pelanggan like 'PLG%'");
    }
  }
}elseif (isset($_POST['reset'])) {
  $qw=$db->get("*","pelanggan","");
}else{
  $qw=$db->get("*","pelanggan","WHERE kode_pelanggan like 'PLG%' ORDER BY kode_pelanggan ASC");
}
$hitungdata = $qw->rowCount();
if ($hitungdata=="0") {
  $tbhidden="hidden";
  $cphidden="";
}else{
  $tbhidden="";
  $cphidden="hidden";
}
if (!isset($_POST['cari'])) {
  $buttonreset="hidden";
}else{
  $buttonreset="";
}
?>
<!-- Judul Halaman -->
<title>Pelanggan | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
  </div>
  <div class="container">
    <div class="row">
      <div class="col s10 m6 l6">
        <h5 class="breadcrumbs-title">Pelanggan</h5>
        <ol class="breadcrumbs">
          <li><a href="home">Dashboard</a>
          </li>
          <li class="active">Pelanggan</li>
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
    <form action="pelanggan" method="POST">
      <select name="jenis_pencarian" class="kecilkecil">
        <option value="notfound">== PILIH ==</option>
        <option <?php if($jp=="kode_pelanggan"){echo "selected";}?> value="kode_pelanggan">Kode Pelanggan</option>
        <option <?php if($jp=="nama_pelanggan"){echo "selected";}?> value="nama_pelanggan">Nama Pelanggan</option>
        <option <?php if($jp=="alamat"){echo "selected";}?> value="alamat">Alamat</option>
        <option <?php if($jp=="no_telp"){echo "selected";}?> value="no_telp">No Telp</option>
        <option <?php if($jp=="status_pelanggan"){echo "selected";}?> value="status_pelanggan">Status Pelanggan</option>
      </select>
      <input value="<?php echo $cd;?>" style="width: 20%;margin-left: 20px;margin-right: 20px;" type="text" name="cari_data" class="hide-on-med-and-downheader-search-input z-depth-2" placeholder="Masukkan Datamu Disini.." />
      <button class="btn waves-effect waves-light" type="submit" name="cari"><i class="material-icons right">search</i> Cari</button>
      <a <?php echo $buttonreset;?>><button class="btn waves-effect waves-light" type="submit" name="reset"><i class="material-icons right">format_clear</i> Reset</button></a>
    </form>
    <a href="input_pelanggan" class="waves-effect waves-light btn right"><i class="material-icons left">center_focus_weak</i> Tambah</a>
    <p><div class="divider"></div></p>
    <!-- Caption Ketika Data Sedang Kosong -->
    <p <?php echo $cphidden;?> class="caption">Data Sedang Kosong!</p>
    <!-- Tampil Data pelanggan -->
    <table class="centered" <?php echo $tbhidden;?>>
      <thead>
        <tr>
          <th>Kode Pelanggan</th>
          <th>Nama Pelanggan</th>
          <th>Alamat</th>
          <th>No Telp</th>
          <th>Status Pelanggan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($qw as $tamp_pelanggan){
          ?>
          <tr>
            <td><?php echo $tamp_pelanggan['kode_pelanggan'];?></td>
            <td><?php echo $tamp_pelanggan['nama_pelanggan'];?></td>
            <td><?php echo $tamp_pelanggan['alamat'];?></td>
            <td><?php echo $tamp_pelanggan['no_telp'];?></td>
            <td><?php echo $tamp_pelanggan['status_pelanggan'];?></td>
            <td>
              <div class="kotak">
                <a href="index.php?p=input_pelanggan&kode_pelanggan=<?php echo $tamp_pelanggan['kode_pelanggan'];?>"><img src="images/icon/edit.png"></a>
                <a href="crud/d_pelanggan.php?kode_pelanggan=<?php echo $tamp_pelanggan['kode_pelanggan'];?>"><img src="images/icon/hapus.png"></a>
              </div>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>