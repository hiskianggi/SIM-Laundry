<?php
include "../sistem/proses.php";
error_reporting(0);
$Host = "localhost";
$username = "root";
$password = "";
$database = "db_laundry";
$koneksi = new mysqli( $Host, $username, $password, $database );
$query = "SELECT max(nomer_order) as maxKode FROM orderan";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodeOrder = $data['maxKode'];
$noUrut = (int) substr($kodeOrder, 3, 3);
$noUrut++;
$char = "LDR";
$kodeOrder = $char . sprintf("%03s", $noUrut);
?>
<input required="" readonly="" value="<?php echo $kodeOrder; ?>" id="nomer_order" name="nomer_order" type="text">