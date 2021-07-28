<?php
    if(isset($_GET['kode_barang'])) {
        $kode_barang = $_GET['kode_barang'];

        $sql = "select * from barang where kode_barang='$kode_barang'";
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
                    <h6 class="m-0 font-weight-bold text-dark">Edit Barang</h6>
                </div>
                <div class="card-body">
                    <form action="barang/update.php" method="POST">
                        <div class="form-group" hidden>
                            <label class="form-label">Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" value="<?=$baris ->KODE_BARANG;?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="<?=$baris ->NAMA_BARANG;?>" required>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Kondisi</label>
                            <select name="kondisi" class="form-control">
                                <option selected disabled>-- Pilih Kondisi --</option>
                                <?php 
                                    $a = ''; $b = ''; $c = '';
                                        if ($baris ->KONDISI == "Baik") {
                                            $a="selected";
                                        }else if ($baris ->KONDISI == "Rusak Ringan") {
                                            $b="selected";
                                        } else {
                                            $c="selected";
                                        }  
                                ?>
                                <option <?php echo $a; ?> value="Baik">Baik</option>
                                <option <?php echo $b; ?> value="Rusak Ringan">Rusak Ringan</option>
                                <option <?php echo $c; ?> value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jumlah Barang</label>
                            <input type="text" name="jumlah_barang" class="form-control" value="<?=$baris ->JUMLAH_BARANG;?>" required>
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
                                    
                                        if ($rows->KODE_JENIS == $baris->KODE_JENIS) {
                                            $jenis = 'selected';
                                        }else{
                                            $jenis = '';
                                        }
                                ?>
                                    <option <?php echo $jenis; ?> value="<?php echo $rows ->KODE_JENIS; ?>"><?php echo $rows ->NAMA_JENIS; ?></option>
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
                                        
                                        if ($rows->KODE_RUANG == $baris->KODE_RUANG) {
                                            $ruang = 'selected';
                                        }else{
                                            $ruang = '';
                                        }
                                ?>
                                    <option  <?php echo $ruang; ?> value="<?php echo $rows ->KODE_RUANG; ?>"><?php echo $rows ->NAMA_RUANG; ?></option>
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
                            <input type="text" name="keterangan" class="form-control" value="<?php echo $baris->KETERANGAN; ?>" required>
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