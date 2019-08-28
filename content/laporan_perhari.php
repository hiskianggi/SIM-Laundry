<?php
include "sistem/proses.php";
$jabatan=$_SESSION['status'];
$namapetugas=$_SESSION['nama_ptg'];
if ($_SESSION['status']=="Admin" || $_SESSION['status']=="Manager") {
  $showcontent="";
  $showwarning="hidden";
}else{
  $showcontent="hidden";
  $showwarning="";
}
if (isset($_POST['cari'])) {
  $tglawal ="$_POST[tgl_awal]";
  $tglakhir ="$_POST[tgl_akhir]";
}else{
  $tglawal ="";
  $tglakhir ="";
}
if (isset($_POST['cari'])) {
  $qw=$db->get("orderan.nomer_order,orderan.tanggal_order,pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,orderan.berat_cucian,orderan.total_harga","orderan","INNER JOIN pelanggan on pelanggan.kode_pelanggan=orderan.kode_pelanggan INNER JOIN jasa on jasa.kode_jasa=orderan.kode_jasa WHERE orderan.tanggal_order >='$_POST[tgl_awal]' AND orderan.tanggal_order <='$_POST[tgl_akhir]' ORDER BY orderan.nomer_order ASC");
}elseif (isset($_POST['print'])) {
  echo "<script>window.open('content/cetak_laporan_pertanggal.php?tgl_awal=$_POST[tgl_awal]&tgl_akhir=$_POST[tgl_akhir]&np=$namapetugas&jb=$jabatan')</script>";
  echo "<script>document.location.href='index.php?p=laporan_perhari'</script>";
}elseif (isset($_POST['reset'])) {
  $qw=$db->get("orderan.nomer_order,orderan.tanggal_order,pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,orderan.berat_cucian,orderan.total_harga","orderan","INNER JOIN pelanggan on pelanggan.kode_pelanggan=orderan.kode_pelanggan INNER JOIN jasa on jasa.kode_jasa=orderan.kode_jasa ORDER BY orderan.nomer_order ASC");
  $tglawal ="";
  $tglakhir ="";
}else{
  $qw=$db->get("orderan.nomer_order,orderan.tanggal_order,pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,orderan.berat_cucian,orderan.total_harga","orderan","INNER JOIN pelanggan on pelanggan.kode_pelanggan=orderan.kode_pelanggan INNER JOIN jasa on jasa.kode_jasa=orderan.kode_jasa ORDER BY orderan.nomer_order ASC");
}
$hitungdata = $qw->rowCount();
if ($hitungdata=="0") {
  $tbhidden="hidden";
  $cphidden="";
}else{
  $tbhidden="";
  $cphidden="hidden";
}
if ($hitungdata=="0" || !isset($_POST['cari'])) {
  $buttonprint="hidden";
}else{
  $buttonprint="";
}
if (!isset($_POST['cari'])) {
  $buttonreset="hidden";
}else{
  $buttonreset="";
}
?>
<!-- Judul Halaman -->
<title>Laporan Per Hari | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
   <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
 </div>
 <div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title">Laporan Per Hari</h5>
      <ol class="breadcrumbs">
        <li><a href="home">Dashboard</a>
        </li>
        <li class="active">Laporan Per Hari</li>
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
  <div class="section" <?php echo $showcontent;?>>
    <form action="laporan_perhari" method="POST">
      <input value="<?php echo $tglawal;?>" required="" style="width: 20%;margin-left: 20px;margin-right: 20px;" type="date" name="tgl_awal" class="hide-on-med-and-downheader-search-input z-depth-2"/>
      <span>s/d</span>
      <input value="<?php echo $tglakhir;?>" required="" style="width: 20%;margin-left: 20px;margin-right: 20px;" type="date" name="tgl_akhir" class="hide-on-med-and-downheader-search-input z-depth-2"/>
      <button <?php echo $tbhidden;?> class="btn waves-effect waves-light" type="submit" name="cari"><i class="material-icons right">search</i> Cari</button>
      <a <?php echo $buttonprint;?>><button class="btn waves-effect waves-light" type="submit" name="print"><i class="material-icons right">format_clear</i> Cetak</button></a>
      <a <?php echo $buttonreset;?>><button class="btn waves-effect waves-light" type="submit" name="reset"><i class="material-icons right">format_clear</i> Reset</button></a>
    </form>
    <p><div class="divider"></div></p>
    <!-- Caption Ketika Data Sedang Kosong -->
    <p <?php echo $cphidden;?> class="caption">Data Yang Anda Cari Tidak Ada!</p>
    <!-- Tampil Data jasa -->
    <table <?php echo $tbhidden;?> class="centered">
      <thead>
        <tr>
          <th>No. Orderan</th>
          <th>Tanggal Order</th>
          <th>Nama Pelanggan</th>
          <th>Nama Jasa</th>
          <th>Harga</th>
          <th>Berat</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $jml_total=0;
        foreach($qw as $data_laporan){
          $jml_total=$jml_total+$data_laporan['total_harga'];
          ?>
          <tr>
            <td><?php echo $data_laporan['nomer_order'];?></td>
            <td><?php echo $data_laporan['tanggal_order'];?></td>
            <td><?php echo $data_laporan['nama_pelanggan'];?></td>
            <td><?php echo $data_laporan['nama_jasa'];?></td>
            <td><?php echo "Rp. ". number_format($data_laporan['harga'], 2, ",", ".");?></td>
            <td><?php echo $data_laporan['berat_cucian'];?></td>
            <td><?php echo "Rp. ". number_format($data_laporan['total_harga'], 2, ",", ".");?></td>
          </tr>
          <?php
        }
        ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><b style="font-size: 20px;">Total :</b></td>
          <td><b style="font-size: 20px;"><?php echo "Rp. ". number_format($jml_total, 2, ",", ".");?></b></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>