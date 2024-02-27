<?php
require_once "../_config/config.php";

$id = $_POST['id'];
$modul = $_POST['modul'];

if ($modul == 'Dokter') {
    $sql = mysqli_query($con, "SELECT * FROM tb_dokter
    WHERE id_poli='$id' order by nama_dokter ASC") or die (mysqli_error($con));
    $kab = '<option>-- Pilih Dokter --</option>';
    while ($data_kab = mysqli_fetch_array($sql)) {
        $kab.='<option value="'.$data_kab['id_dokter'].'">'.$data_kab['nama_dokter'].'</option>';
    }
    echo $kab;
}
?>