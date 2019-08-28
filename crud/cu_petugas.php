<?php
include "../sistem/proses.php";
$pw=md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode($_POST['password_ptg']))))))))))))))))));
if(isset($_POST['simpan'])){
	$simpan=$db->insert("petugas","'$_POST[kode_ptg]',
		'$_POST[nama_ptg]',
		'$pw',
		'$_POST[status]'");
	if($simpan){
		echo "<script>alert('Berhasil Disimpan')</script>";
		echo "<script>document.location.href='../petugas'</script>";
	}else{
		echo "<script>alert('Gagal Disimpan')</script>";
		echo "<script>document.location.href='../petugas'</script>";
	}
}else{
	$edit=$db->update("petugas","kode_ptg='$_POST[kode_ptg]',
		nama_ptg='$_POST[nama_ptg]',
		password_ptg='$pw',
		status='$_POST[status]'",
		"kode_ptg='$_POST[kode_ptg]'" );
	if($edit){
		echo "<script>alert('Berhasil Diedit')</script>";
		echo "<script>document.location.href='../petugas'</script>";
	}else{
		echo "<script>alert('Gagal Diedit')</script>";
		echo "<script>document.location.href='../petugas'</script>";
	}
}
?>