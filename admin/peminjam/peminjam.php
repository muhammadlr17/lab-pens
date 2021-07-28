<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Peminjam</h1>
        <a href="index.php?page=peminjamCreate" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i class="fas fa-plus fa-sm text-white-100"></i> Tambah Data</a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
        <h5 class="m-0 font-weight-bold text-grey">Data Peminjam</h5>
        </div>
        <div class="card-body py-3">
            <table  class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query="SELECT * FROM pengguna ORDER BY ROWID";

                        /* cara oracle */
                            $parsesql = oci_parse($conn, $query);
                            oci_execute($parsesql);
                            $no=1;
                        // menampilkan data
                        while($rows=oci_fetch_object($parsesql)){
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $rows ->NAMA; ?></td>
                        <td><?php echo $rows ->USERNAME;?></td>
                        <td>
                            <?php 
                                if($rows ->JENIS_KELAMIN == 'L'){
                                    echo 'Laki-laki';
                                }else{
                                    echo 'Perempuan';
                                }
                            ?>
                        </td>
                        <td><?php echo $rows ->EMAIL;?></td>
                        <td><?php echo $rows ->STATUS;?></td>
                        <td>
                            <a href="index.php?page=peminjamEdit&id_pengguna=<?= $rows ->ID_PENGGUNA;?>" class='text-dark'><i class="fa fa-fw fa-edit"></i></a>
                            <a href="index.php?page=peminjamDestroy&act=del&id_pengguna=<?=	$rows ->ID_PENGGUNA;?>"class='text-dark' onclick="
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
