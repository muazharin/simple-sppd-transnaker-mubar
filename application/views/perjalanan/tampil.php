<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Input Alignment card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Perjalanan</h5>
                    <a href="<?= base_url(); ?>perjalanan/laporan/<?= $detail->id_perjalanan;?>" target="_blink">
                        <button style="float: right;" class="btn waves-effect waves-light btn-primary">
                            <i class="icofont icofont-print"></i> Print
                        </button>
                    </a>
                    <a href="<?= base_url(); ?>perjalanan">
                        <button style="float: right;" class="btn waves-effect waves-light btn-success">
                            <i class="icofont icofont-reply"></i> Kembali
                        </button>
                    </a>

                </div>
                <div class="card-block">
                    <form method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nomor SPT</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor" class="form-control form-control-capitalize"
                                    value="<?= $detail->nomor;?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kepada</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pegawai" value="<?= $detail->nama_pegawai;?>"
                                    class="form-control form-control-capitalize" readonly>
                            </div>
                            <div class="col-sm-1">
                                <a target="_blank" class="btn waves-effect waves-light btn-success btn-icon"
                                    href="<?= base_url();?>perjalanan/laporan_pengikut/<?= $detail->id_perjalanan;?>/<?= $detail->pegawai;?>">&nbsp;<i
                                        class="icofont icofont-print"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pengikut</label>
                            <div class="col-sm-10">
                                <table class="table table-bordered" id="table_pengikut" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_pengikut">
                                        <?php foreach($pengikut as $p):?>
                                        <tr id="tr_1">
                                            <td>
                                                <input type="text" value="<?= $p->nama_pegawai;?>"
                                                    class="form-control form-control-normal" readonly>
                                            </td>
                                            <td>
                                                <input type="text" value="<?= $p->nama_jabatan;?>"
                                                    class="form-control form-control-normal" readonly>
                                            </td>
                                            <td>
                                                <a target="_blank"
                                                    class="btn waves-effect waves-light btn-success btn-icon"
                                                    href="<?= base_url();?>perjalanan/laporan_pengikut/<?= $detail->id_perjalanan;?>/<?= $p->pengikut;?>">&nbsp;<i
                                                        class="icofont icofont-print"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dari</label>
                            <div class="col-sm-10">
                                <input type="text" name="dari" value="<?= $detail->dari;?>"
                                    class="form-control form-control-normal" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tujuan</label>
                            <div class="col-sm-10">
                                <input type="text" name="tujuan" value="<?= $detail->tujuan;?>"
                                    class="form-control form-control-normal" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keperluan</label>
                            <div class="col-sm-10">
                                <input type="text" name="keperluan" class="form-control form-control-normal"
                                    value="<?= $detail->keperluan;?>" readonly>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Angkutan</label>
                            <div class="col-sm-10">
                                <input type="text" name="angkutan" class="form-control form-control-normal"
                                    value="<?= $detail->angkutan;?>" readonly>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tgl Berangkat</label>
                            <div class="col-sm-10">
                                <input type="text" name="tgl_berangkat" class="form-control form-control-normal"
                                    value="<?= date_format(date_create($detail->tgl_berangkat),'d-M-Y');?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tgl Kembali</label>
                            <div class="col-sm-10">
                                <input type="text" name="tgl_kembali" class="form-control form-control-normal"
                                    value="<?= date_format(date_create($detail->tgl_kembali),'d-M-Y');?>" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Input Alignment card end -->

        </div>
    </div>
</div>
