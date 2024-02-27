<?php include_once('../_header.php');?>

<?php
require_once "../_config/config.php";
require "../libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Excepation\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid   = Uuid::uuid4()->toString();
    $norm   = trim(mysqli_real_escape_string($con, $_POST['norm']));
    $nama   = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $nik    = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $ibu    = trim(mysqli_real_escape_string($con, $_POST['nama_ibu']));
    $tl     = trim(mysqli_real_escape_string($con, $_POST['tempat_lahir']));
    $tgl    = trim(mysqli_real_escape_string($con, $_POST['tanggal_lahir']));
    $jk     = trim(mysqli_real_escape_string($con, $_POST['id_jk']));
    $agama  = trim(mysqli_real_escape_string($con, $_POST['id_agama']));
    $prov   = trim(mysqli_real_escape_string($con, $_POST['id_prov']));
    $kab    = trim(mysqli_real_escape_string($con, $_POST['id_kab']));
    $kec    = trim(mysqli_real_escape_string($con, $_POST['id_kec']));
    $desa   = trim(mysqli_real_escape_string($con, $_POST['id_desa']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $notelp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $pend   = trim(mysqli_real_escape_string($con, $_POST['id_pend']));
    $kerja  = trim(mysqli_real_escape_string($con, $_POST['id_kerja']));
    $nikah  = trim(mysqli_real_escape_string($con, $_POST['id_nikah']));
    
    mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, norm, nama_pasien, nik, nama_ibu, tempat_lahir, tanggal_lahir, id_jk, id_agama, id_prov, id_kab, id_kec, id_desa, alamat, no_telp, id_pend, id_kerja, id_nikah) VALUES ('$uuid','$norm','$nama','$nik','$ibu','$tl','$tgl','$jk','$agama','$prov','$kab','$kec','$desa','$alamat','$notelp','$pend','$kerja','$nikah')") or die (mysqli_error($con));
    echo "<script>window.location='data.php';</script>";

} else if(isset($_POST['edit'])) {
    $id     = $_POST['id'];
    $norm   = trim(mysqli_real_escape_string($con, $_POST['norm']));
    $nama   = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $nik    = trim(mysqli_real_escape_string($con, $_POST['nik']));
    $ibu    = trim(mysqli_real_escape_string($con, $_POST['nama_ibu']));
    $tl     = trim(mysqli_real_escape_string($con, $_POST['tempat_lahir']));
    $tgl    = trim(mysqli_real_escape_string($con, $_POST['tanggal_lahir']));
    $jk     = trim(mysqli_real_escape_string($con, $_POST['id_jk']));
    $agama  = trim(mysqli_real_escape_string($con, $_POST['id_agama']));
    $prov   = trim(mysqli_real_escape_string($con, $_POST['id_prov']));
    $kab    = trim(mysqli_real_escape_string($con, $_POST['id_kab']));
    $kec    = trim(mysqli_real_escape_string($con, $_POST['id_kec']));
    $desa   = trim(mysqli_real_escape_string($con, $_POST['id_desa']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $notelp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $pend   = trim(mysqli_real_escape_string($con, $_POST['id_pend']));
    $kerja  = trim(mysqli_real_escape_string($con, $_POST['id_kerja']));
    $nikah  = trim(mysqli_real_escape_string($con, $_POST['id_nikah']));

    mysqli_query($con, "UPDATE tb_pasien SET
        nama_pasien   = '$nama',
        nik           = '$nik',
        nama_ibu      = '$ibu',
        tempat_lahir  = '$tl',
        tanggal_lahir = '$tgl',
        id_jk         = '$jk',
        id_agama      = '$agama',
        id_prov       = '$prov',
        id_kab        = '$kab',
        id_kec        = '$kec',
        id_desa       = '$desa',
        alamat        = '$alamat',
        no_telp       = '$notelp',
        id_pend       = '$pend',
        id_kerja      = '$kerja',
        id_nikah      = '$nikah' WHERE id_pasien = '$id'") or die (mysqli_error($con));
    echo "<script>window.location='info.php?id=$id';</script>";
}
?>

<?php
if(isset($_POST['login'])) {
    $id     = $_POST['id'];
    $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien 
            JOIN tb_jk          ON tb_pasien.id_jk    = tb_jk.id_jk 
            JOIN tb_agama       ON tb_pasien.id_agama = tb_agama.id_agama
            JOIN provinces      ON tb_pasien.id_prov  = provinces.id_prov
            JOIN regencies      ON tb_pasien.id_kab   = regencies.id_kab
            JOIN districts      ON tb_pasien.id_kec   = districts.id_kec
            JOIN villages       ON tb_pasien.id_desa  = villages.id_desa
            JOIN tb_pendidikan  ON tb_pasien.id_pend  = tb_pendidikan.id_pend
            JOIN tb_pekerjaan   ON tb_pasien.id_kerja = tb_pekerjaan.id_kerja
            JOIN tb_nikah       ON tb_pasien.id_nikah = tb_nikah.id_nikah 
            WHERE id_pasien = '$id'") or die (mysqli_error($con));
    $data = mysqli_fetch_array($sql_pasien);
    $pin  = sha1(trim(mysqli_real_escape_string($con, $_POST['pin'])));
    $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE pin = '$pin'") or die (mysqli_error($con));
    if(mysqli_num_rows($sql_login) > 0) {
        $_SESSION['pin'] = $pin;
        echo "<script>window.location='edit.php?id=$id';</script>";
    } else { ?>
        <div class="row">
            <div class="col-lg-12 col-lg-offset-3">
                <div class="alert alert-danger alert-dismissable" role="alert">
                    <a href="info.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <strong>Edit Data Gagal!</strong> PIN yang dimasukkan Salah
                </div>

            </div>
        </div>
        <a href="info.php?id=<?=$data['id_pasien']?>" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
    <?php
    }
    }
    ?>

<?php include_once('../_footer.php'); ?>