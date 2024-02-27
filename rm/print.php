<?php
date_default_timezone_set('Asia/Jakarta');

session_start();

$con = mysqli_connect('localhost','root','','rumahsakit');
if(mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

function base_url($url = null) {
    $base_url = "http://localhost/rumahsakit";
    if($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}

$id = @$_GET['id'];
$sql_pasien = mysqli_query($con, "SELECT * FROM tb_rm
            JOIN tb_pasien       ON tb_rm.id_pasien = tb_pasien.id_pasien
            JOIN tb_poliklinik   ON tb_rm.id_poli = tb_poliklinik.id_poli
            JOIN tb_dokter       ON tb_rm.id_dokter = tb_dokter.id_dokter
            WHERE id_rm = '$id'") or die (mysqli_error($con));
if ($data = mysqli_fetch_array($sql_pasien));
?>

<!DOCTYPE html>
<html>
<link type="text/css" href="style.css">
    <body>
        <table style="border-collapse: collapse; font-size: 12px; width: 100%;">
            <tr>
                <td style="width: 10%; text-align: center;" rowspan="4"><img src="../logo.png" style="width: 70%;"></td>
                <td id="p">wwwwwwwwwwwwww</td>
                <td style="width: 50%; text-align: center;"><b>DINAS KESEHATAN KABUPATEN WONOGIRI</b></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 50%; text-align: center;"><b>BIDAN PRAKTIK MANDIRI</b></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 20%; text-align: center;">Alamat : Purwantoro, Wonogiri, Jawa Tengah</td>
            </tr>
        </table>
        <hr>
        <table style="border-collapse: collapse; font-size: 11px; width: 100%;">
            <tr>
                <td>Nomor RM</td>
                <td>: <?=$data['norm']?></td>
                <td id="a">aaa</td>
                <td>Agama</td>
                <td >: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM tb_agama WHERE id_agama = '$data[id_agama]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['agama'];
                        }
                        ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?=$data['nama_pasien']?></td>
                <td id="a">aaa</td>
                <td>Tanggal Periksa</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM rj WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['tgl_periksa'];
                        }
                        ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM tb_jk WHERE id_jk = '$data[id_jk]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['jenis_kelamin'];
                        }
                        ?></td>
                        <td id="a">aaa</td>
                <td>Poliklinik</td>
                <td>: <?=$data['nama_poli']?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?=$data['tanggal_lahir']?></td>
                <td id="a">aaaaaaaaa</td>
                <td>Nomor BPJS</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM rj WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['no_bpjs'];
                        }
                        ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?php
                        $sql_alamat = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$data[id_pasien]'") or die (mysqli_error($con));
                        while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                        echo $data_alamat['alamat'];
                        }
                        ?></td>
                <td id="a">aaaaa</td>
                <td>Nomor HP</td>
                <td>: <?=$data['no_telp']?></td>
            </tr>
        </table>
        <p>
        <br />
        <br />
        <br />
        <br />
        <hr>
        <table width="790px" style="border-collapse: collapse; font-size: 11px;">
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
        </table>
        </p>
        <p>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br /><br /><br />
        <table width="790px" style="border-collapse: collapse; font-size: 11px;">
            <tr>
                <td style="text-align: center;">DPJP</td>
            </tr>
            <tr>
                <td><?=$data['nama_dokter']?></td>
            </tr>
        </table>
        </p>
    </body>
</html>

<?php
require_once('../vendor/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
$content = ob_get_contents();
$html2pdf -> WriteHTML($content);
ob_end_clean();
$html2pdf -> Output('kartu.pdf','I');
?>