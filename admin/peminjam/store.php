<?php
include "../../config/config.php";

    $id_peminjam	= $_POST['id_peminjam'];
    $nama 		    = $_POST['nama'];
    $username  	    = $_POST['username'];
    $password  	    = $_POST['password'];
    $jenis_kelamin	= $_POST['jenis_kelamin'];
    $email      	= $_POST['email'];
    $status         = $_POST['status'];
    $role           = "peminjam";

    //echo $id_peminjammi. " " . $nama ." ". $username. " ". $password. " ". $jenis_kelamin. " ". $email ." ". $status;

    $sql = "INSERT INTO pengguna(id_pengguna,nama,username,password,jenis_kelamin,email,status,role)
            VALUES('$id_peminjam','$nama','$username','$password','$jenis_kelamin','$email','$status','$role')";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse);

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=peminjam'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=peminjamCreate'</script>\n";
    }
?>