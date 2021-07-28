<?php
	session_start();
	include"../config/config.php";
	if (!isset($_SESSION['admin'])) {
		echo '<script language="javascript">alert("Anda harus login terlebih dahulu");document.location="../index.php";</script>';
		}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LAB-PENS</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-3">LAB-PENS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#lab"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-warehouse"></i>
                    <span>Lab</span>
                </a>
                <div id="lab" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Laboratorium :</h6>
                        <a class="collapse-item" href="index.php?page=ruang">Ruang</a>
                        <a class="collapse-item" href="index.php?page=jenis">Jenis</a>
                        <a class="collapse-item" href="index.php?page=barang">Barang</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user" aria-expanded="false" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span>
                </a>
                <div id="user" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data User :</h6>
                        <a class="collapse-item" href="index.php?page=petugas">Data Petugas</a>
                        <a class="collapse-item" href="index.php?page=peminjam">Data Peminjam</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#peminjaman" aria-expanded="false" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-hands-helping"></i>
                    <span>Transaksi</span>
                </a>
                <div id="peminjaman" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar" style="">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Transaksi :</h6>
                        <a class="collapse-item" href="index.php?page=peminjaman">Peminjaman</a>
                        <a class="collapse-item" href="index.php?page=pengembalian">Pengembalian</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                include"../config/config.php";
                                $sql = oci_parse($conn,"SELECT * from petugas where username = '$_SESSION[admin]'");
                                oci_execute($sql);
                                $ptg = oci_fetch_assoc($sql);
                                ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $ptg['NAMA']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


            <!-- Footer -->
            <?php 
              include('../config/config.php');
              if(isset($_GET['page'])){
                  $page = $_GET['page'];

                  switch ($page) {
                    case 'home':
                        include "home.php";
                        break;
                    //ruang
                    case 'ruang':
                        include "ruang/ruang.php";
                        break;
                    case 'ruangCreate':
                        include "ruang/create.php";
                        break;		
                    case 'ruangEdit':
                        include "ruang/edit.php";
                        break;		
                    case 'ruangDestroy':
                        include "ruang/destroy.php";
                        break;
                    //jenis
                    case 'jenis':
                        include "jenis/jenis.php";
                        break;
                    case 'jenisCreate':
                        include "jenis/create.php";
                        break;		
                    case 'jenisEdit':
                        include "jenis/edit.php";
                        break;		
                    case 'jenisDestroy':
                        include "jenis/destroy.php";
                        break;
                    //barang
                    case 'barang':
                        include "barang/barang.php";
                        break;
                    case 'barangCreate':
                        include "barang/create.php";
                        break;		
                    case 'barangEdit':
                        include "barang/edit.php";
                        break;		
                    case 'barangDestroy':
                        include "barang/destroy.php";
                        break;
                    //petugas
                    case 'petugas':
                        include "petugas/petugas.php";
                        break;
                    case 'petugasCreate':
                        include "petugas/create.php";
                        break;
                    case 'petugasEdit':
                        include "petugas/edit.php";
                        break;
                    case 'petugasDestroy':
                        include "petugas/destroy.php";
                        break;
                    //peminjam		
                    case 'peminjam':
                        include "peminjam/peminjam.php";
                        break;		
                    case 'peminjamCreate':
                        include "peminjam/create.php";
                        break;		
                    case 'peminjamEdit':
                        include "peminjam/edit.php";
                        break;		
                    case 'peminjamDestroy':
                        include "peminjam/destroy.php";
                        break;
                    //peminjaman		
                    case 'peminjaman':
                        include "peminjaman/peminjaman.php";
                        break;		
                    case 'peminjamanCreate':
                        include "peminjaman/create.php";
                        break;		
                    case 'peminjamanEdit':
                        include "peminjaman/edit.php";
                        break;		
                    case 'peminjamanDestroy':
                        include "peminjaman/destroy.php";
                        break;
                    //pengembalian		
                    case 'pengembalian':
                        include "pengembalian/pengembalian.php";
                        break;		
                    case 'pengembalianCreate':
                        include "pengembalian/create.php";
                        break;
                    //laporan		
                    case 'laporanPeminjaman':
                        include "laporan/cetak_filter_peminjaman.php";
                        break;		
                    default:
                        echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                        break;
                  }
              }else{
                  include "home.php";
              }

            ?>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Nikah.ID 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>
