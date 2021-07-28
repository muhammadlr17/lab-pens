<?php
include "../../config/config.php";

    $id_petugas	    = $_POST['id_petugas'];
    $nama 		    = $_POST['nama'];
    $username  	    = $_POST['username'];
    $password  	    = $_POST['password'];
    $jenis_kelamin	= $_POST['jenis_kelamin'];
    $email      	= $_POST['email'];
    $role           = "admin";

    $sql = "INSERT INTO petugas(id_petugas,nama,username,password,jenis_kelamin,email,role)
            VALUES('$id_petugas','$nama','$username','$password','$jenis_kelamin','$email','$role')";
        
    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse);

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=petugas'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=petugasCreate'</script>\n";
    }
?>