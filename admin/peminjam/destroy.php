<?php
if(isset($_GET['act'])) {
    $id_pengguna = $_GET['id_pengguna'];
    $sql = "delete from pengguna where id_pengguna='$id_pengguna' ";
    
    $parsesql   = oci_parse($conn, $sql);
    $result     = oci_execute($parsesql) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Dihapus');
        document.location.href='index.php?page=peminjam'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Dihapus');
        document.location.href='index.php?page=peminjam'</script>\n";
    }
}
?>