<?php 
session_start();
if (!isset($_SESSION['nama_ptg']) && $_SESSION['status']=="Manager"){
	header("location:../../login/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Struk Orderan - <?php echo $_GET['nomer_order'];?></title>
	<style type="text/css">
	@font-face{
		font-family:Tahoma;
		src: url(‘http://localhost/laundry/fonts/Tahoma.TTF’);
	}
	.kotak-struk .custom_font{
		font-family:Tahoma;
	}
	.kotak-struk{
		float: left;
		width: 380px;
		height: auto;
	}
	.kotak-struk .head p{
		text-align: center;
	}
	.kotak-struk .head .logo{
		font-weight: bold;
	}
	.kotak-struk .head .logo, .almt, .notelp{
		font-family: 'Tahoma';
		line-height: 15px;
	}
	.kotak-struk .table1{
		margin: 0px 30px;
	}
	.kotak-struk .table1 tr td{
		font-family: 'Tahoma';
		line-height: 25px;
	}
	.kotak-struk .table2{
		margin: 0px 30px;
	}
	.kotak-struk .table2 tr td{
		font-family: 'Tahoma';
		line-height: 25px;
		text-align: center;
	}
	.kotak-struk .table2 tr th{
		font-family: 'Tahoma';
		line-height: 25px;
		text-align: center;
	}
	.kotak-struk .table4{
		float: right;
		margin: 0px 30px;
	}
	.kotak-struk .table4 tr td{
		text-align: right;
	}
	.kotak-struk .foot{
		float: left;
		text-align: center;
		line-height: 10px;
		margin: 0px 40px ;
		margin-top: 10px;
		font-family: 'Tahoma';
		line-height: 10px;
	}
</style>
</head>
<body>
	<div class="kotak-struk custom_font">
		<div class="head">
			<p class="logo">HISKIA LAUNDRY</p>
			<p class="almt">Jln. Bandungharjo RT.03/RW.05</p>
			<p class="notelp">085778608350</p>
		</div>
		<div class="isi">
			<table class="table1">
				<?php
				include '../sistem/proses.php';
				$qwe1=$db->get("orderan.tanggal_order,orderan.tgl_rencana_selesai,orderan.nomer_order,petugas.nama_ptg,petugas.status","orderan","INNER JOIN petugas on petugas.kode_ptg=orderan.kode_petugas WHERE orderan.nomer_order='$_GET[nomer_order]'");
				$tmp1=$qwe1->fetch();
				$qwe2=$db->get("pelanggan.nama_pelanggan","orderan","INNER JOIN pelanggan on pelanggan.kode_pelanggan=orderan.kode_pelanggan WHERE orderan.nomer_order='$_GET[nomer_order]'");
				$tmp2=$qwe2->fetch();
				if ($tmp2['nama_pelanggan']=="") {
					$plg="(...Tidak Pelanggan...)";
				}else{
					$plg=$tmp2['nama_pelanggan'];
				}
				?>
				<tr>
					<td>Tanggal Order</td>
					<td>:</td>
					<td><?php echo $tmp1['tanggal_order'];?></td>
				</tr>
				<tr>
					<td>No. Order</td>
					<td>:</td>
					<td><?php echo $tmp1['nomer_order'];?></td>
				</tr>
				<tr>
					<td>Operator</td>
					<td>:</td>
					<td><?php echo $tmp1['nama_ptg'];?> (<?php echo $tmp1['status']?>)</td>
				</tr>
				<tr>
					<td>Pelanggan</td>
					<td>:</td>
					<td><?php echo $plg;?></td>
				</tr>
				<tr>
					<td>Tanggal Selesai</td>
					<td>:</td>
					<td><?php echo $tmp1['tgl_rencana_selesai'];?></td>
				</tr>
				<tr>
					<td colspan="4">
						===========================
					</td>
				</tr>
			</table>
			<table class="table2">
				<tr>
					<th>Nama Jasa</th>
					<th>Harga</th>
					<th>Berat (Kg)</th>
				</tr>
				<?php
				$qw3=$db->get("jasa.nama_jasa,jasa.harga,orderan.berat_cucian,orderan.total_harga","orderan","INNER JOIN jasa on orderan.kode_jasa=jasa.kode_jasa WHERE orderan.nomer_order='$_GET[nomer_order]'");
				foreach($qw3 as $tamp_orderan){
					?>
					<tr>
						<td><?php echo $tamp_orderan['nama_jasa'];?></td>
						<td><?php echo "Rp. ". number_format($tamp_orderan['harga'], 2, ",", ".");?></td>
						<td><?php echo $tamp_orderan['berat_cucian'];?></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan="4">
						===========================
					</td>
				</tr>
			</table>
			<table class="table4">
				<tr style="font-size: 20px;">
					<td>Total</td>
					<td>:</td>
					<td><b><?php echo "Rp. ". number_format($tamp_orderan['total_harga'], 2, ",", ".");?></b></td>
				</tr>
			</table>
			<div class="foot">
				<p>--- Terimakasih ---</p>
				<p>Semoga Anda Puas Dengan Layanan Kami</p>
				<p style="font-size: 13px;"><i>"Harap Bawa Struk Ini Untuk Mengambil Cucian"</i></p>
				<p>------------------------------------</p>
				<p>== HISKIA LAUNDRY ===</p>
			</div>
		</div>
	</div>
	<audio src="sukses.mp3" autoplay="autoplay" hidden="hidden"></audio>
</body>
</html>
<script type="text/javascript">window.print()</script>