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

<link rel="stylesheet" type="text/css" href="../css/style.css">

<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pemeriksaan Pasien</h6>
            <div class="dropdown-divider"></div>
                <form action="proses2.php" method="post" style="margin-top: 20px;">
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
                <td>: <?=$data['tgl_periksa']?></td> <input name="poli" value="<?=$data['id_poli']?>" hidden>
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

            <div class="dropdown-divider" style="margin-bottom: 15px"></div>

            <div class="row mb-3">
                <label for="px_fisik" class="col-sm-3 col-form-label">Pemeriksaan Fisik</label>
                <div class="col-sm-9" >
                <textarea type="text-area" class="form-control" name="px_fisik" id="px_fisik" required autofocus autocomplete="off"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <label for="anamnesa" class="col-sm-3 col-form-label">Anamnesa</label>
                <div class="col-sm-9" >
                <textarea type="text-area" class="form-control" name="anamnesa" id="anamnesa" required autofocus autocomplete="off"></textarea>
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="dx_utama" class="col-sm-3 col-form-label">Diagnosa Utama</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="dx_utama" id="dx_utama" required autofocus autocomplete="off">
                </div>
                <label for="exampleDataList" class="col-sm-2 col-form-label">Kode ICD-10</label>
                <div class="col-sm-4">
                <input class="form-control" list="datalistOptions" name="code" id="exampleDataList" placeholder="Masukkan Kode">
                <datalist id="datalistOptions">
                    <option value = <?php
                                    $sql_jk = mysqli_query($con, "SELECT * FROM icds") or die (mysqli_error($con));
                                    while($data_jk = mysqli_fetch_array($sql_jk)) {
                                    echo '<option value="'.$data_jk['code'].'">'.$data_jk['name_en'].'</option>';
                                    }
                                    ?>>
                </div>
            </div>
                    
            <div class="row mb-3">
                <label for="dx_sekunder" class="col-sm-3 col-form-label">Diagnosa Sekunder</label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="dx_sekunder" id="dx_sekunder" required autofocus autocomplete="off">
                </div>
                <label for="exampleDataList" class="col-sm-2 col-form-label">Kode ICD-10</label>
                <div class="col-sm-4">
                <input class="form-control" list="datalistOptions" name="code1" id="exampleDataList" placeholder="Masukkan Kode">
                <datalist id="datalistOptions">
                    <option value = <?php
                                    $sql_jk = mysqli_query($con, "SELECT * FROM icds") or die (mysqli_error($con));
                                    while($data_jk = mysqli_fetch_array($sql_jk)) {
                                    echo '<option value="'.$data_jk['code'].'">'.$data_jk['name_en'].'</option>';
                                    }
                                    ?>>
                </div>
            </div>

            <div class="row mb-3">
                <label for="dx_sekunder1" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="dx_sekunder1" id="dx_sekunder1" required autofocus autocomplete="off">
                </div>
                <label for="exampleDataList" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-4">
                <input class="form-control" list="datalistOptions" name="code2" id="exampleDataList" placeholder="Masukkan Kode">
                <datalist id="datalistOptions">
                    <option value = <?php
                                    $sql_jk = mysqli_query($con, "SELECT * FROM icds") or die (mysqli_error($con));
                                    while($data_jk = mysqli_fetch_array($sql_jk)) {
                                    echo '<option value="'.$data_jk['code'].'">'.$data_jk['name_en'].'</option>';
                                    }
                                    ?>>
                </div>
            </div>

            <div class="row mb-3">
                <label for="dx_sekunder2" class="col-sm-3 col-form-label"></label>
                <div class="col-sm-3">
                <input type="text" class="form-control" name="dx_sekunder2" id="dx_sekunder2" required autofocus autocomplete="off">
                </div>
                <label for="exampleDataList" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-4">
                <input class="form-control" list="datalistOptions" name="code3" id="exampleDataList" placeholder="Masukkan Kode">
                <datalist id="datalistOptions">
                    <option value = <?php
                                    $sql_jk = mysqli_query($con, "SELECT * FROM icds") or die (mysqli_error($con));
                                    while($data_jk = mysqli_fetch_array($sql_jk)) {
                                    echo '<option value="'.$data_jk['code'].'">'.$data_jk['name_en'].'</option>';
                                    }
                                    ?>>
                </div>
            </div>

            <div class="row mb-3">
                <label for="alergi" class="col-sm-3 col-form-label">Alergi</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="alergi" id="alergi" required autofocus autocomplete="off">
                </div>
            </div>

            <div class="row mb-3">
                    <label for="id_obat" class="col-sm-3 col-form-label">Obat</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="id_obat" id="id_obat" required autocomplete="off">
                        <option style="background-color: secondary;" value="">-- Pilih Obat --</option>
                        <?php
                        $sql_jk = mysqli_query($con, "SELECT * FROM tb_obat") or die (mysqli_error($con));
                        while($data_jk = mysqli_fetch_array($sql_jk)) {
                            echo '<option value="'.$data_jk['id_obat'].'">'.$data_jk['nama_obat'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                </div>

            <div class="row mb-3">
                <label for="id_dokter" class="col-sm-3 col-form-label">DPJP</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" value="<?=$data['nama_dokter']?>" name="id_dokterr" id="id_dokterr" required readonly autocomplete="off">
                <input type="text" class="form-control" value="<?=$data['id_dokter']?>" name="id_dokter" id="id_dokter" required readonly autocomplete="off" hidden>
                </div>
            </div>
            
            <input type="hidden" value="<?=$data['id_rj']?>" name="id_rj">
            <input type="hidden" value="<?=$data['id_pasien']?>" name="id_pasien">    
            <input type="hidden" value="2" name="statuss">
            
            <div class="modal-footer">
                <a href="prj.php" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
                <a href="" data-toggle="modal" data-target="#hapusModal" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</a>
                    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">Apakah kamu yakin ingin simpan data ini?</div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Tidak</button>
                                    <input class="btn btn-primary" type="submit" value="Simpan" name="simpan">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>