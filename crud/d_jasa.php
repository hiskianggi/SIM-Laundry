<?php 
include '../sistem/proses.php';
$hapus=$db->delete("jasa","kode_jasa='$_GET[kode_jasa]'");
if($hapus){
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=jasa'</script>";
}else{
	echo "<script>alert('Gagal Dihapus')</script>";
	echo "<script>document.location.href='../index.php?p=jasa'</script>";
}
?>