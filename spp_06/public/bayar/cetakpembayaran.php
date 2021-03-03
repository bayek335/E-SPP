<?php
require '../../function/init.php';

$pembayaran = new pembayaran();


$datapembayaran = $pembayaran->filterpembayaran($_GET);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url ?>assets/custom.style.css">
    <link rel="stylesheet" href="<?= url ?>assets/navbar.style.css">
    <link rel="stylesheet" href="<?= url ?>assets/font-awesome/css/font-awesome.css">
    <title>Pembayaran Spp Tanggal <?= $_GET['tgl_awal'] ?> hingga <?= $_GET['hingga_tgl'] ?></title>

    <style>
        * {
            font-size: 12px;
        }

        h5 {
            display: block;
            font-size: 12px;
        }

        table tr {
            border-collapse: collapse;
        }

        table tr td {
            border: 1px solid #d3d3d3;
            padding: 10px;
            text-align: center
        }
    </style>
</head>

<body>

    <div class="container bg-p" style="padding: 25px">
        <div class=" col-1">
            <div class="row" style="justify-content: center; border-bottom:1px solid #d3d3d3; padding:35px">
                <div class="col-4" style="text-align: center">
                    <p style="text-transform: uppercase;font-weight: bold">LAPORAN PEMBAYARAN SPP SMKN 1 KEPANJEN Tanggal <?= $_GET['tgl_awal'] ?> hingga <?= $_GET['hingga_tgl'] ?></p>
                </div>
            </div>
            <div class="row" style="margin: 30px 0">
                <h5 style="display:block;font-weight: bold">Cetak</h5>
                <p><?= date('d M Y H:i') ?></p>
            </div>
            <div class="row" style="margin: 30px 0">
                <div class="col-1">
                    <table>
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>NISN</td>
                                <td>Petugas</td>
                                <td>Tahun / Keterangan</td>
                                <td>Bulan SPP</td>
                                <td>Jumlah Bayar</td>
                                <td>Tanggal Bayar</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datapembayaran as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['nisn'] ?></td>
                                    <td><?= $value['nama'] ?></td>
                                    <td><?= $value['tahun']  ?></td>
                                    <td><?= $value['bulan_dibayar'] ?></td>
                                    <td>Rp<?= number_format($value['jml_bayar']) ?></td>
                                    <td><?= $value['tgl_bayar'] ?></td>
                                    <td style="font-weight: bold"><?= $value['status'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print()
        document.location.href = "laporanpembayaran.php"
    </script>
</body>

</html>