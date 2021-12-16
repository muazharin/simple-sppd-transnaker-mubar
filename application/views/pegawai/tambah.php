<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Input Alignment card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Pegawai</h5>
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
                                <input type="number" name="nip" class="form-control form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pangkat/Golongan</label>
                            <div class="col-sm-10">
                                <select name="pangkat" class="form-control">
                                    <option value="">Pilih Pangkat</option>
                                    <?php foreach ($pangkat as $s) : ?>
                                    <option value="<?= $s->id_pangkat; ?>">
                                        <?= $s->nama_pangkat.', '.$s->golongan.'/'.$s->ruang; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select name="jabatan" class="form-control">
                                    <?php foreach ($jabatan as $s) : ?>
                                    <option value="<?= $s->id_jabatan; ?>"><?= $s->nama_jabatan; ?></option>
                                    <?php endforeach; ?>
                                </select>
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