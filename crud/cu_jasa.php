<?php
include "../sistem/proses.php";
if(isset($_POST['simpan'])){
	$simpan=$db->insert("jasa","'$_POST[kode_jasa]',
		'$_POST[nama_jasa]',
		'$_POST[harga]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>document.location.href='../jasa'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../jasa'</script>";
	}
}else{
	$edit=$db->update("jasa","kode_jasa='$_POST[kode_jasa]',
		nama_jasa='$_POST[nama_jasa]',
		harga='$_POST[harga]'",
		"kode_jasa='$_POST[kode_jasa]'" );
	if($edit){
		echo "<script>alert('Berhasil Diedit')</script>";
		echo "<script>document.location.href='../jasa'</script>";
	}else{
		echo "<script>alert('Gagal Diedit')</script>";
		echo "<script>document.location.href='../jasa'</script>";
	}
}
?>