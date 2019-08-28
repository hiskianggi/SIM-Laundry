<?php
include "sistem/proses.php";
if ($_SESSION['status']=="Admin" || $_SESSION['status']=="Kasir") {
  $showcontent="";
  $showwarning="hidden";
}else{
  $showcontent="hidden";
  $showwarning="";
}
error_reporting(0);
$Host = "localhost";
$username = "root";
$password = "";
$database = "db_laundry";
$koneksi = new mysqli( $Host, $username, $password, $database );
$query = "SELECT max(no_transaksi) as maxKode FROM transaksi";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodeTransaksi = $data['maxKode'];
$noUrut = (int) substr($kodeTransaksi, 3, 3);
$noUrut++;
$char = "TRN";
$kodeTransaksi = $char . sprintf("%03s", $noUrut);
      // TGL OTOMATIS
$tgloto = date("Y-m-d");
?>
<!-- Judul Halaman -->
<title>Transaksi | SIM Laundry</title>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
  <!-- Search for small screen -->
  <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
   <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
 </div>
 <div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title">Transaksi</h5>
      <ol class="breadcrumbs">
        <li><a href="home">Dashboard</a>
        </li>
        <li class="active">Transaksi</li>
      </ol>
    </div>
  </div>
</div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="container">
  <div class="section">
    <form action="crud/c_transaksi.php" method="POST">
      <input hidden="" value="<?php echo $_SESSION['kode_ptg']; ?>" id="kode_ptg" name="kode_ptg" type="text">
      <table>
        <tr class="not-allowed">
          <td class="not-allowed">
            <div class="input-field not-allowed">
              <input class="not-allowed" readonly="" value="<?php echo $kodeTransaksi; ?>" id="no_transaksi" name="no_transaksi" type="text">
              <label>No. Trans</label>
            </div>
          </td>
          <td class="not-allowed">
            <div class="input-field">
              <input class="not-allowed" readonly="" value="<?php echo $tgloto; ?>" id="tgl_trans" name="tgl_trans" type="text">
              <label class="not-allowed">Tanggal Transaksi</label>
            </div>
          </td>
        </tr>
      </table>
      <div class="divider"></div>
      <table>
        <tr>
          <td>
            <label>No. Order</label>
            <div class="input-field">
              <input onkeyup="cari_order()" required="" id="nomer_order" name="nomer_order" type="text">   
            </div>
          </td>
          <td>
            <!-- Modal Trigger -->
            <input type="button" onclick="$('#modal1').modal('open');" value="..." class="btn btn-flat">
            <!-- Modal Structure -->
            <div id="modal1" class="modal">
              <div class="modal-content">
                <h4>Pilih No. Order</h4>
                <table class="centered" <?php echo $tbhidden;?>>
                  <thead>
                    <tr>
                      <th>Nomor Order</th>
                      <th>Nama Pelanggan</th>
                      <th>Nama Jasa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $qw=$db->get("orderan.nomer_order,jasa.nama_jasa,pelanggan.nama_pelanggan","orderan","INNER JOIN jasa ON orderan.kode_jasa=jasa.kode_jasa INNER JOIN pelanggan ON orderan.kode_pelanggan=pelanggan.kode_pelanggan WHERE orderan.status_cucian='Belum Diambil' ORDER BY orderan.nomer_order ASC");
                    foreach($qw as $tamp_od){
                      ?>
                      <tr class="pilihdataorder modal-close" data-kodeorder="<?php echo $tamp_od['nomer_order'];?>">
                        <td><?php echo $tamp_od['nomer_order'];?></td>
                        <td><?php echo $tamp_od['nama_pelanggan'];?></td>
                        <td><?php echo $tamp_od['nama_jasa'];?></td></a>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
              </div>
            </div>
          </td>
          <td class="not-allowed">
            <label class="not-allowed">Nama Pelanggan</label>
            <div class="input-field not-allowed">
              <input class="not-allowed" readonly="" id="nama_pelanggan" name="nama_pelanggan" type="text">
            </div>
          </td>
          <td class="not-allowed">
            <label class="not-allowed">Nama Jasa</label>
            <div class="input-field not-allowed">
              <input class="not-allowed" readonly="" id="nama_jasa" name="nama_jasa" type="text">
            </div>
          </td>
          <td class="not-allowed">
            <label class="not-allowed">Harga Jasa</label>
            <div class="input-field not-allowed">
              <input class="not-allowed" readonly="" id="harga_jasa" name="harga_jasa" type="text">
            </div>
          </td>
          <td class="not-allowed">
            <label class="not-allowed">Berat</label>
            <div class="input-field not-allowed">
              <input class="not-allowed" readonly="" id="berat_cucian" name="berat_cucian" type="text">
            </div>
          </td>
          <td class="not-allowed">
            <label class="not-allowed">Total</label>
            <div class="input-field not-allowed">
              <input class="not-allowed" readonly="" id="total_harga" name="total_harga" type="text">
            </div>
          </td>
        </tr>
      </table>
      <div class="divider"></div>
      <table>
        <tr>
          <td>
            <label>Bayar</label>
            <div class="input-field">
              <input onkeyup="kembalian()" required="" id="bayar" name="bayar" type="text">
            </div>
          </td>
          <td class="not-allowed">
            <label class="not-allowed">Kembali</label>
            <div class="input-field not-allowed">
              <input class="not-allowed" readonly="" id="kembali" name="kembali" type="text">
            </div>
          </td>
          <td>
            <label>Status</label>
            <div class="input-field">
              <select required="" id="status_cucian" name="status_cucian">
                <option value="">== Pilih ==</option>
                <option selected="" value="Sudah Diambil">Sudah Diambil</option>
                <option value="Belum Diambil">Belum Diambil</option>
              </select>
            </div>
          </td>
          <td>
            <div id="kembalian" class="gradient-45deg-light-blue-cyan gradient-shadow" style="float: right;width: 500px;height: 120px;color: #fff;font-size: 80px;"><center><div id="isikembalian">Rp. XXX.XXX</div></center></div>
          </td>
        </tr>
      </table>
      <div class="divider"></div>
      <table>
        <tr>
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light right" type="submit">Simpan
              <i class="material-icons right">send</i>
            </button>
          </div>
        </tr>
      </table>
    </form>
  </div>
  <div class="divider"></div>
</div>