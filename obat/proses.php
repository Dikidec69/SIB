<?php
require_once "../_config/config.php";
require "../libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Excepation\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $stok = trim(mysqli_real_escape_string($con, $_POST['stok']));
    mysqli_query($con, "INSERT INTO tb_obat (id_obat, nama_obat, stok) VALUES ('$uuid','$nama','$stok')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if(isset($_POST['edit'])) {
    $id   = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $stok = trim(mysqli_real_escape_string($con, $_POST['stok']));
    mysqli_query($con, "UPDATE tb_obat SET nama_obat = '$nama', stok = '$stok' WHERE id_obat = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
?>