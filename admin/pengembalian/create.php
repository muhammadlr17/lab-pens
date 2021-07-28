<?php
    if(isset($_GET['id_peminjaman'])) {
        $id_peminjaman = $_GET['id_peminjaman'];

        $sql = "select * from peminjaman where id_peminjaman='$id_peminjaman'";
        $sqlparse=oci_parse($conn, $sql);
        oci_execute($sqlparse) or die(oci_error());
        $baris = oci_fetch_object($sqlparse);
    }
?>
<!-- Begin Page Content -->
<div class="container-fluid">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Kembalikan Barang</h6>
                </div>
                <div class="card-body">
                    <form action="pengembalian/store.php" method="POST">
                        <div class="form-group" hidden>
                            <?php
                                function generateKode($length = 5) {
                                    $num = '0123456789';
                                    $numLength = strlen($num);
                                    $result = '';
                                    for ($i = 0; $i < $length; $i++) {
                                        $result .= $num[rand(0, $numLength - 1)];
                                    }
                                    return $result;
                                }
                            ?>
                            <label class="form-label">ID Pengembalian</label>
                            <input type="text" name="id_pengembalian" class="form-control" value="<?php echo generateKode(); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">ID Transaksi</label>
                            <input type="text" name="id_peminjaman" class="form-control" value="<?=$baris ->ID_PEMINJAMAN;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">ID Peminjam</label>
                            <input type="text" name="id_peminjam" class="form-control" value="<?=$baris ->ID_PENGGUNA;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" value="<?=$baris ->KODE_BARANG;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jumlah Barang</label>
                            <input type="text" name="jumlah" class="form-control" value="<?=$baris ->JUMLAH;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
                        </div>
                        <div class="form-group">
                        <?php
                            include"../config/config.php";
                            $sql = oci_parse($conn,"SELECT * from petugas where username = '$_SESSION[admin]'");
                            oci_execute($sql);
                            $ptg = oci_fetch_assoc($sql);
                        ?>
                            <label class="form-label">ID Petugas</label>
                            <input type="text" name="id_petugas" class="form-control" value="<?php echo $ptg['ID_PETUGAS']; ?>" readonly>
                        </div>
                        <a href="index.php?page=peminjaman" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <button type="Submit" class="btn btn-sm btn-primary m-t-15 waves-effect">Submit</button>
                    </form>
                </div>
            </div>

        </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->