<?php
include "../sistem/proses.php";
if(isset($_POST['simpan'])){
	$simpan=$db->insert("pelanggan","'$_POST[kode_pelanggan]',
		'$_POST[nama_pelanggan]',
		'$_POST[alamat]',
		'$_POST[no_telp]',
		'$_POST[status_pelanggan]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>document.location.href='../pelanggan'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../pelanggan'</script>";
	}
}else{
	$edit=$db->update("pelanggan","kode_pelanggan='$_POST[kode_pelanggan]',
		nama_pelanggan='$_POST[nama_pelanggan]',
		alamat='$_POST[alamat]',
		no_telp='$_POST[no_telp]',
		status_pelanggan='$_POST[status_pelanggan]'",
		"kode_pelanggan='$_POST[kode_pelanggan]'" );
	if($edit){
		echo "<script>alert('Berhasil Diedit')</script>";
		echo "<script>document.location.href='../pelanggan'</script>";
	}else{
		echo "<script>alert('Gagal Diedit')</script>";
		echo "<script>document.location.href='../pelanggan'</script>";
	}
}
?>