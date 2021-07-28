<!-- Begin Page Content -->
<div class="container-fluid">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Tambah Barang</h6>
                </div>
                <div class="card-body">
                    <form action="barang/store.php" method="POST">
                        <div class="form-group" hidden>
                            <?php
                                function generateKode($length = 5) {
                                    $num = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $numLength = strlen($num);
                                    $result = '';
                                    for ($i = 0; $i < $length; $i++) {
                                        $result .= $num[rand(0, $numLength - 1)];
                                    }
                                    return $result;
                                }
                            ?>
                            <label class="form-label">Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" value="<?php echo generateKode(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" required>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Kondisi</label>
                            <select name="kondisi" class="form-control">
                                <option selected disabled>-- Pilih Kondisi --</option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jumlah Barang</label>
                            <input type="text" name="jumlah_barang" class="form-control" required>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Jenis</label>
                            <select name="kode_jenis" class="form-control">
                                <option selected disabled>-- Pilih Jenis --</option>
                                <?php
                                $query="SELECT * FROM jenis ORDER BY ROWID";
                                    /* cara oracle */
                                        $parsesql = oci_parse($conn, $query);
                                        oci_execute($parsesql);
                                        $no=1;
                                    // menampilkan data
                                    while($rows=oci_fetch_object($parsesql)){
                                ?>
                                    <option value="<?php echo $rows ->KODE_JENIS; ?>"><?php echo $rows ->NAMA_JENIS; ?></option>
                                <?php	
                                    $no++;
                                    }
                                    oci_free_statement($parsesql);
                                ?>
                            </select>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Ruang</label>
                            <select name="kode_ruang" class="form-control">
                                <option selected disabled>-- Pilih Ruang --</option>
                                <?php
                                $query="SELECT * FROM ruang ORDER BY ROWID";
                                    /* cara oracle */
                                        $parsesql = oci_parse($conn, $query);
                                        oci_execute($parsesql);
                                        $no=1;
                                    // menampilkan data
                                    while($rows=oci_fetch_object($parsesql)){
                                ?>
                                    <option value="<?php echo $rows ->KODE_RUANG; ?>"><?php echo $rows ->NAMA_RUANG; ?></option>
                                <?php	
                                    $no++;
                                    }
                                    oci_free_statement($parsesql);
                                    oci_close($conn);
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                        <a href="index.php?page=barang" class="btn btn-sm btn-secondary btn-icon-split">
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