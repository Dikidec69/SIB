<?php include_once('../_header.php');?>

<?php
require_once "../_config/config.php";
require "../libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Excepation\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid   = Uuid::uuid4()->toString();
    $norm   = trim(mysqli_real_escape_string($con, $_POST['norm']));
    $tp     = trim(mysqli_real_escape_string($con, $_POST['tgl_periksa']));
    $jam    = trim(mysqli_real_escape_string($con, $_POST['jam_periksa']));
    $nama   = trim(mysqli_real_escape_string($con, $_POST['id']));
    $tl     = trim(mysqli_real_escape_string($con, $_POST['tanggal_lahir']));
    $agama  = trim(mysqli_real_escape_string($con, $_POST['agama']));
    $jk     = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $poli   = trim(mysqli_real_escape_string($con, $_POST['id_poli']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['id_dokter']));
    $cb     = trim(mysqli_real_escape_string($con, $_POST['id_cb']));
    $statuss= trim(mysqli_real_escape_string($con, $_POST['statuss']));
    $bpjs   = trim(mysqli_real_escape_string($con, $_POST['no_bpjs']));
    
    mysqli_query($con, "INSERT INTO rj (id_rj, norm, tgl_periksa, jam_periksa, id_pasien, tanggal_lahir, id_agama, id_jk, alamat_pasien, id_poli, id_dokter, id_cb, statuss, no_bpjs) VALUES ('$uuid','$norm','$tp','$jam','$nama','$tl','$agama','$jk','$alamat','$poli','$dokter','$cb','$statuss','$bpjs')") or die (mysqli_error($con));
    echo "<script>window.location='prj.php';</script>";

} if(isset($_POST['simpan'])) {
    $id     = $_POST['id_rj'];
    $statuss= trim(mysqli_real_escape_string($con, $_POST['statuss']));

    mysqli_query($con, "UPDATE rj SET
    statuss          = '$statuss' WHERE id_rj = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='prj.php';</script>";
}
?>

<?php include_once('../_footer.php'); ?>