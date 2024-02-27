<?php include_once('../_header.php'); ?>

<div class="container-fluid">
    <h2>DATA PASIEN TERDAFTAR</h2>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
            <div class="dropdown-divider"></div>

        <div style="margin-left: 700px;">
            <a href="data.php" class="btn btn-secondary"><i class="fas fa-sync-alt"></i></a>
            <a href="add.php" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                <span class="text">Tambah Pasien Baru</span>
            </a>
        </div>

        <div style="margin-top: -36px;">            
        <form class="form-inline" action="" method="post">
            <div class="form-group">
                <input type="text" name="pencarian" class="form-control bg-gray-200 border-1 small" placeholder="Cari Disini..." autocomplete="off">
            </div>
        </form>              
        </div>
        <div class="input-group">
    </div>
</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
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
                    $batas = 5;
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
                            $sql = "SELECT * FROM tb_pasien WHERE nama_pasien LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryJml = $sql;
                        } else {
                            $query = "SELECT * FROM tb_pasien LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_pasien";
                            $no = $posisi + 1; 
                        }
                    } else {
                        $query = "SELECT * FROM tb_pasien ORDER BY norm ASC LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_pasien";
                        $no = $posisi + 1; 
                    }
                    
                    $sql_poli = mysqli_query($con, $query) or die (mysqli_error($con));
                    if(mysqli_num_rows($sql_poli) > 0) {
                        while($data = mysqli_fetch_array($sql_poli)) { ?>
                            <tr>
                                <td style="font-size: 14px;"><?=$no++?></td>
                                <td class="text-center" style="font-size: 14px;"><?=$data['norm']?></td>
                                <td style="font-size: 14px;"><?=$data['nama_pasien']?></td>
                                <td style="font-size: 14px;" class="text-center"><?=$data['tanggal_lahir']?></td>
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
                                    <a href="info.php?id=<?=$data['id_pasien']?>" class="badge bg-primary text-light"><i class="fas fa-eye"></i> Lihat Data</a>
                                    
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


<?php include_once('../_footer.php'); ?>