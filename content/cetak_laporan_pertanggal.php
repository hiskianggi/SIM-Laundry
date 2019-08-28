<?php
session_start();
include "../sistem/proses.php";
?>
<link rel="stylesheet" type="text/css" href="/simpenjualan/assets/css/style.css">
<title>Laporan Per Tanggal <?php echo "$_GET[tgl_awal]";?> s/d <?php echo "$_GET[tgl_akhir]";?></title>
<body style="background-color: #fff;">
  <center>
    <div class="isi-content">
      <div class="judul-content">
        <center>
          <h1>Laporan Per Tanggal</h1>
          <h3><?php echo "$_GET[tgl_awal]";?> s/d <?php echo "$_GET[tgl_akhir]";?></h3>
        </center>
      </div>
      <br>
      <table class="tabel">
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
          $qw=$db->get("orderan.nomer_order,orderan.tanggal_order,pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,orderan.berat_cucian,orderan.total_harga","orderan","INNER JOIN pelanggan on pelanggan.kode_pelanggan=orderan.kode_pelanggan INNER JOIN jasa on jasa.kode_jasa=orderan.kode_jasa WHERE orderan.tanggal_order >='$_GET[tgl_awal]' AND orderan.tanggal_order <='$_GET[tgl_akhir]' ORDER BY orderan.nomer_order ASC");
          foreach($qw as $data_laporan){
            $jml_total=$jml_total+$data_laporan['total_harga'];
            ?>
            <tr>
              <td><?php echo $data_laporan['nomer_order'];?></td>
              <td><?php echo $data_laporan['tanggal_order'];?></td>
              <td><?php echo $data_laporan['nama_pelanggan'];?></td>
              <td><?php echo $data_laporan['nama_jasa'];?></td>
              <td><?php echo "Rp. ". number_format($data_laporan['harga'], 2, ",", ".");?>
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
      <p style="float: left;font-size: 21px;margin-left: 50px;">
        <b>
          Jepara, <?php echo date("d-m-Y");?><br>
          <?php echo $_SESSION['status'];?>
          <br>
          <br>
          <br>
          <br>
          (<?php echo $_SESSION['nama_ptg'];?>)
        </b>
      </p>
    </div>
  </body>
  </html>
  <script type="text/javascript">window.print();</script>