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
$query = "SELECT max(nomer_order) as maxKode FROM orderan";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
$kodeOrder = $data['maxKode'];
$noUrut = (int) substr($kodeOrder, 3, 3);
$noUrut++;
$char = "LDR";
$kodeOrder = $char . sprintf("%03s", $noUrut);
      // TGL OTOMATIS
$tgloto = date("Y-m-d");
?>
<!-- Judul Halaman -->
<title>Form Cucian Masuk | SIM Laundry</title>
<!--breadcrumbs start-->
<body onload="buka_tab()">
  <div id="breadcrumbs-wrapper">
    <!-- Search for small screen -->
    <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
      <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
    </div>
    <div class="container">
      <div class="row">
        <div class="col s10 m6 l6">
          <h5 class="breadcrumbs-title">Form Cucian Masuk</h5>
          <ol class="breadcrumbs">
            <li><a href="home">Dashboard</a>
            </li>
            <li class="active">Form Cucian Masuk</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--breadcrumbs end-->
  <div class="container">
    <p <?php echo $showwarning;?> class="caption">Anda Tidak Diperbolehkan Mengakses Halaman Ini!</p>
    <div <?php echo $showwarning;?> class="divider"></div>
    <div <?php echo $showcontent;?> style="margin-left: 20px;" class="section">
      <div id="subtotal" class="gradient-45deg-light-blue-cyan gradient-shadow" style="float: right;width: 500px;height: 120px;margin-right: 80px;margin-top: 20px;color: #fff;font-size: 80px;"><center><div id="isisubtotal">Rp. XXX.XXX</div></center></div>
      <form action="crud/c_order.php" method="POST">
        <input hidden="" value="<?php echo $_SESSION['kode_ptg']; ?>" id="kode_petugas" name="kode_petugas" type="text">
        <table>
          <tr>
            <div class="input-field kecilkecil2">
              <!-- Tampil Kode Orderan Otomatis -->
              <div id="kode_order"></div>
            </div>
          </tr>
          <tr>
            <div class="input-field kecilkecil2">
              <input readonly="" value="<?php echo $tgloto; ?>" id="tanggal_order" name="tanggal_order" type="text">
              <label>Tanggal Masuk</label>
            </div>
          </tr>
          <tr>
            <td>
              <label>Status Pembeli</label>
              <div class="input-field">
                <select onchange="plgnn()" required="" id="status_pembeli" name="status_pembeli">
                  <option value="">== Pilih ==</option>
                  <option value="Pelanggan">Pelanggan</option>
                  <option value="Tidak Pelanggan">Tidak Pelanggan</option>
                </select>
              </div>
            </td>
            <td>
              <label hidden="" id="kodpel">Kode Pelanggan</label>              
              <div hidden="" id="pilpel" class="input-field">
                <!-- Modal Trigger -->
                <input type="button" style="float: right; margin-bottom: -30px;margin-left: -20px;" onclick="$('#modal2').modal('open');" class="btn btn-flat" value="...">
                <input hidden="" onkeyup="cari_plg()" value="" id="kode_pelanggan" name="kode_pelanggan" type="text">
                <!-- Modal Structure -->
                <div id="modal2" class="modal">
                  <div class="modal-content">
                    <h4>Pilih No. Order</h4>
                    <table class="centered">
                      <thead>
                        <tr>
                          <th>Kode Pelanggan</th>
                          <th>Nama Pelanggan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $qw=$db->get("pelanggan.kode_pelanggan,pelanggan.nama_pelanggan","pelanggan","WHERE kode_pelanggan like 'PLG%'");
                        foreach($qw as $tamp_plg){
                          ?>
                          <tr class="pilihdataplg modal-close" data-kodepelanggan="<?php echo $tamp_plg['kode_pelanggan'];?>">
                            <td><?php echo $tamp_plg['kode_pelanggan'];?></td>
                            <td><?php echo $tamp_plg['nama_pelanggan'];?></td></a>
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
              </div>
            </td>
            <td class="not-allowed">
              <label class="not-allowed" hidden="" id="nampel">Nama Pelanggan</label>
              <div class="input-field not-allowed">
                <input class="not-allowed" hidden="" readonly="" value="" id="nama_pelanggan" name="nama_pelanggan" type="text">
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>Kode Jasa</label>
              <div class="input-field">
                <!-- Modal Trigger -->
                <input type="button" style="float: right; margin-bottom: -30px;margin-left: -20px;" onclick="$('#modal3').modal('open');" class="btn btn-flat" value="...">
                <input style="float: left;" onkeyup="cari_jasa()" required="" value="" id="kode_jasa" name="kode_jasa" type="text">
                <!-- Modal Structure -->
                <div id="modal3" class="modal">
                  <div class="modal-content">
                    <h4>Pilih Kode Jasa</h4>
                    <table class="centered">
                      <thead>
                        <tr>
                          <th>Kode Jasa</th>
                          <th>Nama Jasa</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $qw=$db->get("jasa.kode_jasa,jasa.nama_jasa","jasa","");
                        foreach($qw as $tamp_jasa){
                          ?>
                          <tr class="pilihdatajasa modal-close" data-kodejasa="<?php echo $tamp_jasa['kode_jasa'];?>">
                            <td><?php echo $tamp_jasa['kode_jasa'];?></td>
                            <td><?php echo $tamp_jasa['nama_jasa'];?></td></a>
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
              </div>
            </td>
            <td class="not-allowed">
              <label class="not-allowed">Nama Jasa</label>              
              <div class="input-field not-allowed">
                <input class="not-allowed" readonly="" value="" id="nama_jasa" name="nama_jasa" type="text">
              </div>
            </td>
            <td class="not-allowed">
              <label class="not-allowed">Harga</label>
              <div class="input-field not-allowed">
                <input class="not-allowed" readonly="" value="" id="harga" name="harga" type="text">
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>Berat</label>
              <div class="input-field">
                <input onkeypress="return angka(event)" onkeyup="totalnya()" required="" id="berat_cucian" name="berat_cucian" type="text">
              </div>
            </td>
            <td class="not-allowed">     
              <label class="not-allowed">Total</label>             
              <div class="input-field not-allowed">
                <input class="not-allowed" readonly="" id="total_harga" name="total_harga" type="text">
              </div>
            </td>
            <td>
              <label>Status</label>
              <div class="input-field">
                <select required="" id="status_cucian" name="status_cucian">
                  <option value="">== Pilih ==</option>
                  <option value="Sudah Diambil">Sudah Diambil</option>
                  <option selected="" value="Belum Diambil">Belum Diambil</option>
                </select>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <label>Tanggal Selesai</label>
              <div class="input-field">
                <input required="" id="tgl_rencana_selesai" name="tgl_rencana_selesai" type="date">
              </div>
            </td>
            <td>                  
              <div class="input-field col s12">
                <input type="button" onclick="simpan_order()" style="margin-left: 30px;" class="btn waves-effect waves-light" value="Simpan" name="simpan">
              </div>
            </td>
            <td>

            </td>
          </tr>
        </table>
      </form>
      <p><div class="divider"></div></p>
      <!-- Tampil Data Orderan -->
      <div id="tamp_order"></div>
    </div>
  </div>
</body>