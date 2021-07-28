<?php
if(isset($_GET['act'])) {
    $kode_barang = $_GET['kode_barang'];
    $sql = "delete from barang where kode_barang='$kode_barang' ";
    
    $parsesql   = oci_parse($conn, $sql);
    $result     = oci_execute($parsesql) or die(oci_error());

    if($result) {
        echo "<script>alert('Data Berhasil Dihapus');
        document.location.href='index.php?page=barang'</script>\n";
    } else {
        echo "<script>alert('Data Gagal Dihapus');
        document.location.href='index.php?page=barang'</script>\n";
    }
}
?>