<?php include_once('../_header.php');

$id = @$_GET['id'];
$sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien 
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
if ($data = mysqli_fetch_array($sql_pasien));
?>

<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formulir Pendaftaran Pasien</h6>
            <div class="dropdown-divider"></div>
                <form action="proses.php" method="post" style="margin-top: 20px;">
                <div class="row mb-3">
                    <label for="norm" class="col-sm-3 col-form-label">Nomor RM</label>
                    <input type="hidden" name="id" value="<?=$data['id_pasien']?>">
                    <div class="col-sm-2">
                    <input type="text" class="form-control" value="<?=$data['norm']?>" name="norm" id="norm" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_pasien" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?=$data['nama_pasien']?>" name="id_pasien" id="id_pasien" readonly required autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?=$data['tanggal_lahir']?>" name="tanggal_lahir" id="tanggal_lahir" readonly required autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_agama" class="col-sm-3 col-form-label">Agama</label>
                    <input type="hidden" name="agama" value="<?=$data['id_agama']?>">
                    <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?=$data['agama']?>" name="id_agama" id="id_agama" readonly required autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <input type="hidden" name="jk" value="<?=$data['id_jk']?>">
                    <div class="col-sm-5">
                    <input type="text" class="form-control" value="<?=$data['jenis_kelamin']?>" name="id_jk" id="id_jk" readonly required autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                    <input type="text-area" class="form-control" value="<?=$data['alamat']?>" name="alamat" id="alamat" readonly required autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tgl_periksa" class="col-sm-3 col-form-label">Tanggal Periksa</label>
                    <div class="col-sm-3">
                    <input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa" required autofocus autocomplete="off">
                    </div>
                    <label for="jam_periksa" class="col-sm-2 col-form-label">Jam Periksa</label>
                    <div class="col-sm-3">
                    <input type="time" class="form-control" name="jam_periksa" id="jam_periksa" required autofocus autocomplete="off">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_poli" class="col-sm-3 col-form-label">Poliklinik</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="id_poli" id="id_poli" required autocomplete="off">
                        <option style="background-color: secondary;" value="">-- Pilih Poliklinik --</option>
                        <?php
                        $sql_jk = mysqli_query($con, "SELECT * FROM tb_poliklinik") or die (mysqli_error($con));
                        while($data_jk = mysqli_fetch_array($sql_jk)) {
                            echo '<option value="'.$data_jk['id_poli'].'">'.$data_jk['nama_poli'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_dokter" class="col-sm-3 col-form-label">Dokter</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="id_dokter" id="id_dokter" required autocomplete="off">
                        <option style="background-color: secondary;" value="">-- Pilih Dokter --</option>
                        <?php
                        $sql_jk = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));
                        while($data_jk = mysqli_fetch_array($sql_jk)) {
                            echo '<option value="'.$data_jk['id_dokter'].'">'.$data_jk['nama_dokter'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="id_cb" class="col-sm-3 col-form-label">Cara Bayar</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="id_cb" id="id_cb" autofocus>
                        <option>-- Pilih Caya Bayar --</option>
                        <?php
                        $sql_pend = mysqli_query($con, "SELECT * FROM tb_cb") or die (mysqli_error($con));
                        while($data_pend = mysqli_fetch_array($sql_pend)) {
                        ?>
                            <option value="<?php echo $data_pend['id_cb'] ?>"> <?php echo $data_pend['cb']?></option>
                        <?php }
                        ?>
                    </select>
                    </div>
                </div>

                <input type="hidden" name="statuss" value="1">

                <div class="row mb-3" style="margin-top: 20px;">
                    <label for="no_bpjs" class="col-sm-3 col-form-label">Nomor BPJS</label>
                    <div class="col-sm-3" >
                    <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" required autofocus autocomplete="off">
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
                                        <input class="btn btn-primary" type="submit" value="Simpan" name="add">
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
        $('#id_poli').on('change',function(){
            var id_poli = $('#id_poli').val();
            $.ajax({
                url:'combo.php',
                type:"POST",
                data:{
                    modul:'Dokter',
                    id:id_poli
                },
                success:function(respond){
                    $("#id_dokter").html(respond);
                },
                error:function(){
                    alert("Gagal mengambil data");
                }
            })
        })
    });
    </script>
<?php include_once('../_footer.php'); ?>