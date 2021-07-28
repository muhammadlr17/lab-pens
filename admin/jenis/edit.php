<?php
    if(isset($_GET['kode_jenis'])) {
        $kode_jenis = $_GET['kode_jenis'];

        $sql = "select * from jenis where kode_jenis='$kode_jenis'";
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
                    <h6 class="m-0 font-weight-bold text-dark">Tambah jenis</h6>
                </div>
                <div class="card-body">
                    <form action="jenis/update.php" method="POST">
                        <div class="form-group" hidden>
                            <label class="form-label">Kode jenis</label>
                            <input type="text" name="kode_jenis" class="form-control" value="<?=$baris ->KODE_JENIS;?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama jenis</label>
                            <input type="text" name="nama_jenis" class="form-control" value="<?=$baris ->NAMA_JENIS;?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" value="<?=$baris ->KETERANGAN;?>" required>
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