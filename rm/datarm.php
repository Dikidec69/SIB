<?php include_once('../_header.php');

$id = @$_GET['id'];
$sql_pasien = mysqli_query($con, "SELECT * FROM tb_rm
            JOIN tb_pasien      ON tb_rm.id_pasien = tb_pasien.id_pasien
            JOIN rj             ON tb_rm.id_rj = rj.id_rj
            JOIN tb_dokter      ON tb_rm.id_dokter = tb_dokter.id_dokter
            WHERE id_rm = '$id'") or die (mysqli_error($con));
if ($data = mysqli_fetch_array($sql_pasien));
?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pemeriksaan Pasien</h6>
        <a href="rm.php" style="margin-left: 900px;" class="badge bg-primary text-light"><i class="fas fa-caret-square-left"></i> Kembali</a>
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
                        ?>
                    </td>
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
                        ?>
                </td>
                <td>Nomor BPJS</td>
                <td>: <?=$data['no_bpjs']?></td>
                
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: <?=$data['tanggal_lahir']?></td>
                
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?=$data['alamat_pasien']?></td>
                
            </tr>
            </table>

            <div class="dropdown-divider" style="margin-bottom: 20px"></div>
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Pemeriksaan Pasien</h6>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-center" style="font-size: 14px;">Nomor RM</th>
                            <th class="text-center" style="font-size: 14px;">Tanggal Periksa</th>
                            <th class="text-center" style="font-size: 14px;">Poliklinik</th>
                            <th class="text-center" style="font-size: 14px;">Dokter</th>
                            <th class="text-center" style="font-size: 14px;">Cara Bayar</th>
                            <th class="text-center" style="font-size: 14px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                
                        <?php 
                        $batas = 5;
                        $hal = @$_GET['hal'];
                        if(empty($hal)) {
                            $posisi = 0;
                            $hal = 1;
                        } else {
                            $posisi = ($hal - 1) * $batas;
                        }

                        $no = + 1;
                        
                        if($_SERVER['REQUEST_METHOD'] == "POST") {
                            $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                            if($pencarian != '') {
                                $sql = "SELECT * FROM tb_rm WHERE id_rm LIKE '%$pencarian%'";
                                $query = $sql;
                                $queryJml = $sql;
                            } else {
                                $query = "SELECT * FROM tb_rm LIMIT $posisi, $batas";
                                $queryJml = "SELECT * FROM tb_rm";
                                $no = $posisi + 1; 
                            }
                        } else {
                            $query = "SELECT * FROM tb_rm  WHERE id_pasien = '$data[id_pasien]' LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_rm";
                            $no = $posisi + 1; 
                        }
                        
                        $sql_poli = mysqli_query($con, $query) or die (mysqli_error($con));
                        if(mysqli_num_rows($sql_poli) > 0) {
                            while($data = mysqli_fetch_array($sql_poli)) { ?>
                    
                        
                            <tr>
                                <td style="font-size: 14px;" class="text-center"><?=$no++?></td>
                                <td class="text-center" style="font-size: 14px;">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_rm JOIN rj ON tb_rm.id_rj = rj.id_rj WHERE id_rm = '$data[id_rm]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['norm']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;" class="text-center">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_rm JOIN rj ON tb_rm.id_rj = rj.id_rj WHERE id_rm = '$data[id_rm]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['tgl_periksa']."<br>";
                                    }
                                    ?>
                                </td>
                            
                                <td style="font-size: 14px;" class="text-center">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_rm JOIN tb_poliklinik ON tb_rm.id_poli = tb_poliklinik.id_poli WHERE id_rm = '$data[id_rm]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['nama_poli']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;" class="text-center">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_rm JOIN tb_dokter ON tb_rm.id_dokter = tb_dokter.id_dokter WHERE id_rm = '$data[id_rm]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['nama_dokter']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;" class="text-center">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM rj JOIN tb_cb ON rj.id_cb = tb_cb.id_cb WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['cb']."<br>";
                                    }
                                    ?>
                                </td>
                                
                                <td class="text-center">
                                    <a href="resume.php?id=<?=$data['id_rm']?>" class="badge bg-success text-light"><i class="fas fa-folder"></i> Resume Medis</a>
                                    
                                    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Apakah kamu yakin ingin menhapus data ini?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="button" data-dismiss="modal">Tidak</button>
                                                    <a class="btn btn-danger" href="del.php?id=<?=$data['id_pasien']?>">Yakin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        } else {
                            echo "<tr><td colspan=\"8\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                    }
                    ?>
                    </tbody>
                    </tr>
 
</div>

                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>