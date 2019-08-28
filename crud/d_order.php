<?php 
include '../sistem/proses.php';
$hapus=$db->delete("orderan","nomer_order='$_POST[nomer_order]'");
if($hapus){
	echo "Berhasil Dihapus";
}else{
	echo "Gagal Dihapus";
}
?>