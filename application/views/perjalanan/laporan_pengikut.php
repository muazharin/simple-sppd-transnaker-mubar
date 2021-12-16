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

    /* td {
        vertical-align: top;
    } */

    table {
        width: 100%;
        border-collapse: collapse;
    }

    body {
        font-size: 10px;
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
    <table width="100%" border="0">
        <tr>
            <td style="width: 49%;">
                <table border="0">
                    <tr>
                        <td style="width: 20%;">
                            <img src="<?= base_url();?>assets_temp/images/munabarat.png" width="5%">
                        </td>
                        <td>
                            <h5>
                                <center> PEMERINTAH KABUPATEN MUNA BARAT <br> DINAS TRANSMIGRASI DAN TENAGA KERJA
                                </center>
                            </h5>
                            <h6><i>Alamat: Desa Lawada Jaya, Kecamatan Sawerigadi</i></h6>
                            <h6 style="color: blue;"><i>Email : nakertransmubar@gmail.com</i></h6>
                        </td>
                        <td style="width: 20%;"></td>
                    </tr>
                </table>
                <hr class="new2">
                <hr class="new1">
                <table border="0">
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="width: 20%;">Lembar ke </td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="width: 20%;">Kode No. </td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="width: 20%;">Nomor </td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
                <div style="width: 100%; text-align: center;">
                    <center><b>SURAT PERINTAH PERJALANAN DINAS (SPPD)</b></center>
                </div>
                <br>
                <table border="1">
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td style="text-align: left;">&nbsp;Pejabat yang berwenang yang memberi perintah</td>
                        <td style="text-align: left;" colspan="2">&nbsp;:&nbsp;&nbsp;Kepala Dinas Transnaker Kab. Muna
                            Barat</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2</td>
                        <td style="text-align: left;">&nbsp;Nama/NIP Pegawai yang diperintah</td>
                        <td style="text-align: left;" colspan="2">
                            &nbsp;:<b>&nbsp;&nbsp;<?= $pengikut->nama_pegawai;?><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;NIP.<?= $pengikut->nip;?></b>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">3</td>
                        <td style="text-align: left;">&nbsp;a. Pangkat dan Golongan <br>
                            &nbsp;b. Jabatan / Instansi <br>
                            &nbsp;c. Tingkat Biaya Perjalanan Dinas <br>
                        </td>
                        <td style="text-align: left;" colspan="2">&nbsp;a.&nbsp;<?= $pengikut->nama_pangkat;?><br>
                            &nbsp;b.&nbsp;<?= $pengikut->nama_jabatan;?><br>
                            &nbsp;c.&nbsp;<br>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">4</td>
                        <td style="text-align: left;">&nbsp;Maksud Perjalanan Dinas <br>
                        </td>
                        <td style="text-align: left;" colspan="2">&nbsp;:&nbsp;<?= $laporan->keperluan;?><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">5</td>
                        <td style="text-align: left;">&nbsp;Alat angkutan yang digunakan <br>
                        </td>
                        <td style="text-align: left;" colspan="2">
                            &nbsp;:&nbsp;<?= 'Kendaraan '. $laporan->angkutan;?><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">6</td>
                        <td style="text-align: left;">&nbsp;a. Tempat Berangkat <br>
                            &nbsp;b. Tempat Tujuan <br>
                        </td>
                        <td style="text-align: left;" colspan="2">&nbsp;a.&nbsp;Laworo<br>
                            &nbsp;b.&nbsp;<?= $laporan->tujuan;?><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">7</td>
                        <td style="text-align: left;">&nbsp;a. Lamanya Perjalanan <br>
                            &nbsp;b. Tanggal Berangkat <br>
                            &nbsp;c. Tanggal Harus Kembali <br>
                        </td>
                        <?php 
							$date1=date_create($laporan->tgl_berangkat);
							$date2=date_create($laporan->tgl_kembali);
							$diff=date_diff($date1,$date2);
						?>
                        <td style="text-align: left;" colspan="2">
                            &nbsp;a.&nbsp;<?= $diff->format('%a')=='0'? '1 hari' : $diff->format('%a hari');?><br>
                            &nbsp;b.&nbsp;<?= date_format(date_create($laporan->tgl_berangkat), 'd M Y');?><br>
                            &nbsp;c.&nbsp;<?= date_format(date_create($laporan->tgl_kembali), 'd M Y');?><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">8</td>
                        <td style="text-align: left;">&nbsp;Pengikut :&nbsp;&nbsp;&nbsp; Nama<br>
                        </td>
                        <td style="text-align: center;">Tanggal</td>
                        <td style="text-align: center;">Keterangan</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"></td>
                        <td><br><br><br></td>
                        <td style="text-align: center;"><br><br><br></td>
                        <td style="text-align: center;"><br><br><br></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">9</td>
                        <td style="text-align: left;">&nbsp;Pembebanan Anggaran <br>
                            &nbsp;a. Instansi <br>
                            &nbsp;b. Mata Anggaran <br>
                        </td>
                        <td style="text-align: left;" colspan="2">&nbsp; <br>
                            &nbsp;a.&nbsp;Dinas TRANSNAKER Kab. Muna Barat<br>
                            &nbsp;b.&nbsp;<br>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">10</td>
                        <td style="text-align: left;">&nbsp;Keterangan Lain-lain <br>
                        </td>
                        <td style="text-align: left;" colspan="2">
                            &nbsp;:&nbsp;<?= 'Kendaraan '. $laporan->angkutan;?><br>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td style="width: 50%"></td>
                        <td style="text-align: left;">
                            Dikeluarkan di : Laworo <br>
                            <u> Pada Tanggal &nbsp;&nbsp;: <?= date('d M Y');?></u>
                            <br>
                            <br>
                            Plt.KEPALA DINAS TRANSNAKER <br>
                            KABUPATEN MUNA BARAT
                            <br>
                            <br>
                            <u>KADIR, S.KM.,M.Si</u> <br>
                            Pembina Gol.IV/a <br>
                            NIP. 19721231 199703 1 034
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 49%; vertical-align: top;">
                <table border="1">
                    <tr>
                        <td style="width: 50%;"></td>
                        <td style="width: 50%;">
                            Berangkat dari : <?= $laporan->dari;?> <br>
                            (tempat kedudukan) <br>
                            Ke : <?= $laporan->tujuan;?> <br>
                            Pada Tanggal &nbsp;&nbsp;:
                            <?= date_format(date_create($laporan->tgl_berangkat), 'd M Y');?>
                            <br>
                            Plt.KEPALA DINAS TRANSNAKER KAB. MUNA BARAT
                            <br>
                            <br>
                            <u>KADIR, S.KM.,M.Si</u> <br>
                            Pembina Gol.IV/a <br>
                            NIP. 19721231 199703 1 034
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiba di : <?= $laporan->tujuan;?> <br>
                            Pada Tanggal : <?= date_format(date_create($laporan->tgl_berangkat), 'd M Y');?> <br><br>
                            .................................................................. <br><br><br>
                            <u>..................................................................</u> <br>
                            NIP.
                        </td>
                        <td>
                            Berangkat dari : <?= $laporan->dari;?><br>
                            Ke : <?= $laporan->tujuan;?> <br>
                            Pada Tanggal : <?= date_format(date_create($laporan->tgl_berangkat), 'd M Y');?> <br>
                            .................................................................. <br><br><br>
                            <u>..................................................................</u> <br>
                            NIP.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiba di : <br>
                            Pada Tanggal : <br><br>
                            .................................................................. <br><br><br>
                            <u>..................................................................</u> <br>
                            NIP.
                        </td>
                        <td>
                            Berangkat dari : <br>
                            Ke : <br>
                            Pada Tanggal : <br>
                            .................................................................. <br><br><br>
                            <u>..................................................................</u> <br>
                            NIP.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiba di : <br>
                            Pada Tanggal : <br><br>
                            .................................................................. <br><br><br>
                            <u>..................................................................</u> <br>
                            NIP.
                        </td>
                        <td>
                            Berangkat dari : <br>
                            Ke : <br>
                            Pada Tanggal : <br>
                            .................................................................. <br><br><br>
                            <u>..................................................................</u> <br>
                            NIP.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiba di : Laworo<br>
                            Pada Tanggal : <?= date_format(date_create($laporan->tgl_kembali), 'd M Y');?> <br><br>
                            Plt.KEPALA DINAS TRANSNAKER KAB. MUNA BARAT <br><br><br>
                            <u>KADIR, S.KM.,M.Si</u> <br>
                            Pembina Gol.IV/a <br>
                            NIP. 19721231 199703 1 034
                        </td>
                        <td>
                            Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan
                            semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-sesingkatnya. <br>
                            Plt.KEPALA DINAS TRANSNAKER KAB. MUNA BARAT <br><br><br>
                            <u>KADIR, S.KM.,M.Si</u> <br>
                            Pembina Gol.IV/a <br>
                            NIP. 19721231 199703 1 034
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Catatan Lain-Lain</td>
                    </tr>
                    <tr>
                        <td colspan="2">PERHATIAN: <br>
                            Pejabat yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang
                            mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab
                            berdasarkan peraturan-peraturan keuangan Negara apabila Negara menderita kerugian akibat
                            kesalahan, kelalaian, dan kelupaannya.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>



</body>










</html>
