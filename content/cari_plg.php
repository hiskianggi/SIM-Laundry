<?php
include '../sistem/proses.php';
$aku = $db->get("*","pelanggan","where kode_pelanggan='$_POST[kode_pelanggan]'");
$tampl = $aku->fetch();
$hasilnya = array(
	'nama_pelanggan'      =>  $tampl['nama_pelanggan']);
echo json_encode($hasilnya);
?>