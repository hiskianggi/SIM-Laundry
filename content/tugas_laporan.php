<!--
14. Buatlah Laporan Untuk Menampilkan Pelanggan Yang Melakukan Order Cuci Dan Setrika Saja Dan Beratnya Dibawah 5 Kg.
Field Yang Ditampilkan Yaitu:
nama pelanggan, nama jasa, harga, berat, total, status
-->

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
<title>Tugas Laporan | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
   <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
 </div>
 <div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title">Tugas Laporan</h5>
      <ol class="breadcrumbs">
        <li><a href="home">Dashboard</a>
        </li>
        <li class="active">Tugas Laporan</li>
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
    <p class="caption">14. Buatlah Laporan Untuk Menampilkan Pelanggan Yang Melakukan Order Cuci Dan Setrika Saja Dan Beratnya Dibawah 5 Kg.<br><i>Field Yang Ditampilkan Yaitu:</i><br><b>nama pelanggan, nama jasa, harga, berat, total, status</b></p>
    <div class="divider"></div>
    <div class="section">
      <!-- Tampil Data Tugas Laporan -->
      <table class="centered">
        <thead>
          <th>Nama Pelanggan</th>
          <th>Nama Jasa</th>
          <th>Harga</th>
          <th>Berat</th>
          <th>Total</th>
          <th>Status</th>
        </thead>
        <tbody>
          <?php
            $qw=$db->get("pelanggan.nama_pelanggan,jasa.nama_jasa,orderan.total_harga,jasa.harga,orderan.berat_cucian,orderan.total_harga,orderan.status_cucian","orderan","INNER JOIN pelanggan on pelanggan.kode_pelanggan=orderan.kode_pelanggan INNER JOIN jasa on jasa.kode_jasa=orderan.kode_jasa where jasa.nama_jasa='Extra Setrika' AND orderan.berat_cucian<5 ORDER BY orderan.nomer_order ASC");
            foreach($qw as $data_laporan){
              ?>
          <tr>
              <td><?php echo $data_laporan['nama_pelanggan'];?></td>
              <td><?php echo $data_laporan['nama_jasa'];?></td>
              <td><?php echo "Rp. ". number_format($data_laporan['harga'], 2, ",", ".");?></td>
              <td><?php echo $data_laporan['berat_cucian'];?></td>
              <td><?php echo "Rp. ". number_format($data_laporan['total_harga'], 2, ",", ".");?></td>
              <td><?php echo $data_laporan['status_cucian'];?></td>
          </tr>
          <?php
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>