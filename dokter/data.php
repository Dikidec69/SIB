<?php include_once('../_header.php'); ?>

<div class="container-fluid">
    <h2>DOKTER</h2>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Dokter</h6>
            <div class="dropdown-divider"></div>
        <div style="margin-left: 700px;">
            <a href="data.php" class="btn btn-secondary"><i class="fas fa-sync-alt"></i></a>
            <a href="add.php" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50"><i class="fas fa-plus"></i></span>
                <span class="text">Tambah Data Dokter</span>
            </a>
        </div>
        <div style="margin-top: -36px;">            
        <form class="form-inline" action="" method="post">
            <div class="form-group">
                <input type="text" name="pencarian" class="form-control bg-gray-200 border-1 small" placeholder="Cari Disini..." autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" name="cari" class="btn btn-primary"><span class="fas fa-search fa-sm" aria-hidden="true"></span></button>
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
                            <th class="text-center">Nama Obat</th>
                            <th class="text-center">Spesialis</th>
                            <th class="text-center">Nomor Telephone</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Aksi</th>
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
                            $sql = "SELECT * FROM tb_dokter WHERE nama_dokter LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryJml = $sql;
                        } else {
                            $query = "SELECT * FROM tb_dokter LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_dokter";
                            $no = $posisi + 1; 
                        }
                    } else {
                        $query = "SELECT * FROM tb_dokter LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_dokter";
                        $no = $posisi + 1; 
                    }
                    
                    $sql_dokter = mysqli_query($con, $query) or die (mysqli_error($con));
                    if(mysqli_num_rows($sql_dokter) > 0) {
                        while($data = mysqli_fetch_array($sql_dokter)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['nama_dokter']?></td>
                                <td><?=$data['spesialis']?></td>
                                <td><?=$data['no_telp']?></td>
                                <td><?=$data['alamat']?></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_dokter']?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="" data-toggle="modal" data-target="#hapusModal" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
                                                    <a class="btn btn-danger" href="del.php?id=<?=$data['id_dokter']?>">Yakin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        } else {
                            echo "<tr><td colspan=\"5\" align=\"center\">Data Tidak Ditemukan</td></tr>";
                    }
                    ?>
                    </tbody>
<?php
if(@$_POST['pencarian'] == '') { ?>
    <div style="float:left;">
    <?php
    $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
    echo "Jumlah Data Obat : <b>$jml</b>";
    ?>
    </div>
    <div style="float:right">
        <ul class="pagination justify-content-end" style="margin:10px;">
            <?php
            $jml_hal = ceil($jml / $batas);
            for ($i=1; $i <= $jml_hal; $i++) {
                if($i != $hal) {
                    echo "<li><a href=\"?hal=$i\">$i</a></li>";
                } else {
                    echo "<li class=\"active\"><a>$i</a></li>";
                }
            }
        ?>
    </ul>
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
</div>


<?php include_once('../_footer.php'); ?>