<?php
if(isset($_GET['act'])) {
    $kode_ruang = $_GET['kode_ruang'];
    $sql = "delete from ruang where kode_ruang='$kode_ruang' ";
    
    $parsesql   = oci_parse($conn, $sql);
    $result     = oci_execute($parsesql) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Dihapus');
        document.location.href='index.php?page=ruang'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Dihapus');
        document.location.href='index.php?page=ruang'</script>\n";
    }
}
?>