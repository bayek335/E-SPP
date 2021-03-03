<?php
require '../../function/init.php';

$siswa = new Siswa();
$kelas = new Kelas();

if (isset($_GET['idk'])) {
    $datasiswa = $siswa->cari($nisn = null, $_GET['idk']);
    $datakelas = $kelas->ubah($_GET['idk']);
} else {
    $datasiswa = $siswa->ambil();
}
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
    <title>Data Siswa </title>

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

        table tr th {
            border: 1px solid #d3d3d3;
            padding: 10px;
            text-align: center
        }

        table tbody td:last-child {}
    </style>
</head>

<body>

    <div class="container bg-p" style="padding: 25px">
        <div class=" col-1">
            <div class="row" style="justify-content: center; border-bottom:1px solid #d3d3d3; padding:35px">
                <div class="col-4" style="text-align: center">
                    <p style="text-transform: uppercase;font-weight: bold">DATA SISWA <?= (isset($_GET['idk'])) ? 'KELAS ' . $datakelas['nama_kelas'] : '' ?> SMKN 1 KEPANJEN </p>
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
                                <td>No</td>
                                <td>NISN</td>
                                <td>NIS</td>
                                <td>Nama Siswa</td>
                                <td>Kelas</td>
                                <td>Alamat</td>
                                <td>No Telp</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datasiswa as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['nisn'] ?></td>
                                    <td><?= $value['nis'] ?></td>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td><?= $value['nama_kelas'] ?></td>
                                    <td><?= $value['alamat'] ?></td>
                                    <td><?= $value['no_telp'] ?></td>
                                    <td><?= $value['status_siswa'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print()
        document.location.href = 'datasiswa.php'
    </script>
</body>

</html>