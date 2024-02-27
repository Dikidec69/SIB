<?php include_once('../_header.php'); ?>

<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Rekam Medis Pasien</h6>
            <div class="dropdown-divider"></div>

                  
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

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="font-size: 14px;">No.</th>
                            <th class="text-center" style="font-size: 14px;">Nomor RM</th>
                            <th class="text-center" style="font-size: 14px;">Nama Pasien</th>
                            <th class="text-center" style="font-size: 14px;">Tanggal Lahir</th>
                            <th class="text-center" style="font-size: 14px;">Jenis Kelamin</th>
                            <th class="text-center" style="font-size: 14px;">Agama</th>
                            <th class="text-center" style="font-size: 14px;">Alamat</th>
                            <th class="text-center" style="font-size: 14px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $batas = 100;
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
                            $sql = "SELECT * FROM tb_rm JOIN tb_pasien ON tb_rm.id_pasien = tb_pasien.id_pasien WHERE nama_pasien LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryJml = $sql;
                        } else {
                            $query = "SELECT * FROM tb_rm LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_rm";
                            $no = $posisi + 1; 
                        }
                    } else {
                        $query = "SELECT * FROM tb_rm JOIN tb_pasien ON tb_rm.id_pasien = tb_pasien.id_pasien WHERE id_rm ORDER BY norm ASC LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_rm";
                        $no = $posisi + 1; 
                    }
                    
                    $sql_poli = mysqli_query($con, $query) or die (mysqli_error($con));
                    if(mysqli_num_rows($sql_poli) > 0) {
                        while($data = mysqli_fetch_array($sql_poli)) { ?>
                            <tr>
                                <td style="font-size: 14px;"><?=$no++?></td>
                                <td class="text-center" style="font-size: 14px;">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_pasien JOIN tb_jk ON tb_pasien.id_jk = tb_jk.id_jk WHERE id_pasien = '$data[id_pasien]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['norm']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_pasien JOIN tb_jk ON tb_pasien.id_jk = tb_jk.id_jk WHERE id_pasien = '$data[id_pasien]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['nama_pasien']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;" class="text-center">
                                <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_pasien JOIN tb_jk ON tb_pasien.id_jk = tb_jk.id_jk WHERE id_pasien = '$data[id_pasien]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['tanggal_lahir']."<br>";
                                    }
                                    ?>
                                <td style="font-size: 14px;" class="text-center">
                                    <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_pasien JOIN tb_jk ON tb_pasien.id_jk = tb_jk.id_jk WHERE id_pasien = '$data[id_pasien]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['jenis_kelamin']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;" class="text-center">
                                    <?php
                                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_pasien JOIN tb_agama ON tb_pasien.id_agama = tb_agama.id_agama WHERE id_pasien = '$data[id_pasien]'") or die (mysqli_error($con));
                                    while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                                        echo $data_dokter['agama']."<br>";
                                    }
                                    ?>
                                </td>
                                <td style="font-size: 14px;">
                                <?php
                                    $sql_alamat = mysqli_query($con, "SELECT * FROM tb_pasien WHERE id_pasien = '$data[id_pasien]'") or die (mysqli_error($con));
                                    while ($data_alamat = mysqli_fetch_array($sql_alamat)) {
                                        echo $data_alamat['alamat']."<br>";
                                }
                                ?>
                                </td>
                                
                                <td class="text-center">
                                    <a href="datarm.php?id=<?=$data['id_rm']?>" class="badge bg-success text-light"><i class="fas fa-eye"></i> Lihat RM</a>
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


<?php include_once('../_footer.php'); ?>