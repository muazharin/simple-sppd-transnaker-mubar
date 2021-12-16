<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Input Alignment card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Ubah Pegawai </h5>
                    <a href="<?= base_url(); ?>pegawai">
                        <button style="float: right;" class="btn waves-effect waves-light btn-success">
                            <i class="icofont icofont-reply"></i> Kembali
                        </button>
                    </a>
                </div>
                <div class="card-block">
                    <form method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="number" name="nip" class="form-control form-control-capitalize"
                                    value="<?= $detail->nip;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control form-control-capitalize"
                                    value="<?= $detail->nama_pegawai;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pangkat/Golongan</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control form-control-capitalize"
                                    value="<?= $detail->nama_pangkat;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control form-control-capitalize"
                                    value="<?= $detail->nama_jabatan;?>" readonly>
                            </div>
                        </div>
                        <button type="submit" style="float: right;" class="btn waves-effect waves-light btn-primary">
                            <i class="icofont icofont-paper-plane"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
            <!-- Input Alignment card end -->
        </div>
    </div>
</div>
