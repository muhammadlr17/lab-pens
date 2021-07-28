<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Pengembalian</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
        <h5 class="m-0 font-weight-bold text-grey">Data Pengembalian</h5>
        </div>
        <div class="card-body py-3">
            <table  class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Pengembalian</th>
                        <th>ID Peminjaman</th>
                        <th>ID Peminjam</th>
                        <th>Kode Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Kembali</th>
                        <th>ID Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query="SELECT * FROM pengembalian ORDER BY ROWID";

                        /* cara oracle */
                            $parsesql = oci_parse($conn, $query);
                            oci_execute($parsesql);
                            $no=1;
                        // menampilkan data
                        while($rows=oci_fetch_object($parsesql)){
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $rows ->ID_PENGEMBALIAN; ?></td>
                        <td><?php echo $rows ->ID_PEMINJAMAN; ?></td>
                        <td><?php echo $rows ->ID_PENGGUNA; ?></td>
                        <td><?php echo $rows ->KODE_BARANG; ?></td>
                        <td><?php echo $rows ->JUMLAH; ?></td>
                        <td><?php echo $rows ->TANGGAL_KEMBALI; ?></td>
                        <td><?php echo $rows ->ID_PETUGAS;?></td>
                    </tr>
                    <?php	
                        $no++;
                        }
                        oci_free_statement($parsesql);
                        oci_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
