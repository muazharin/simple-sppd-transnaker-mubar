<style>
.btn.btn-icon {
    line-height: 40px;
}
</style>
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Zero config.table start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Tabel Perjalanan</h5>
                                <a href="<?= base_url(); ?>perjalanan/tambah">
                                    <button style="float: right;" class="btn waves-effect waves-light btn-primary">
                                        <i class="icofont icofont-plus"></i> Tambah Perjalanan
                                    </button>
                                </a>
                                <span></span>
                            </div>
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                    <table id="simpletable" width="100%"
                                        class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor SPT</th>
                                                <th>Kepada</th>
                                                <th>Dari</th>
                                                <th>Tujuan</th>
                                                <th>Tgl Berangkat</th>
                                                <th>Tgl Kembali</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script type="text/javascript" src="<?= base_url() ?>assets_temp/js/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // $('#simpletable').DataTable().destroy();
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
            "url": "<?php echo site_url('perjalanan/list_perjalanan'); ?>",
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
});

function buttonDelete(id) {
    Swal.fire({
        text: 'Anda yakin ingin menghapus data ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = "<?= base_url(); ?>perjalanan/hapus/" + id;
        }
    })
}
</script>
