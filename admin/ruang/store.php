<?php
include "../../config/config.php";

    $kode_ruang	= $_POST['kode_ruang'];
    $nama_ruang = $_POST['nama_ruang'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO ruang(kode_ruang,nama_ruang,keterangan)
            VALUES('$kode_ruang','$nama_ruang','$keterangan')";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse);

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=ruang'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=ruangCreate'</script>\n";
    }
?>