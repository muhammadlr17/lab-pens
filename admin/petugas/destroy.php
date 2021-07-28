<?php
if(isset($_GET['act'])) {
    $id_petugas = $_GET['id_petugas'];
    $sql = "delete from petugas where id_petugas='$id_petugas' ";
    
    $parsesql   = oci_parse($conn, $sql);
    $result     = oci_execute($parsesql) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Dihapus');
        document.location.href='index.php?page=petugas'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Dihapus');
        document.location.href='index.php?page=petugas'</script>\n";
    }
}
?>