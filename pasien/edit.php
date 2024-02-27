<?php include_once('../_header.php');

$id = @$_GET['id'];
$sql_poli = mysqli_query($con, "SELECT * FROM tb_pasien 
            JOIN tb_jk          ON tb_pasien.id_jk    = tb_jk.id_jk 
            JOIN tb_agama       ON tb_pasien.id_agama = tb_agama.id_agama
            JOIN provinces      ON tb_pasien.id_prov  = provinces.id_prov
            JOIN regencies      ON tb_pasien.id_kab   = regencies.id_kab
            JOIN districts      ON tb_pasien.id_kec   = districts.id_kec
            JOIN villages       ON tb_pasien.id_desa  = villages.id_desa
            JOIN tb_pendidikan  ON tb_pasien.id_pend  = tb_pendidikan.id_pend
            JOIN tb_pekerjaan   ON tb_pasien.id_kerja = tb_pekerjaan.id_kerja
            JOIN tb_nikah       ON tb_pasien.id_nikah = tb_nikah.id_nikah 
            WHERE id_pasien = '$id'") or die (mysqli_error($con));
$data = mysqli_fetch_array($sql_poli);

?>

<div class="container-fluid">
    <h2>EDIT DATA PASIEN</h2>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
            <div class="dropdown-divider"></div>
                <form action="proses.php" method="post" style="margin-top: 20px;">
                <div class="row mb-3">
                    <label for="norm" class="col-sm-3 col-form-label">No Rekam Medis</label>
                    <input type="hidden" name="id" value="<?=$data['id_pasien']?>">
                    <div class="col-sm-2">
                    <input type="text" class="form-control" value="<?=$data['norm']?>" name="norm" id="norm" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_pasien" class="col-sm-3 col-form-label">Nama Pasien</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="<?=$data['nama_pasien']?>" required autofocus autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" name="nik" id="nik" value="<?=$data['nik']?>" required autofocus autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu Kandung</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="<?=$data['nama_ibu']?>" required autofocus autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?=$data['tempat_lahir']?>" required autofocus autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?=$data['tanggal_lahir']?>" required autofocus autocomplete="off">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="id_jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="id_jk" id="id_jk" required autocomplete="off">
                        <option value="<?=$data['id_jk']?>"><?=$data['jenis_kelamin']?></option>
                        <?php
                        $sql_jk = mysqli_query($con, "SELECT * FROM tb_jk") or die (mysqli_error($con));
                        while($data_jk = mysqli_fetch_array($sql_jk)) {
                            echo '<option value="'.$data_jk['id_jk'].'">'.$data_jk['jenis_kelamin'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_agama" class="col-sm-3 col-form-label">Agama</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="id_agama" id="id_agama" required autocomplete="off">
                        <option value="<?=$data['id_agama']?>"><?=$data['agama']?></option>
                        <?php
                        $sql_agama = mysqli_query($con, "SELECT * FROM tb_agama") or die (mysqli_error($con));
                        while($data_agama = mysqli_fetch_array($sql_agama)) {
                            echo '<option value="'.$data_agama['id_agama'].'">'.$data_agama['agama'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="dropdown-divider"></div>
                <h6 class="m-0 font-weight-bold text-primary">Data Alamat</h6>
                <div class="dropdown-divider"></div>
                
                <div class="row mb-3" style="margin-top: 20px;">
                    <label for="id_prov" class="col-sm-3 col-form-label">Provinsi</label>
                    <div class="col-sm-5">
                    <select class="form-control" name="id_prov" id="id_prov">
                        <option value="<?=$data['id_prov']?>"><?=$data['nama_prov']?></option>
                        <?php
                        $sql_prov = mysqli_query($con, "SELECT * FROM provinces order by nama_prov asc") or die (mysqli_error($con));
                        while($data_prov = mysqli_fetch_array($sql_prov)) {
                        ?>
                            <option value="<?php echo $data_prov['id_prov'] ?>"> <?php echo $data_prov['nama_prov']?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_kab" class="col-sm-3 col-form-label">Kabupaten/Kota</label>
                    <div class="col-sm-5">
                    <select class="form-control" name="id_kab" id="id_kab">
                        <option value="<?=$data['id_kab']?>"><?=$data['nama_kab']?></option>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_kec" class="col-sm-3 col-form-label">Kecamatan</label>
                    <div class="col-sm-5">
                    <select class="form-control" name="id_kec" id="id_kec">
                        <option value="<?=$data['id_kec']?>"><?=$data['nama_kec']?></option>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_desa" class="col-sm-3 col-form-label">Desa/Kelurahan</label>
                    <div class="col-sm-5">
                    <select class="form-control" name="id_desa" id="id_desa">
                        <option value="<?=$data['id_desa']?>"><?=$data['nama_desa']?></option>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-8" >
                    <input type="textarea" class="form-control" name="alamat" id="alamat" value="<?=$data['alamat']?>" required autofocus autocomplete="off">
                    </div>
                </div>

                <div class="dropdown-divider"></div>
                <h6 class="m-0 font-weight-bold text-primary">Data Sosial</h6>
                <div class="dropdown-divider"></div>

                <div class="row mb-3" style="margin-top: 20px;">
                    <label for="no_telp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-3" >
                    <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?=$data['no_telp']?>" required autofocus autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_pend" class="col-sm-3 col-form-label">Pendidikan</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="id_pend" id="id_pend">
                        <option value="<?=$data['id_pend']?>"><?=$data['pendidikan']?></option>
                        <?php
                        $sql_pend = mysqli_query($con, "SELECT * FROM tb_pendidikan") or die (mysqli_error($con));
                        while($data_pend = mysqli_fetch_array($sql_pend)) {
                        ?>
                            <option value="<?php echo $data_pend['id_pend']?>"> <?php echo $data_pend['pendidikan']?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="row mb-3" style="margin-top: 20px;">
                    <label for="id_kerja" class="col-sm-3 col-form-label">Pekerjaan</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="id_kerja" id="id_kerja">
                        <option value="<?=$data['id_kerja']?>"><?=$data['pekerjaan']?></option>
                        <?php
                        $sql_kerja = mysqli_query($con, "SELECT * FROM tb_pekerjaan") or die (mysqli_error($con));
                        while($data_kerja = mysqli_fetch_array($sql_kerja)) {
                        ?>
                            <option value="<?php echo $data_kerja['id_kerja'] ?>"> <?php echo $data_kerja['pekerjaan']?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="row mb-3" style="margin-top: 20px;">
                    <label for="id_nikah" class="col-sm-3 col-form-label">Status Pernikahan</label>
                    <div class="col-sm-5">
                    <select class="form-control" name="id_nikah" id="id_nikah">
                        <option value="<?=$data['id_nikah']?>"><?=$data['nikah']?></option>
                        <?php
                        $sql_nikah = mysqli_query($con, "SELECT * FROM tb_nikah") or die (mysqli_error($con));
                        while($data_nikah = mysqli_fetch_array($sql_nikah)) {
                        ?>
                            <option value="<?php echo $data_nikah['id_nikah'] ?>"> <?php echo $data_nikah['nikah']?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                </div>
                       
                <div class="modal-footer">
                    <a href="data.php" class="btn btn-success btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</a>
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
                                        <input class="btn btn-primary" type="submit" value="Simpan" name="edit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>
                </form>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $('#id_prov').on('change',function(){
            var id_prov = $('#id_prov').val();
            $.ajax({
                url:'combo.php',
                type:"POST",
                data:{
                    modul:'Kabupaten/Kota',
                    id:id_prov
                },
                success:function(respond){
                    $("#id_kab").html(respond);
                },
                error:function(){
                    alert("Gagal mengambil data");
                }
            })
        })

        $('#id_kab').on('change',function(){
            var id_prov = $('#id_kab').val();
            $.ajax({
                url:'combo.php',
                type:"POST",
                data:{
                    modul:'Kecamatan',
                    id:id_prov
                },
                success:function(respond){
                    $("#id_kec").html(respond);
                },
                error:function(){
                    alert("Gagal mengambil data");
                }
            })
        })

        $('#id_kec').on('change',function(){
            var id_prov = $('#id_kec').val();
            $.ajax({
                url:'combo.php',
                type:"POST",
                data:{
                    modul:'Desa/Kelurahan',
                    id:id_prov
                },
                success:function(respond){
                    $("#id_desa").html(respond);
                },
                error:function(){
                    alert("Gagal mengambil data");
                }
            })
        })
    });
</script>

<?php include_once('../_footer.php'); ?>