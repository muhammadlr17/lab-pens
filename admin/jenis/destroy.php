<?php
if(isset($_GET['act'])) {
    $kode_jenis = $_GET['kode_jenis'];
    $sql = "delete from jenis where kode_jenis='$kode_jenis' ";
    
    $parsesql   = oci_parse($conn, $sql);
    $result     = oci_execute($parsesql) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Dihapus');
        document.location.href='index.php?page=jenis'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Dihapus');
        document.location.href='index.php?page=jenis'</script>\n";
    }
}
?>