<?php include_once('../_header.php');
?>
<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien Rawat Jalan</h6>
            <div class="dropdown-divider"></div>
        <div style="margin-left: 780px;">
            <a href="prj.php" class="btn btn-secondary"><i class="fas fa-sync-alt"></i></a>
            <a href="datap.php" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                <span class="text">Daftar Pasien</span>
            </a>
        </div>
        <div style="margin-top: -38px;">
        <form class="form-inline" action="" method="post">
            <div class="form-group">
                <input type="text" name="pencarian" class="form-control bg-gray-200 border-1 small" placeholder="Cari Disini..." autocomplete="off">
            </div>
            <div class="form-group">
                <button hidden type="submit" name="cari" class="btn btn-primary"><span class="fas fa-search fa-sm" aria-hidden="true"></span></button>
            </div>             
        </div>
        </form>
        <div class="input-group">
    </div>
</div>
<form action="proses.php" method="post">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-center" style="font-size: 14px;">NORM</th>
                            <th class="text-center" style="font-size: 14px;">Tanggal Periksa</th>
                            <th class="text-center" style="font-size: 14px;">Nama</th>
                            <th class="text-center" style="font-size: 14px;">Jenis Kelamin</th>
                            <th class="text-center" style="font-size: 14px;">Poliklinik</th>
                            <th class="text-center" style="font-size: 14px;">Dokter</th>
                            <th class="text-center" style="font-size: 14px;">Cara Bayar</th>
                            <th class="text-center" style="font-size: 14px;">Status</th>
                            <th class="text-center" style="font-size: 14px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $batas = 1000;
                    $hal = @$_GET['hal'];
                    if(empty($hal)) {
                        $posisi = 0;
                        $hal = 1;
                    } else {
                        $posisi = ($hal - 1) * $batas;
                    }
                    $no = 1;
                    
                    if($_SERVER['REQUEST_METHOD'] == "POST") {
                        $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                        if($pencarian != '') {
                            $sql = "SELECT * FROM rj
                            JOIN tb_pasien       ON rj.id_pasien = tb_pasien.id_pasien
                            JOIN tb_dokter       ON rj.id_dokter = tb_dokter.id_dokter
                            JOIN tb_agama        ON rj.id_agama = tb_agama.id_agama
                            WHERE nama_dokter LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryJml = $sql;
                        } else {
                            $query = "SELECT * FROM rj LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM rj";
                            $no = $posisi + 1; 
                        }
                    } else {
                        $query = "SELECT * FROM rj ORDER BY jam_periksa ASC LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM rj";
                        $no = $posisi + 1; 
                    }
                    
                    $sql_obat = mysqli_query($con, $query) or die (mysqli_error($con));
                    if(mysqli_num_rows($sql_obat) > 0) {
                        while($data = mysqli_fetch_array($sql_obat)) 
                    { 
                    ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td style="font-size: 14px;"><?=$data['norm']?></td>
                                <td style="font-size: 14px;"><?=$data['tgl_periksa']?></td>
                                <td style="font-size: 14px;">
                                
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM rj JOIN tb_pasien ON rj.id_pasien = tb_pasien.id_pasien WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['nama_pasien']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM rj JOIN tb_jk ON rj.id_jk = tb_jk.id_jk WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['jenis_kelamin']."<br>";
                                    }
                                    ?>
                                </td>

                                <td style="font-size: 14px;">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM rj JOIN tb_poliklinik ON rj.id_poli = tb_poliklinik.id_poli WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['nama_poli']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM rj JOIN tb_dokter ON rj.id_dokter = tb_dokter.id_dokter WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['nama_dokter']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM rj JOIN tb_cb ON rj.id_cb = tb_cb.id_cb WHERE id_rj = '$data[id_rj]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['cb']."<br>";
                                    }
                                    ?>
                                </td>

                                <td class="text-center middle" style="font-size: 15px;">
                                <?php
                                $hasil="";
                                $hasil1="";
                                
                                    $statuss = $data['statuss'];
                                    if ($statuss == 1) {
                                        $hasil = "BELUM DIPERIKSA";
                                    } elseif ($statuss == 2) {
                                        $hasil1 = "SUDAH DIPERIKSA";
                                    }
                                ?>
                                <?php
                                $hasil2="";

                                $status2 = $data['statuss'];
                                if ($statuss == 3) {
                                    $hasil2 = "BATAL PERIKSA";
                                }
                                ?>

                                    <?php 
                                    if ($hasil) {
                                    ?>
                                        <div class="badge bg-warning text-light">
                                            <?php echo $hasil ?>
                                        </div>
                                    <?php
                                    } 
                                    ?>

                                    <?php
                                    if ($hasil1) {
                                    ?>
                                        <div class="badge bg-success text-light">
                                        <?php echo $hasil1 ?>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <?php 
                                    if ($hasil2) {
                                    ?>
                                        <div class="badge bg-danger text-light">
                                            <?php echo $hasil2 ?>
                                        </div>
                                    <?php
                                    } 
                                    ?>
                                </td>
                               
                                <td class="text-center">
                                    <a href="periksa.php?id=<?=$data['id_rj']?>" class="btn badge bg-success text-light"><i class="fas fa-stethoscope"></i> Periksa</a>
                                    <a href="s.php?id=<?=$data['id_rj']?>" class="btn badge bg-danger text-light"><i class="fas fa-window-close"></i> Batal</a>
                                </td>
                            </tr>
                        <?php
                        }
                        } else {
                            echo "<tr><td colspan=\"11\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                    }
                    ?>
                    </tbody>
<?php
if(@$_POST['pencarian'] == '') { ?>
    <div style="float:left;">
    <?php
    $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
    echo "Jumlah Pasien Rawat Jalan : <b>$jml</b>";
    ?>
    </div>
   <?php
} else {
    echo "<div style=\"float:left;\">";
    $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
    echo "Data Hasil Pencarian : <b>$jml</b>";
    echo "</div>";
}  
    ?> 
                    </div>
                </table>
            </div>
        </div>
</form>
</div>

<?php include_once('../_footer.php'); ?>