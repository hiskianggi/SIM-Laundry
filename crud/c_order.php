<?php
include "../sistem/proses.php";

if ($_POST['kode_pelanggan']=="") {
	$kod_pel="-";
}else{
	$kod_pel=$_POST['kode_pelanggan'];
}

if ($_POST['berat_cucian']=="" || $_POST['kode_jasa']=="" || $_POST['status_cucian']=="") {
	echo "Salah Satu Data Ada Yang Belum Terisi";
}else{
	$simpan=$db->insert("orderan","'$_POST[nomer_order]',
									'$_POST[tanggal_order]',
									'$_POST[tgl_rencana_selesai]',
									'$_POST[berat_cucian]',
									'$_POST[total_harga]',
									'$_POST[status_cucian]',
									'$kod_pel',
									'$_POST[kode_petugas]',
									'$_POST[kode_jasa]'");
	if($simpan){
		
	}else{
		echo "Gagal Disimpan";
	}
}
?>