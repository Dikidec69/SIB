<?php
require_once "../_config/config.php";
require "../libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $id_poli= trim(mysqli_real_escape_string($con, $_POST['id_poli']));
    $nama   = trim(mysqli_real_escape_string($con, $_POST['nama_poli']));
    $jadwal = trim(mysqli_real_escape_string($con, $_POST['jadwal']));
    $jam    = trim(mysqli_real_escape_string($con, $_POST['jam_buka']));
    mysqli_query($con, "INSERT INTO tb_poliklinik (id_poli, nama_poli, jadwal, jam_buka) VALUES ('$id_poli','$nama','$jadwal','$jam')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id     = $_POST['id'];
    $nama   = trim(mysqli_real_escape_string($con, $_POST['nama_poli']));
    $jadwal = trim(mysqli_real_escape_string($con, $_POST['jadwal']));
    $jam    = trim(mysqli_real_escape_string($con, $_POST['jam_buka']));
    mysqli_query($con, "UPDATE tb_poliklinik SET id_poli = '$id_poli', nama_poli = '$nama', jadwal = '$jadwal', jam_buka = '$jam' WHERE id_poli = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>