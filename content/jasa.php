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
    echo "<script>document.location.href='/laundry/jasa'</script>";
  }else{
    $qw=$db->get("*","jasa","WHERE $jp LIKE '%$cd%'");
  }
}elseif (isset($_POST['reset'])) {
  $qw=$db->get("*","jasa","");
}else{
  $qw=$db->get("*","jasa","ORDER BY kode_jasa ASC");
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
<title>Jasa | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
   <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
 </div>
 <div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title">Jasa</h5>
      <ol class="breadcrumbs">
        <li><a href="home">Dashboard</a>
        </li>
        <li class="active">Jasa</li>
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
    <form action="jasa" method="POST">
      <select name="jenis_pencarian" class="kecilkecil">
        <option value="notfound">== PILIH ==</option>
        <option <?php if($jp=="kode_jasa"){echo "selected";}?> value="kode_jasa">Kode Jasa</option>
        <option <?php if($jp=="nama_jasa"){echo "selected";}?> value="nama_jasa">Nama Jasa</option>
        <option <?php if($jp=="harga"){echo "selected";}?> value="harga">Harga</option>
      </select>
      <input value="<?php echo $cd;?>" style="width: 20%;margin-left: 20px;margin-right: 20px;" type="text" name="cari_data" class="hide-on-med-and-downheader-search-input z-depth-2" placeholder="Masukkan Datamu Disini.." />
      <button class="btn waves-effect waves-light" type="submit" name="cari"><i class="material-icons right">search</i> Cari</button>
      <a <?php echo $buttonreset;?>><button class="btn waves-effect waves-light" type="submit" name="reset"><i class="material-icons right">format_clear</i> Reset</button></a>
    </form>
    <a href="input_jasa" class="waves-effect waves-light  btn right"><i class="material-icons left">center_focus_weak</i> Tambah</a>
    <p><div class="divider"></div></p>
    <!-- Caption Ketika Data Sedang Kosong -->
    <p <?php echo $cphidden;?> class="caption">Data Sedang Kosong!</p>
    <!-- Tampil Data jasa -->
    <table class="centered" <?php echo $tbhidden;?>>
      <thead>
        <tr>
          <th>Kode Jasa</th>
          <th>Nama Jasa</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($qw as $tamp_jasa){
          ?>
          <tr>
            <td><?php echo $tamp_jasa['kode_jasa'];?></td>
            <td><?php echo $tamp_jasa['nama_jasa'];?></td>
            <td><?php echo "Rp. ". number_format($tamp_jasa['harga'], 2, ",", ".");?></td>
            <td>
              <div class="kotak">
                <a href="index.php?p=input_jasa&kode_jasa=<?php echo $tamp_jasa['kode_jasa'];?>"><img src="images/icon/edit.png"></a>
                <a href="crud/d_jasa.php?kode_jasa=<?php echo $tamp_jasa['kode_jasa'];?>"><img src="images/icon/hapus.png"></a>
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