<?php include_once('../_header.php');?>

<?php
require_once "../_config/config.php";
require "../libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Excepation\UnsatisfiedDependencyException;

if(isset($_POST['simpan'])) {
    $uuid   = Uuid::uuid4()->toString();
    $idrj   = trim(mysqli_real_escape_string($con, $_POST['id_rj']));
    $idp    = trim(mysqli_real_escape_string($con, $_POST['id_pasien']));
    $anam   = trim(mysqli_real_escape_string($con, $_POST['anamnesa']));
    $pxf    = trim(mysqli_real_escape_string($con, $_POST['px_fisik']));
    $dxu    = trim(mysqli_real_escape_string($con, $_POST['dx_utama']));
    $dxs    = trim(mysqli_real_escape_string($con, $_POST['dx_sekunder']));
    $dxs1   = trim(mysqli_real_escape_string($con, $_POST['dx_sekunder1']));
    $dxs2   = trim(mysqli_real_escape_string($con, $_POST['dx_sekunder2']));
    $code   = trim(mysqli_real_escape_string($con, $_POST['code']));
    $code1  = trim(mysqli_real_escape_string($con, $_POST['code1']));
    $code2  = trim(mysqli_real_escape_string($con, $_POST['code2']));
    $code3  = trim(mysqli_real_escape_string($con, $_POST['code3']));
    $alergi = trim(mysqli_real_escape_string($con, $_POST['alergi']));
    $poli   = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $obat   = trim(mysqli_real_escape_string($con, $_POST['id_obat']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['id_dokter']));
    
    mysqli_query($con, "INSERT INTO tb_rm (id_rm, id_rj, id_pasien, anamnesa, px_fisik, dx_utama, dx_sekunder, dx_sekunder1, dx_sekunder2, code, code1, code2, code3, alergi, id_poli, id_obat, id_dokter) VALUES
    ('$uuid','$idrj','$idp','$anam','$pxf','$dxu','$dxs','$dxs1','$dxs2','$code','$code1','$code2','$code3','$alergi','$poli','$obat','$dokter')") or die (mysqli_error($con));
    echo "<script>window.location='prj.php';</script>";

} if(isset($_POST['simpan'])) {
    $id        = $_POST['id_rj'];
    $statuss   = trim(mysqli_real_escape_string($con, $_POST['statuss']));

    mysqli_query($con, "UPDATE rj SET
    statuss          = '$statuss' WHERE id_rj = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='prj.php';</script>";
}
?>

<?php include_once('../_footer.php'); ?>