<!-- Begin Page Content -->
<div class="container-fluid">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Tambah Jenis</h6>
                </div>
                <div class="card-body">
                    <form action="jenis/store.php" method="POST">
                        <div class="form-group" hidden>
                            <?php
                                function generateKode($length = 5) {
                                    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $charactersLength = strlen($characters);
                                    $result = '';
                                    for ($i = 0; $i < $length; $i++) {
                                        $result .= $characters[rand(0, $charactersLength - 1)];
                                    }
                                    return $result;
                                }
                            ?>
                            <label class="form-label">Kode Jenis</label>
                            <input type="text" name="kode_jenis" class="form-control" value="<?php echo generateKode(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Jenis</label>
                            <input type="text" name="nama_jenis" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" required>
                        </div>
                        <a href="index.php?page=jenis" class="btn btn-sm btn-secondary btn-icon-split">
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