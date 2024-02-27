<?php
require_once "../_config/config.php";

$id = $_POST['id'];
$modul = $_POST['modul'];

if ($modul == 'Kabupaten/Kota') {
    $sql = mysqli_query($con, "SELECT * FROM regencies WHERE id_prov='$id' order by nama_kab ASC") or die (mysqli_error($con));
    $kab = '<option>-- Pilih Kabupaten/Kota --</option>';
    while ($data_kab = mysqli_fetch_array($sql)) {
        $kab.='<option value="'.$data_kab['id_kab'].'">'.$data_kab['nama_kab'].'</option>';
    }
    echo $kab;

} elseif($modul == 'Kecamatan') {
    $sql = mysqli_query($con, "SELECT * FROM districts WHERE id_kab='$id' order by nama_kec ASC") or die (mysqli_error($con));
    $kec = '<option>-- Pilih Kecamatan --</option>';
    while ($data_kec = mysqli_fetch_array($sql)) {
        $kec.='<option value="'.$data_kec['id_kec'].'">'.$data_kec['nama_kec'].'</option>';
    }
    echo $kec;
} elseif($modul == 'Desa/Kelurahan') {
    $sql = mysqli_query($con, "SELECT * FROM villages WHERE id_kec='$id' order by nama_desa ASC") or die (mysqli_error($con));
    $desa = '<option>-- Pilih Desa/Kelurahan --</option>';
    while ($data_desa = mysqli_fetch_array($sql)) {
        $desa.='<option value="'.$data_desa['id_desa'].'">'.$data_desa['nama_desa'].'</option>';
    }
    echo $desa;
}
?>