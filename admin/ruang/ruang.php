<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Ruang</h1>
        <a href="index.php?page=ruangCreate" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i class="fas fa-plus fa-sm text-white-100"></i> Tambah Data</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
        <h5 class="m-0 font-weight-bold text-grey">Data Ruang Lab</h5>
        </div>
        <div class="card-body py-3">
            <table  class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Ruang</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query="SELECT * FROM ruang ORDER BY ROWID";

                        /* cara oracle */
                            $parsesql = oci_parse($conn, $query);
                            oci_execute($parsesql);
                            $no=1;
                        // menampilkan data
                        while($rows=oci_fetch_object($parsesql)){
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $rows ->KODE_RUANG; ?></td>
                        <td><?php echo $rows ->NAMA_RUANG; ?></td>
                        <td><?php echo $rows ->KETERANGAN;?></td>
                        <td>
                            <a href="index.php?page=ruangEdit&kode_ruang=<?= $rows ->KODE_RUANG;?>" class='text-dark'><i class="fa fa-fw fa-edit"></i></a>
                            <a href="index.php?page=ruangDestroy&act=del&kode_ruang=<?=	$rows ->KODE_RUANG;?>"class='text-dark' onclick="
                            return confirm('Yakin akan dihapus?') ";><i class="fa fa-fw fa-trash"></i></a>
                        </td>
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
