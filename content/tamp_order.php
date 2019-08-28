<?php
include '../sistem/proses.php';
$ambildata = $db->get("*","orderan","");
$hitungdata = $ambildata->rowCount();
  // TGL Sekarang
$tglskrg = date("Y-m-d");
if ($hitungdata=="0") {
  $tbhidden="hidden";
  $cphidden="";
}else{
  $tbhidden="";
  $cphidden="hidden";
}
?>
<!-- Caption Ketika Data Sedang Kosong -->
<p <?php echo $cphidden;?> class="caption">Data Sedang Kosong!</p>
<!-- Tampil Data Orderan -->
<table class="centered" <?php echo $tbhidden;?>>
  <thead>
    <tr>
      <th>Nomor Order</th>
      <th>Tanggal Masuk</th>
      <th>Tanggal Selesai</th>
      <th>Nama Jasa</th>
      <th>Harga</th>
      <th>Berat</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $qw=$db->get("orderan.nomer_order,orderan.tanggal_order,orderan.tgl_rencana_selesai,jasa.nama_jasa,jasa.harga,orderan.berat_cucian,orderan.total_harga","orderan","INNER JOIN jasa ON orderan.kode_jasa=jasa.kode_jasa ORDER BY orderan.nomer_order DESC LIMIT 1");
    foreach($qw as $tamp_od){
      ?>
      <tr>
        <td>
          <?php echo $tamp_od['nomer_order'];?>
          <input hidden="" type="text" name="no-hide" id="no-hide" value="<?php echo $tamp_od['nomer_order'];?>">
        </td>
        <td><?php echo $tamp_od['tanggal_order'];?></td>
        <td><?php echo $tamp_od['tgl_rencana_selesai'];?></td>
        <td><?php echo $tamp_od['nama_jasa'];?></td>
        <td><?php echo "Rp. ". number_format($tamp_od['harga'], 2, ",", ".");?></td>
        <td><?php echo $tamp_od['berat_cucian'];?></td>
        <td><?php echo "Rp. ". number_format($tamp_od['total_harga'], 2, ",", ".");?></td>
        <td>
          <div class="kotak">
            <a href="#" onclick="hapus_order()"><img src="images/icon/hapus.png"></a>
          </div>
        </td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>