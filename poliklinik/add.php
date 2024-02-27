<?php include_once('../_header.php'); ?>

<div class="container-fluid">
    <h2>POLIKLINIK</h2>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Poliklinik</h6>
            <div class="dropdown-divider"></div>
                <form action="proses.php" method="post" style="margin-top: 20px;">
                <div class="row mb-3">
                    <label for="id_poli" class="col-sm-3 col-form-label">ID Poliklinik</label>
                    <div class="col-sm-8" >
                    <input type="text" class="form-control" name="id_poli" id="id_poli" required autofocus autocomplete="off">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_poli" class="col-sm-3 col-form-label">Nama Poliklinik</label>
                    <div class="col-sm-8" >
                    <input type="text" class="form-control" name="nama_poli" id="nama_poli" required autofocus autocomplete="off">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jadwal" class="col-sm-3 col-form-label">Hari Buka</label>
                    <div class="col-sm-8" >
                    <input type="text" class="form-control" name="jadwal" id="jadwal" required autofocus autocomplete="off">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jam_buka" class="col-sm-3 col-form-label">Jam Buka</label>
                    <div class="col-sm-8" >
                    <input type="text" class="form-control" name="jam_buka" id="jam_buka" required autofocus autocomplete="off">
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