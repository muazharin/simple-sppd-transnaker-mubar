<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /* table,
    td,
    th {
        border: 1px solid black;
    } */

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .new1 {
        color: black;
        margin-top: 0px;
        height: 1px;
        border: none;
    }

    .new2 {
        color: black;
        margin-top: 0px;
        margin-bottom: 1px;
        height: 3px;
        border: none;
    }
    </style>
</head>

<body>
    <table border="0">
        <tr>
            <td style="width: 20%;">
                <img src="<?= base_url();?>assets_temp/images/munabarat.png" width="10%">
            </td>
            <td>
                <h4>
                    <center> PEMERINTAH KABUPATEN MUNA BARAT <br> DINAS TRANSMIGRASI DAN TENAGA KERJA</center>
                </h4>
                <h6><i>Alamat: Desa Lawada Jaya, Kecamatan Sawerigadi</i></h6>
            </td>
            <td style="width: 20%;"></td>
        </tr>
    </table>
    <hr class="new2">
    <hr class="new1">
    <br>
    <h5>Surat Perintah Tugas</h5>
    <table border="0">
        <tr>
            <td colspan="4">
                <center>Nomor: <?= $laporan->nomor;?> <br>&nbsp;</center>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 25%;">Dasar</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">1.</td>
            <td style="vertical-align: top;">Program Kerja Dinas Transmigrasi dan Tenagakerja Kabupaten Muna Barat
                Tahun
                Anggaran <?= date('Y');?>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;"></td>
            <td style="vertical-align: top;"></td>
            <td style="vertical-align: top;">2.</td>
            <td style="vertical-align: top;">Dokumen Pelaksanaan Anggaran (DPA) Satuan Kerja Perangkat Daerah (SKPD)
                Dinas Transmigrasi dan Tenagakerja Kabupaten Muna Barat Tahun Anggaran <?= date('Y');?>
            </td>
        </tr>
    </table>
    <br>
    <table border="0">
        <tr>
            <td colspan="5">
                <center>Memerintahkan: <br>&nbsp;</center>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 25%;">Kepada</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">
                Nama <br>
                NIP <br>
                Pangkat / Golongan <br>
                Jabatan
            </td>
            <td style="vertical-align: top;">
                : <br>
                : <br>
                : <br>
                :
            </td>
            <td style="vertical-align: top;">
                <b> <?= $laporan->nama_pegawai;?> <br></b>
                <?= $laporan->nip;?> <br>
                <?= $laporan->nama_pangkat;?> <br>
                <?= $laporan->nama_jabatan;?> <br>
            </td>

        </tr>
        <?php 
		$no = 0;
		foreach($pengikut as $p):
		$no ++;	
		?>
        <tr>
            <td style="vertical-align: top; width: 25%;"><?php if($no == '1')  echo 'Pengikut'; else ''; ?></td>
            <td style="vertical-align: top;"><?= $no;?></td>
            <td style="vertical-align: top;">
                Nama <br>
                Jabatan
            </td>
            <td style="vertical-align: top;">
                : <br>
                : <br>
            </td>
            <td style="vertical-align: top;">
                <b> <?= $p->nama_pegawai;?> <br></b>
                <?= $p->nama_jabatan;?> <br>
            </td>

        </tr>
        <?php endforeach;?>
        <tr>
            <td style="vertical-align: top; width: 25%;">Keperluan</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;" colspan="3">
                <?= $laporan->keperluan;?>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 25%;">Tempat Tujuan</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;" colspan="3">
                <?= $laporan->tujuan;?> (terlampir)
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 25%;">Angkutan</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;" colspan="3">
                <?= $laporan->angkutan;?>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 25%;">Tanggal Berangkat</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;" colspan="3">
                <?= date_format(date_create($laporan->tgl_berangkat), 'd M Y');?>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 25%;">Tanggal Kembali</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;" colspan="3">
                <?= date_format(date_create($laporan->tgl_kembali), 'd M Y');?>
            </td>
        </tr>
    </table><br>
    Demikian Surat Perintah ini diberikan kepada yang bersangkutan untuk dilaksanankan dengan penuh rasa tanggung jawab.
    <br>
    <br>
    <table>
        <tr>
            <td style="width: 50%"></td>
            <td>
                Dikeluarkan di : Laworo <br>
                <u> Pada Tanggal &nbsp;&nbsp;: <?= date('d M Y');?></u>
                <br>
                <br>
                Plt.KEPALA DINAS TRANSNAKER KAB. MUNA BARAT <br><br><br><br>
                <u>KADIR, S.KM.,M.Si</u> <br>
                Pembina Gol.IV/a <br>
                NIP. 19721231 199703 1 034

            </td>
        </tr>
    </table>
</body>

</html>
