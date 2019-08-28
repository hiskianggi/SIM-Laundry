<?php
include '../sistem/proses.php';
$query = $db->get("orderan.nomer_order,jasa.nama_jasa,jasa.harga,orderan.berat_cucian,orderan.total_harga","orderan","INNER JOIN jasa on jasa.kode_jasa=orderan.kode_jasa WHERE orderan.nomer_order='$_POST[nomer_order]'");
$mengambil = $query->fetch();
$query1 = $db->get("pelanggan.nama_pelanggan","orderan","INNER JOIN pelanggan on pelanggan.kode_pelanggan=orderan.kode_pelanggan WHERE orderan.nomer_order='$_POST[nomer_order]'");
$mengambil1 = $query1->fetch();
if ($mengambil1['nama_pelanggan']=="") {
	$nama_pelanggan = "Data Tidak Ada";
}else{
	$nama_pelanggan = $mengambil1['nama_pelanggan'];
}
$hasilnya = array(
	'nama_pelanggan' =>  $nama_pelanggan,
	'nama_jasa'      =>  $mengambil['nama_jasa'],
	'harga'			 =>  $mengambil['harga'],
	'berat_cucian'   =>  $mengambil['berat_cucian'],
	'total_harga'	 =>  $mengambil['total_harga'],);
echo json_encode($hasilnya);
?>