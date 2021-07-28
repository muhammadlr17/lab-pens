<?php
include "../../config/config.php";

    $id_pengembalian= $_POST['id_pengembalian'];
    $id_peminjaman	= $_POST['id_peminjaman'];
    $id_pengguna    = $_POST['id_peminjam'];
    $kode_barang  	= $_POST['kode_barang'];
    $jumlah         = $_POST['jumlah'];
    $tanggal_kembali= $_POST['tanggal_kembali'];
    $id_petugas     = $_POST['id_petugas'];

    $sql = "INSERT INTO pengembalian(id_pengembalian,id_peminjaman,id_pengguna,kode_barang,jumlah,tanggal_kembali,id_petugas)
            VALUES('$id_pengembalian','$id_peminjaman','$id_pengguna','$kode_barang','$jumlah',DATE'$tanggal_kembali','$id_petugas')";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse) or oci_error();

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=pengembalian'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=peminjaman'</script>\n";
    }
?>