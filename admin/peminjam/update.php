<?php
include "../../config/config.php";

    $id_peminjam	= $_POST['id_peminjam'];
    $nama 		    = $_POST['nama'];
    $username  	    = $_POST['username'];
    $password  	    = $_POST['password'];
    $jenis_kelamin	= $_POST['jenis_kelamin'];
    $email      	= $_POST['email'];
    $status         = $_POST['status'];

    //echo $id_peminjammi. " " . $nama ." ". $username. " ". $password. " ". $jenis_kelamin. " ". $email ." ". $status;

    $sql = "update pengguna set nama='$nama', username='$username', password='$password', jenis_kelamin='$jenis_kelamin', email='$email', status='$status' where id_pengguna='$id_peminjam'";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=peminjam'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=peminjamEdit'</script>\n";
    }
?>