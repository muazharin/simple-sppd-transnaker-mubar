<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">

            <!-- Input Alignment card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Tambah Perjalanan</h5>
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
                                    value="090/<?= substr($no_stp, 1);?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kepada</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_pegawai" id="nama_pegawai"
                                    onclick="modalPilihPegawai(true, '0')" class="form-control form-control-capitalize"
                                    required>
                                <input type="hidden" name="pegawai" id="pegawai"
                                    class="form-control form-control-capitalize" required>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_pengikut">
                                        <tr id="tr_1">
                                            <td>
                                                <input type="text" name="pengikut[]" id="pengikut_1"
                                                    class="form-control form-control-normal"
                                                    onclick="modalPilihPegawai(false, '1')">
                                                <input type="hidden" name="id_pengikut[]" id="id_pengikut_1"
                                                    class="form-control form-control-normal">
                                            </td>
                                            <td>
                                                <input type="text" name="jabatan_pengikut[]" id="jabatan_pengikut_1"
                                                    class="form-control form-control-normal" readonly>
                                            </td>
                                            <td>
                                                <button type="button" class="btn waves-effect waves-light btn-danger"
                                                    data-toogle="tooltip" data-placement="left" onclick="del_row('1');"
                                                    id="btn_del_1"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" class="btn waves-effect waves-light btn-primary"
                                    data-toogle="tooltip" data-placement="left" onclick="tambah_row();"><i
                                        class="fa fa-plus"></i> Tambah Pengikut</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Dari</label>
                            <div class="col-sm-10">
                                <input type="text" name="dari" class="form-control form-control-normal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tujuan</label>
                            <div class="col-sm-10">
                                <input type="text" name="tujuan" class="form-control form-control-normal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keperluan</label>
                            <div class="col-sm-10">
                                <textarea type="text" name="keperluan"
                                    class="form-control form-control-normal"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Angkutan</label>
                            <div class="col-sm-10">
                                <select name="angkutan" class="form-control">
                                    <option value="Darat">Darat</option>
                                    <option value="Laut">Laut</option>
                                    <option value="Udara">Udara</option>
                                    <option value="Darat dan Laut">Darat dan Laut</option>
                                    <option value="Darat dan Udara">Darat dan Udara</option>
                                    <option value="Laut dan Udara">Laut dan Udara</option>
                                    <option value="Darat, Laut dan Udara">Darat, Laut dan Udara</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tgl Berangkat</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_berangkat" class="form-control form-control-normal"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tgl Kembali</label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_kembali" class="form-control form-control-normal" required>
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
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modalPegawai">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Pegawai</h4>
                <div style="float: right;">
                    <button type="button" class="btn btn-default" onclick="tabel_pegawai()" aria-label="Close">
                        <i class="fa fa-refresh"></i>
                    </button>
                </div>

            </div>
            <div class="modal-body">
                <table id="simpletable" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Pangkat/Golongan</th>
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery/jquery.min.js"></script>
<script>
var isTrue = false;
var row_pengikut = 0;

function modalPilihPegawai(bool, row) {
    console.log("klik");
    isTrue = bool;
    row_pengikut = row;
    $('#modalPegawai').modal('show');
    tabel_pegawai();
}

function tabel_pegawai() {
    console.log(isTrue);
    console.log(row_pengikut);
    $('#simpletable').DataTable().destroy();
    $('#simpletable').DataTable({
        "paging": true,
        "scrollY": true,
        "scrollX": true,
        "searching": true,
        "select": false,
        "bLengthChange": true,
        "scrollCollapse": true,
        "bPaginate": true,
        "bInfo": true,
        "bSort": false,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo site_url('pegawai/list_pegawai'); ?>",
            "type": "POST",
            "data": {},
            "error": function(request) {
                console.log(request.responseText);
            }
        },
    });
    var rel = setInterval(function() {
        $('#simpletable').DataTable().ajax.reload();
        clearInterval(rel);
    }, 100);
}

$('#simpletable tbody').on('click', 'tr', function() {
    var data = $('#simpletable').DataTable().row(this).data();
    if (isTrue) {
        $('#nama_pegawai').val(data[2]);
        $('#pegawai').val(data[6]);
    } else {
        $('#pengikut_' + row_pengikut).val(data[2]);
        $('#jabatan_pengikut_' + row_pengikut).val(data[4]);
        $('#id_pengikut_' + row_pengikut).val(data[6]);

    }
    $('#modalPegawai').modal('hide');
    // cekStok(id_asset);
    console.log(data[2]);
});

var n = 1;
var arr = '1';

function tambah_row() {
    n = n + 1;
    arr = arr + ' ' + n;
    var tr_buka = '<tr id="tr_' + n + '">';
    var td_col_1 = `<td>
						<input type="text" name="pengikut[]" id="pengikut_` + n + `"
							class="form-control form-control-normal" onclick="modalPilihPegawai(false, '` + n + `')">
						<input type="hidden" name="id_pengikut[]" id="id_pengikut_` + n + `" 
							class="form-control form-control-normal">
					</td>`;
    var td_col_2 = `<td>
						<input type="text" name="jabatan_pengikut[]" id="jabatan_pengikut_` + n + `"
							class="form-control form-control-normal" readonly>
					</td>`;
    var td_col_3 = `<td>
						<button type="button" class="btn waves-effect waves-light btn-danger"
							data-toogle="tooltip" data-placement="left" onclick="del_row('` + n + `');"
							id="btn_del_` + n + `"><i class="fa fa-times"></i></button>
					</td>`;
    var tr_tutup = '</tr>';
    $('#tbody_pengikut').append(tr_buka + td_col_1 + td_col_2 + td_col_3 + tr_tutup);
}

function del_row(row) {
    var row_count = $('#table_pengikut td').closest("tr").length;
    if (row_count != 1) {
        $('#tr_' + row).remove();
    } else {
        Swal.fire({
            text: 'Gagal menghapus baris. Baris tinggal 1',
            icon: 'warning'
        });
    }
    arr = arr.replaceAll(row.toString(), '');
    arr = arr.replaceAll('  ', ' ').trim();
}
</script>
