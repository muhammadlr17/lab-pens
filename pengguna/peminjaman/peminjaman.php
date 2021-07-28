<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Peminjaman</h1>
        <a href="index.php?page=peminjamanCreate" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i class="fas fa-plus fa-sm text-white-100"></i> Tambah Data</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
        <h5 class="m-0 font-weight-bold text-grey">Data Peminjaman</h5>
        </div>
        <div class="card-body py-3">
            <table  class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID Peminjaman</th>
                        <th>ID Peminjam</th>
                        <th>Kode Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tenggat</th>
                        <th>Status Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query="SELECT * FROM peminjaman WHERE id_pengguna = '$pg[ID_PENGGUNA]' ORDER BY status_peminjaman DESC";

                        /* cara oracle */
                            $parsesql = oci_parse($conn, $query);
                            oci_execute($parsesql);
                            $no=1;
                        // menampilkan data
                        while($rows=oci_fetch_object($parsesql)){
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $rows ->ID_PEMINJAMAN; ?></td>
                        <td><?php echo $rows ->ID_PENGGUNA; ?></td>
                        <td><?php echo $rows ->KODE_BARANG; ?></td>
                        <td><?php echo $rows ->JUMLAH; ?></td>
                        <td><?php echo $rows ->TANGGAL_PINJAM; ?></td>
                        <td><?php echo $rows ->TANGGAL_KEMBALI; ?></td>
                        <?php
                                if($rows->STATUS_PEMINJAMAN == 'Selesai'){
                                    echo '<td class="text-success">'.$rows ->STATUS_PEMINJAMAN.'</td>';
                                }else{
                                    echo '<td class="text-warning">'.$rows ->STATUS_PEMINJAMAN.'</td>';
                                }
                            ?>
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
