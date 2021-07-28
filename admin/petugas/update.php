<?php
include "../../config/config.php";

    $id_petugas	    = $_POST['id_petugas'];
    $nama 		    = $_POST['nama'];
    $username  	    = $_POST['username'];
    $password  	    = $_POST['password'];
    $jenis_kelamin	= $_POST['jenis_kelamin'];
    $email      	= $_POST['email'];

    //echo $id_petugasmi. " " . $nama ." ". $username. " ". $password. " ". $jenis_kelamin. " ". $email ." ". $status;

    $sql = "update petugas set nama='$nama', username='$username', password='$password', jenis_kelamin='$jenis_kelamin', email='$email' where id_petugas='$id_petugas'";

    $sqlparse   = oci_parse($conn,$sql);
    $result     = oci_execute($sqlparse) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Disimpan');
        document.location.href='../index.php?page=petugas'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Disimpan');
        document.location.href='../index.php?page=petugasEdit'</script>\n";
    }
?>