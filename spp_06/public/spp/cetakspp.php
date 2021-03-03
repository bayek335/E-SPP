<?php
require '../../function/init.php';

$spp = new Spp();

$dataspp = $spp->ambil();
?>



</tbody>
</table>
</div>
<div class="col-3"></div>
</div>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url ?>assets/custom.style.css">
    <link rel="stylesheet" href="<?= url ?>assets/navbar.style.css">
    <link rel="stylesheet" href="<?= url ?>assets/font-awesome/css/font-awesome.css">
    <title>Data Spp </title>

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

        table tr TH {
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
                    <p style="text-transform: uppercase;font-weight: bold">DATA BIAYA PEMBAYARAN SPP SMKN 1 KEPANJEN </p>
                </div>
            </div>
            <div class="row" style="margin: 30px 0">
                <h5 style="display:block;font-weight: bold">Cetak : </h5>
                <p><?= date('d M Y H:i') ?></p>
            </div>
            <div class="row" style="margin: 30px 0">
                <div class="col-1">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Tahun Ajar</th>
                                <th>Nominal /Bulan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataspp as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['id_spp'] ?></td>
                                    <td><?= $value['tahun'] ?></td>
                                    <td>Rp<?= number_format($value['nominal'], 0) ?></td>
                                    <td><?= $value['keterangan'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print()
        document.location.href = 'dataspp.php'
    </script>
</body>

</html>