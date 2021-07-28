<?php
    if(isset($_GET['id_pengguna'])) {
        $id_pengguna = $_GET['id_pengguna'];

        $sql = "select * from pengguna where id_pengguna='$id_pengguna'";
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
                    <h6 class="m-0 font-weight-bold text-dark">Edit Peminjam</h6>
                </div>
                <div class="card-body">
                    <form action="peminjam/update.php" method="POST">
                        <div class="form-group" hidden>
                            <label class="form-label">ID Peminjam</label>
                            <input type="text" name="id_peminjam" class="form-control" value="<?=$baris ->ID_PENGGUNA;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?=$baris ->NAMA;?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="<?=$baris ->USERNAME;?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" value="<?=$baris ->PASSWORD;?>" required>
                        </div>
                        <label>Jenis Kelamin : </label>
                        <div class="form-group">
                                <?php 
                                    $l = ''; $p = '';
                                        if ($baris ->JENIS_KELAMIN == "L") {
                                            $l="checked";
                                        } else {
                                            $p="checked";
                                        }  
                                ?>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" id="optionsRadiosInline2" value="L" <?php echo $l ; ?>> Laki laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" id="optionsRadiosInline3" value="P" <?php echo $p ; ?>> Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?=$baris ->EMAIL;?>" required>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="pilih" selected disabled>- Pilih Status -</option>
                                    <?php 
                                    $d = ''; $m = '';
                                        if ($baris ->STATUS == "Dosen") {
                                            $d="selected";
                                        } else {
                                            $m="selected";
                                        }  
                                    ?>
                                <option <?php echo $d ; ?> value="Dosen">Dosen</option>
                                <option <?php echo $m ; ?> value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <a href="index.php?page=peminjam" class="btn btn-sm btn-secondary btn-icon-split">
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