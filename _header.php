<?php
require_once "_config/config.php";
require "libs/vendor/autoload.php";

if(@$_SESSION['user']) ?>   
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMKESKI</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url('css/sb-admin-2.min.css');?>" rel="stylesheet">

</head>
    
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('dashboard')?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-stethoscope"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIMKESKI <sup>!</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?=base_url('dashboard')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Pasien
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('pasien/add.php')?>">
                    <i class="fas fa-fw fa-notes-medical"></i>
                    <span>Register Pasien Baru</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('rj/prj.php')?>">
                    <i class="fas fa-fw fa-notes-medical"></i>
                    <span>Pendaftaran Rawat Jalan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('pasien/data.php')?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Pasien</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('rm/rm.php')?>">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Rekam Medis Pasien</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Database
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('dokter/data.php')?>">
                    <i class="fas fa-fw fa-hospital-user"></i>
                    <span>Data Dokter</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('obat/data.php')?>">
                    <i class="fas fa-fw fa-tablets"></i>
                    <span>Data Obat</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url('poliklinik/data.php')?>">
                    <i class="fas fa-fw fa-hospital"></i>
                    <span>Data Poliklinik</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                <nav class="navbar navbar-expand navbar-light bg-success topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div style="margin-right: 20px; margin-top: 13px;" class="text-white small">
                        <?php
                        echo "".date("H:i")."<br/>";
                        echo "".date("l, d F Y")."<br/>";
                        ?>
                        </div>

                        <div class="topbar-divider d-none d-sm-block"></div>
                         
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small">

                                <?php
                                if(@$_SESSION['user']) {
                                    $user_login = @$_SESSION['user'];
                                }
                                $sql_user = mysqli_query($con, "SELECT * FROM tb_user WHERE username ='$user_login'") or die (mysqli_error($con));
                                $data_user = mysqli_fetch_array($sql_user)
                                ?>
                                    <?php echo $data_user['nama_user']; ?>

                                </span>
                                <img class="img-profile rounded-circle"
                                    src="<?=base_url('img/undraw_profile.svg')?>">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="auth/logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Page Heading -->
                

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    
                               
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
                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin untuk keluar dari SIMKESKI?</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="<?=base_url('auth/logout.php')?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?=base_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('js/sb-admin-2.min.js');?>"></script>