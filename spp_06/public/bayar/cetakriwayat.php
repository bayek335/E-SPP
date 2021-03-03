<?php
require '../../function/init.php';

$pembayaran = new pembayaran();

if (isset($_GET)) {
    if ($_GET['idbayar']) {
        $pembayaran = $pembayaran->cari($nisn = null, $_GET['idbayar']);
    }
}

$judul = 'Data pembayaran SMKN 1 Kepanjen';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= url ?>assets/custom.style.css">
    <link rel="stylesheet" href="<?= url ?>assets/navbar.style.css">
    <link rel="stylesheet" href="<?= url ?>assets/font-awesome/css/font-awesome.css">

    <title>Riwayat Bayar NISN | <?= $pembayaran['nisn'] ?></title>

    <style>
        * {}

        p {
            font-size: 12px;
            margin: 5px;
            color: rgba(0, 0, 0, 0.645);
        }

        h4 {
            font-size: 16px;
            margin: 5px;
            color: rgba(0, 0, 0, 0.645);
        }

        h5 {
            font-size: 14px;
            margin: 5px;
            color: rgba(0, 0, 0, 0.645);
        }
    </style>

</head>

<body>

    <div class="container bg-p">
        <div class="row" style="justify-content: center; border-bottom:1px solid #d3d3d3; padding:35px">
            <div class="col-4" style="text-align: center">
                <h4>BUKTI PEMBAYARAN SPP SMKN 1 KEPANJEN</h4>
            </div>
        </div>
        <div class="row" style="padding: 25px">
            <div class="col-2">
                <h5>Status</h5>
                <p>Lunas</p>
                <h5>Cetak</h5>
                <p><?= date('d M Y H:i') ?></p>
            </div>
            <div class="col">
                <h5>Siswa</h5>
                <p><?= $pembayaran['nama_siswa'] ?></p>
                <p><?= $pembayaran['nama_kelas'] ?></p>
                <p><?= $pembayaran['kompetensi_keahlian'] ?></p>
            </div>
            <div class="col" style="text-align: right">
                <h5>Tanggal Pembayaran</h5>
                <p><?= $pembayaran['tgl_bayar'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-2">
                <h5>Detail Pembayaran</h5>
                <div class="row" style="justify-content: space-between">
                    <h5>SPP</h5>
                    <h5>Rp<?= number_format($pembayaran['jml_bayar']) ?></h5>
                </div>
                <div class="row" style="border-bottom: 1px solid #d3d3d3">
                    <p> <?= $pembayaran['bulan_dibayar'] ?></p>
                </div>
                <div class="row">
                    <div class="col-1" style="text-align: right">
                        <p>Total</p>
                        <h4>Rp<?= number_format($pembayaran['jml_bayar']) ?></h4>
                    </div>
                    <div class="col-1" style="text-align: right; margin-top:20px">
                        <h5>Penerima</h5>
                        <p style="padding: 20px 0; opacity: 0.3"></p>
                        <p><?= $pembayaran['nama'] . ' / ' . $pembayaran['level'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
<script>
    window.print();
    document.location.href = 'transaksi.php?nisn=' + <?= $pembayaran['nisn'] ?>;
</script>