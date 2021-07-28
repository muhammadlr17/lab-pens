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
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('assets/img/bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
        }
    </style>

</head>

<body>

    <div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-3">

            <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                    <div div class="text-center">
                        <h4 class="h4 text-gray-900"><b>Aplikasi Peminjaman Barang</b></h4>
                        <h5 class="h5 text-gray-900 mb-4">Laboratorium PENS PSDKU Sumenep</h5>
                    </div>
                        <form class="user" action="" method="POST">
                                <div class="form-group">
                                    <input id="username" placeholder="Username" type="text" class="form-control" name="username" required="">
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control" name="password" required="">
                                </div>
                                <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                Login
                                </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="index.php">Login as User!</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>

        </div>

    </div>

    <?php
    require 'config/config.php';
    session_start();
        if (isset($_POST['login'])) {
            $username   = $_POST['username'];
            $password	= $_POST['password'];  
            $sql = oci_parse($conn, "SELECT COUNT(*) AS NUMBER_OF_ROWS FROM petugas WHERE username='$username' AND password='$password'");
            oci_define_by_name($sql, 'NUMBER_OF_ROWS', $number_of_rows);
            oci_execute($sql);
            oci_fetch($sql);
            if ($number_of_rows == 0) {
                echo '<script language="javascript">alert("Gagal masuk!!");document.location=indexAdmin.php;</script>';
            }else{
                $_SESSION['admin'] = $_POST['username'];
                echo '<script language ="javascript">alert("Masuk sebagai Admin");document.location="admin/";</script>';
            
            }
        }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>