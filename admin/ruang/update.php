<?php
include "../../config/config.php";

    $kode_ruang	= $_POST['kode_ruang'];
    $nama_ruang = $_POST['nama_ruang'];
    $keterangan = $_POST['keterangan'];

    $sql = "update ruang set nama_ruang='$nama_ruang', keterangan='$keterangan' where kode_ruang='$kode_ruang'";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=ruang'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=ruangEdit'</script>\n";
    }
?>