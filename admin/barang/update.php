<?php
include "../../config/config.php";

    $kode_barang	= $_POST['kode_barang'];
    $nama_barang    = $_POST['nama_barang'];
    $kondisi  	    = $_POST['kondisi'];
    $jumlah_barang  = $_POST['jumlah_barang'];
    $kode_ruang 	= $_POST['kode_ruang'];
    $kode_jenis     = $_POST['kode_jenis'];
    $keterangan     = $_POST['keterangan'];

    //echo $kode_barangmi. " " . $nama_barang ." ". $kondisi. " ". $jumlah_barang. " ". $kode_ruang. " ". $kode_jenis ." ". $keterangan;

    $sql = "update barang set nama_barang='$nama_barang', kondisi='$kondisi', jumlah_barang='$jumlah_barang', kode_ruang='$kode_ruang', kode_jenis='$kode_jenis', keterangan='$keterangan' where kode_barang='$kode_barang'";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=barang'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=barangEdit'</script>\n";
    }
?>