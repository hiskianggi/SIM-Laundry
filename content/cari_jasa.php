<?php
include '../sistem/proses.php';
$aku = $db->get("*","jasa","where kode_jasa='$_POST[kode_jasa]'");
$tampl = $aku->fetch();
$hasilnya = array(
	'kode_jasa'      =>  $tampl['kode_jasa'],
	'nama_jasa'      =>  $tampl['nama_jasa'],
	'tampil_harga'   =>  $tampl['harga'],
	'harga'    		 =>  $tampl['harga'],);
echo json_encode($hasilnya);
?>