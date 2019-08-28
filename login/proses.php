<?php 
session_start();
include '../sistem/proses.php';
if (isset($_POST['submit'])){
	$kode_ptg = $_POST['kode_ptg'];
	$password_ptg = md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode(md5(base64_encode($_POST['password_ptg']))))))))))))))))));
	$query = $db->get("*","petugas","WHERE kode_ptg = '$kode_ptg'");
	$dta = $query->fetch();
	$rows = $query->rowCount();
	if($rows == 0){
		echo "<script>alert('Maaf Username Belum Terdaftar')</script>";
		echo "<script>document.location = 'index.php'</script>";
	}else{
		if($password_ptg <> $dta['password_ptg']){
			echo "<script>alert('Maaf Password Salah')</script>";
			echo "<script>document.location = 'index.php'</script>";
		}else{
			$_SESSION['nama_ptg'] = $dta['nama_ptg'];
			$_SESSION['kode_ptg'] = $dta['kode_ptg'];
			$_SESSION['status'] = $dta['status'];
			echo "<script>alert('Berhasil Login')</script>";
			echo "<script>document.location = '../home'</script>";
		}
	}
}else{

}
?>
