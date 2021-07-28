<!-- Begin Page Content -->
<div class="container-fluid">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Tambah Ruang</h6>
                </div>
                <div class="card-body">
                    <form action="ruang/store.php" method="POST">
                        <div class="form-group" hidden>
                            <?php
                                function generateKode($length = 5) {
                                    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $charactersLength = strlen($characters);
                                    $randomString = '';
                                    for ($i = 0; $i < $length; $i++) {
                                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                                    }
                                    return $randomString;
                                }
                            ?>
                            <label class="form-label">Kode Ruang</label>
                            <input type="text" name="kode_ruang" class="form-control" value="<?php echo generateKode(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Ruang</label>
                            <input type="text" name="nama_ruang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                        <a href="index.php?page=ruang" class="btn btn-sm btn-secondary btn-icon-split">
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