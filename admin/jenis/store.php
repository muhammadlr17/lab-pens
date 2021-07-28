<?php
include "../../config/config.php";

    $kode_jenis	= $_POST['kode_jenis'];
    $nama_jenis = $_POST['nama_jenis'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO jenis(kode_jenis,nama_jenis,keterangan)
            VALUES('$kode_jenis','$nama_jenis','$keterangan')";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse);

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=jenis'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=jenisCreate'</script>\n";
    }
?>