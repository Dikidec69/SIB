<?php include_once('../_header.php'); ?>

<div class="container-fluid">
    <h2>DOKTER</h2>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dokter</h6>
            <div class="dropdown-divider"></div>
                <form action="proses.php" method="post" style="margin-top: 20px;">
                <div class="row mb-3">
                    <label for="nama_dokter" class="col-sm-3 col-form-label">Nama Dokter</label>
                    <div class="col-sm-8" >
                    <input type="text" class="form-control" name="nama_dokter" id="nama_dokter" required autofocus autocomplete="off">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_poli" class="col-sm-3 col-form-label">ID Poliklinik</label>
                    <div class="col-sm-8" >
                    <select class="form-control" name="id_poli" id="id_poli" required autocomplete="off">
                        <option style="background-color: secondary;" value="">-- Pilih ID --</option>
                        <?php
                        $sql_jk = mysqli_query($con, "SELECT * FROM tb_poliklinik") or die (mysqli_error($con));
                        while($data_jk = mysqli_fetch_array($sql_jk)) {
                            echo '<option value="'.$data_jk['id_poli'].'">'.$data_jk['id_poli'].'</option>';
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="spesialis" class="col-sm-3 col-form-label">Spesialis</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="spesialis" id="spesialis" required autocomplete="off">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_telp" class="col-sm-3 col-form-label">Nomor Telephone</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" name="no_telp" id="no_telp" required autocomplete="off">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="alamat" id="alamat" required autocomplete="off">
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
    
<?php include_once('../_footer.php'); ?>