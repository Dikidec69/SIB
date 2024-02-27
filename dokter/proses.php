<?php
require_once "../_config/config.php";
require "../libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Excepation\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid 		= Uuid::uuid4()->toString();
    $nama 		= trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $id_poli    = trim(mysqli_real_escape_string($con, $_POST['id_poli']));
    $spesialis 	= trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $nohp 		= trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $alamat 	= trim(mysqli_real_escape_string($con, $_POST['alamat']));
    mysqli_query($con, "INSERT INTO tb_dokter (id_dokter, nama_dokter, id_poli, spesialis, no_telp, alamat) VALUES ('$uuid','$nama','$id_poli','$spesialis','$nohp','$alamat')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id   		= $_POST['id'];
    $nama 		= trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $id_poli    = trim(mysqli_real_escape_string($con, $_POST['id_poli']));
    $spesialis 	= trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $nohp 		= trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $alamat 	= trim(mysqli_real_escape_string($con, $_POST['alamat']));
    mysqli_query($con, "UPDATE tb_dokter SET nama_dokter = '$nama', id_poli='$id_poli', spesialis = '$spesialis', no_telp = '$nohp', alamat = '$alamat' WHERE id_dokter = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>