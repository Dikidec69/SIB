<?php include_once('../_header.php');

$id = @$_GET['id'];
$sql_pasien = mysqli_query($con, "SELECT * FROM tb_rm
            JOIN tb_pasien       ON tb_rm.id_pasien = tb_pasien.id_pasien
            JOIN tb_poliklinik   ON tb_rm.id_poli = tb_poliklinik.id_poli
            JOIN tb_dokter       ON tb_rm.id_dokter = tb_dokter.id_dokter
            WHERE id_rm = '$id'") or die (mysqli_error($con));
if ($data = mysqli_fetch_array($sql_pasien));
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Resume Medis Pasien</h6>
            <div class="dropdown-divider"></div>
                <form action="proses2.php" method="post" style="margin-top: 20px;">
            <table style="width:100%">
            <tr>
                <td>Nomor RM</td>
                <td>: <?=$data['norm']?></td>
                <td>Agama</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM tb_agama WHERE id_agama = '$data[id_agama]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['agama']."<br>";
                        }
                        ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?=$data['nama_pasien']?></td>
                <td>Nomor HP</td>
                <td>: <?=$data['no_telp']?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM tb_jk WHERE id_jk = '$data[id_jk]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['jenis_kelamin']."<br>";
                        }
                        ?></td>
                <td>Tanggal Periksa</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM rj WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['tgl_periksa']."<br>";
                        }
                        ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?=$data['tanggal_lahir']?></td>
                <td>Poliklinik</td>
                <td>: <?=$data['nama_poli']?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$data[id_pasien]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['alamat']."<br>";
                        }
                        ?></td>
                <td>Nomor BPJS</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM rj WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['no_bpjs']."<br>";
                        }
                        ?></td>
            </tr>
            </table>

            <div class="dropdown-divider" style="margin-bottom: 15px"></div>

            <table>
            <tr>
                <td>Pemeriksaan Fisik</td>
                <td>: <?=$data['px_fisik']?></td>
            </tr>
            <tr>
                <td>Anamnesa</td>
                <td>: <?=$data['anamnesa']?></td>
            </tr>
            <tr>
                <td>Diagnosa Utama</td>
                <td>: <?=$data['dx_utama']?></td>
                <td>Kode ICD-10</td>
                <td>: <?=$data['code']?></td>
            </tr>
            <tr>
                <td>Diagnosa Sekunder</td>
                <td>: <?=$data['dx_sekunder']?></td>
                <td>Kode ICD-10</td>
                <td>: <?=$data['code1']?></td>
            </tr>
            <tr>
                <td></td>
                <td>: <?=$data['dx_sekunder1']?></td>
                <td>Kode ICD-10</td>
                <td>: <?=$data['code2']?></td>
            </tr>
            <tr>
                <td></td>
                <td>: <?=$data['dx_sekunder2']?></td>
                <td>Kode ICD-10</td>
                <td>: <?=$data['code3']?></td>
            </tr>
            <tr>
                <td>Alergi</td>
                <td>: <?=$data['alergi']?></td>
            </tr>
            <tr>
                <td>DPJP</td>
                <td>: <?=$data['nama_dokter']?></td>
            </tr>
            </table>
            
            <div class="modal-footer">
                <a href="datarm.php?id=<?=$data['id_rm']?>" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
                <a href="print.php?id=<?=$data['id_rm']?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak Resume Medis</a>

            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>