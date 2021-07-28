<?php
include "../../config/config.php";

    $id_peminjaman	= $_POST['id_peminjaman'];
    $id_pengguna    = $_POST['id_pengguna'];
    $kode_barang  	= $_POST['kode_barang'];
    $jumlah         = $_POST['jumlah'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali= $_POST['tanggal_kembali'];
    $status         = $_POST['status'];

    //echo $id_peminjaman. " " . $id_pengguna ." ". $kode_barang. " ". $jumlah. " ". $tanggal_pinjam. " ". $tanggal_kembali ." ". $status;

    $sql = "INSERT INTO peminjaman(id_peminjaman,id_pengguna,kode_barang,jumlah,tanggal_pinjam,tanggal_kembali,status_peminjaman)
            VALUES('$id_peminjaman','$id_pengguna','$kode_barang','$jumlah',DATE'$tanggal_pinjam',DATE'$tanggal_kembali','$status')";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse);

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=peminjaman'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=peminjamanCreate'</script>\n";
    }
?>