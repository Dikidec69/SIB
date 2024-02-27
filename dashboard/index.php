<?php include_once('../_header.php'); ?>
<?php
$query1 = $con->query("SELECT * FROM tb_pasien");
$query2 = $con->query("SELECT * FROM tb_poliklinik");

$jml_pasien = mysqli_num_rows($query1);
$jml_pasien2 = mysqli_num_rows($query2);
?>
<a href="auth/logout.php"></a>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">PASIEN TERDAFTAR</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($jml_pasien,0,",","."); ?> PASIEN</div></div>
                        <div class="col-auto">
                    <i class="fas fa-user fa-3x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">POLIKLINIK</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($jml_pasien2,0,",","."); ?> POLIKLINIK</div></div>
                        <div class="col-auto">
                    <i class="fas fa-clinic-medical fa-3x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include_once('../_footer.php'); ?>

