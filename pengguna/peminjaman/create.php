<!-- Begin Page Content -->
<div class="container-fluid">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Tambah Peminjaman</h6>
                </div>
                <div class="card-body">
                    <form action="peminjaman/store.php" method="POST">
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
                            <label class="form-label">ID Peminjaman</label>
                            <input type="text" name="id_peminjaman" class="form-control" value="<?php echo generateKode(); ?>" required>
                        </div>
                        <?php
                            $sql = oci_parse($conn,"SELECT * from pengguna where username = '$_SESSION[pengguna]'");
                            oci_execute($sql);
                            $pg = oci_fetch_assoc($sql);
                        ?>
                        <div class="form-group">
                            <label class="form-label">ID Peminjam</label>
                            <input type="text" name="id_pengguna" class="form-control" value="<?php echo $pg['ID_PENGGUNA']; ?>" readonly>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Barang</label>
                            <select name="kode_barang" class="form-control">
                                <option selected disabled>-- Pilih Barang --</option>
                                <?php
                                $query="SELECT * FROM barang ORDER BY ROWID";
                                    /* cara oracle */
                                        $parsesql = oci_parse($conn, $query);
                                        oci_execute($parsesql);
                                        $no=1;
                                    // menampilkan data
                                    while($rows=oci_fetch_object($parsesql)){
                                ?>
                                    <option value="<?php echo $rows ->KODE_BARANG; ?>"><?php echo $rows ->NAMA_BARANG; ?></option>
                                <?php	
                                    $no++;
                                    }
                                    oci_free_statement($parsesql);
                                    oci_close($conn);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jumlah Meminjam</label>
                            <input type="text" name="jumlah" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control" required>
                        </div>
                        <div class="form-group" hidden>
                            <label class="form-label">Status</label>
                            <input type="text" name="status" class="form-control" value="Terpinjam" required>
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