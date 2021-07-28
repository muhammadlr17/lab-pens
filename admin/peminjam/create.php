<!-- Begin Page Content -->
<div class="container-fluid">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Tambah Peminjam</h6>
                </div>
                <div class="card-body">
                    <form action="peminjam/store.php" method="POST">
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
                            <label class="form-label">ID Peminjam</label>
                            <input type="text" name="id_peminjam" class="form-control" value="<?php echo generateKode(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <label>Jenis Kelamin : </label>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" id="optionsRadiosInline2" value="L"> Laki laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jenis_kelamin" id="optionsRadiosInline3" value="P"> Perempuan
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option selected disabled>-- Pilih Status --</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Mahasiswa">Mahasiswa</option>
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