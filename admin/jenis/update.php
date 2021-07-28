<?php
include "../../config/config.php";

    $kode_jenis	= $_POST['kode_jenis'];
    $nama_jenis = $_POST['nama_jenis'];
    $keterangan = $_POST['keterangan'];

    $sql = "update jenis set nama_jenis='$nama_jenis', keterangan='$keterangan' where kode_jenis='$kode_jenis'";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=jenis'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=jenisEdit'</script>\n";
    }
?>