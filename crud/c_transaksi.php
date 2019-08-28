<?php
include '../sistem/proses.php';
$ambildb=$db->get("orderan.status_cucian","orderan","WHERE nomer_order='$_POST[nomer_order]' AND status_cucian='Belum Diambil'");
$hitungdb=$ambildb->rowCount();
if ($hitungdb=="0") {
	echo "<script>alert('Cucian Sudah Diambil!')</script>";
	echo "<script>document.location.href='../transaksi'</script>";
}else{
	$simpan=$db->insert("transaksi","'$_POST[no_transaksi]',
		'$_POST[tgl_trans]',
		'$_POST[bayar]',
		'$_POST[kembali]',
		'$_POST[kode_ptg]',
		'$_POST[nomer_order]'");
	$edit=$db->update("orderan","status_cucian='$_POST[status_cucian]'",
		"nomer_order='$_POST[nomer_order]'" );
	if($simpan && $edit){
		echo "<script>window.open('../struk/transaksi.php?no_transaksi=$_POST[no_transaksi]')</script>";
		echo "<script>document.location.href='../transaksi'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../transaksi'</script>";
	}
}
?>