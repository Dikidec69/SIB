<?php include_once('../_header.php');

$id = @$_GET['id'];
$sql_pasien = mysqli_query($con, "SELECT * FROM rj
            JOIN tb_pasien       ON rj.id_pasien = tb_pasien.id_pasien
            JOIN tb_jk           ON rj.id_jk = tb_jk.id_jk
            JOIN tb_agama        ON rj.id_agama = tb_agama.id_agama
            JOIN tb_poliklinik   ON rj.id_poli = tb_poliklinik.id_poli
            JOIN tb_dokter       ON rj.id_dokter = tb_dokter.id_dokter
            WHERE id_rj = '$id'") or die (mysqli_error($con));
if ($data = mysqli_fetch_array($sql_pasien));
?>

<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold text-primary">Pembatalan Periksa Pasien</h6>
<div class="dropdown-divider"></div>

<link rel="stylesheet" type="text/css" href="../css/style.css">
                <table style="width:100%">
            <tr>
                <td>Nomor RM</td>
                <td>: <?=$data['norm']?></td>
                <td>Agama</td>
                <td>: <?=$data['agama']?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?=$data['nama_pasien']?></td>
                <td>Nomor HP</td>
                <td>: <?=$data['no_telp']?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: <?=$data['jenis_kelamin']?></td>
                <td>Tanggal Periksa</td>
                <td>: <?=$data['tgl_periksa']?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?=$data['tanggal_lahir']?></td>
                <td>Poliklinik</td>
                <td>: <?=$data['nama_poli']?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?=$data['alamat_pasien']?></td>
                <td>Nomor BPJS</td>
                <td>: <?=$data['no_bpjs']?></td>
            </tr>
            </table>
            <div class="dropdown-divider"></div>
<form class="form-inline" action="proses.php" method="post">
            <input type="hidden" value="<?=$data['id_rj']?>" name="id_rj">  
            <input type="hidden" value="3" name="statuss">
            
            <a href="prj.php" class="btn badge bg-success text-light"><i class="fas fa-window-close"></i> Kembali</a>
            <button class="btn badge bg-primary text-light" style="margin-left: 10px;" type="submit" name="simpan"><i class="fas fa-window-close"></i> Batalkan Periksa</button>
</form>
</div>
</div>
</div>
<?php include_once('../_footer.php'); ?>