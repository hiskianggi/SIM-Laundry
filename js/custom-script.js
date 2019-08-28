/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

function angka(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode < 48 || charCode > 57)&&charCode>32)
        return false;
    return true;
}
function huruf(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
        return false;
    return true;
}
function cari_jasa(){
    $.ajax({
        url: 'content/cari_jasa.php',
        type:"POST",
        dataType:"json",
        data:{
            kode_jasa:$("#kode_jasa").val()
        },
        success:function(hasil){
            $("#nama_jasa").val(hasil.nama_jasa);
            $("#harga").val(hasil.harga);
        }
    });
}
function cari_plg(){
    $.ajax({
        url: 'content/cari_plg.php',
        type:"POST",
        dataType:"json",
        data:{
            kode_pelanggan:$("#kode_pelanggan").val()
        },
        success:function(hasil){
            $("#nama_pelanggan").val(hasil.nama_pelanggan);
        }
    });
}
function cari_order(){
    $.ajax({
        url: 'content/cari_order.php',
        type:"POST",
        dataType:"json",
        data:{
            nomer_order:$("#nomer_order").val()
        },
        success:function(hasil){
            $("#nama_pelanggan").val(hasil.nama_pelanggan);
            $("#nama_jasa").val(hasil.nama_jasa);
            $("#harga_jasa").val(hasil.harga);
            $("#berat_cucian").val(hasil.berat_cucian);
            $("#total_harga").val(hasil.total_harga);
        }
    });
}
function plgnn(){
    plh=$("#status_pembeli").val();
    if(plh=="Pelanggan"){
        $("#kode_pelanggan").show();
        $("#nama_pelanggan").show();
        $("#kodpel").show();
        $("#nampel").show();
        $("#pilpel").show();
    }else{
        document.getElementById('kode_pelanggan').value="";
        document.getElementById('nama_pelanggan').value="";
        $("#kode_pelanggan").hide();
        $("#nama_pelanggan").hide();
        $("#kodpel").hide();
        $("#nampel").hide();
        $("#pilpel").hide();
    }
}
function totalnya(){
    ttot3=$("#berat_cucian").val();
    ddsk3=$("#harga").val();
    hhsl3=ttot3*ddsk3;
    document.getElementById('total_harga').value=hhsl3;
    document.getElementById('isisubtotal').innerHTML="Rp. "+hhsl3;
}
function kembalian(){
    bayar=$("#bayar").val();
    total=$("#total_harga").val();
    hhsl3=bayar-total;
    document.getElementById('kembali').value=hhsl3;
    document.getElementById('isikembalian').innerHTML="Rp. "+hhsl3;
}
function buka_tab(){
     $("#tamp_order").load("content/tamp_order.php");
     $("#kode_order").load("content/kode_order.php");
}
function simpan_order(){
    $.ajax({
        url: "crud/c_order.php",
        type:"POST",
        data:{
            nomer_order:$("#nomer_order").val(),
            tanggal_order:$("#tanggal_order").val(),
            tgl_rencana_selesai:$("#tgl_rencana_selesai").val(),
            berat_cucian:$("#berat_cucian").val(),
            total_harga:$("#total_harga").val(),
            status_cucian:$("#status_cucian").val(),
            kode_pelanggan:$("#kode_pelanggan").val(),
            kode_petugas:$("#kode_petugas").val(),
            kode_jasa:$("#kode_jasa").val()
        },
        success:function(hasil){
            var nomer_order=$("#nomer_order").val();
            if (hasil=="") {
                window.open('struk/'+nomer_order);
            }else{  
                alert(hasil);
            }
            buka_tab();
        }
    });
}
function hapus_order(){
    $.ajax({
        url: "crud/d_order.php",
        type:"POST",
        data:{
            nomer_order:$("#no-hide").val()
        },
        success:function(hasil){
            alert(hasil);
            buka_tab();
        }
    });
}
$(document).ready(function() {
    $('#modal1').modal();
    $('#modal2').modal();
    $('#modal3').modal();
    $('#modal4').modal();
});
$(document).on('click', '.pilihdataorder', function (e) {
    document.getElementById("nomer_order").value = $(this).attr('data-kodeorder');
    cari_order();
});
$(document).on('click', '.pilihdataplg', function (e) {
    document.getElementById("kode_pelanggan").value = $(this).attr('data-kodepelanggan');
    cari_plg();
});
$(document).on('click', '.pilihdatajasa', function (e) {
    document.getElementById("kode_jasa").value = $(this).attr('data-kodejasa');
    cari_jasa();
});
$("#show_password").hover(
  function functionName() {
    //Change the attribute to text
    $("#password_ptg").attr("type", "text");
    $(".glyphicon")
    .removeClass("glyphicon-eye-open")
    .addClass("glyphicon-eye-close");
},
function() {
    //Change the attribute back to password
    $("#password_ptg").attr("type", "password");
    $(".glyphicon")
    .removeClass("glyphicon-eye-close")
    .addClass("glyphicon-eye-open");
}
);
