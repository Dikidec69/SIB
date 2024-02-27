<?php
require_once "../_config/config.php";
if(isset($_SESSION['user'])) {
    echo "<script>window.location='".base_url()."';</script>";
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMKESKI - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" href="<?=base_url()?>">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

          

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di SIMKESKI</h1>
                                            </div>
                                    <?php
                                    if(isset($_POST['login'])) {
                                        $user = trim(mysqli_real_escape_string($con, $_POST['user']));
                                        $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
                                        $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND password = '$pass'") or die (mysqli_error($con));
                                        if(mysqli_num_rows($sql_login) > 0) {
                                            $_SESSION['user'] = $user;
                                            echo "<script>window.location='".base_url()."';</script>";
                                        } else { ?>
                                            <div class="row">
                                                <div class="col-lg-12 col-lg-offset-3">
                                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                                        <strong>Login Gagal!</strong> Username / Password Salah
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                    }
                                    ?>
                                    <form action="" method="post" class="navbar-form">
                                        <div class="form-group">
                                            <input type="text" name="user" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Username" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                        <div class="input-grup">
                                        <input type="submit" name="login" class="btn btn-success btn-user btn-block" value="Login">
                                                                                             
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
<?php
}
?>