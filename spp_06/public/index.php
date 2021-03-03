<?php
require '../function/init.php';

$pembayaran = new Pembayaran();

$listriwayat = $pembayaran->ambil(3)['data_pembayaran'];
$sum30day = $pembayaran->ambil()['sum30day'];
$sum1m = $pembayaran->ambil()['sum1m'];

$judul = 'Sistem Pembayaran SPP kanesa';
include 'template/header.php';
?>

<div class="container home-page">
    <div class="row bg-p b-sd" style="padding: 15px;">
        <div class="col">
            <h3>DASHBOARD</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li>Dashboard</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col bg-b b-sd t-c" style="margin-top: 1%;padding: 1% 0; color: #f7f7f7">
            <h1 style="text-transform: uppercase">SELAMAT DATANG <?= $_SESSION['nama'] ?><br> DI WEBSITE PEMBAYARAN SPP SMKN1 KEPANJEN</h1>
        </div>
    </div>
    <?php if ($_SESSION['level'] != 'siswa') : ?>
        <div class="row " style="margin-top: 1%">
            <div class="col">
                <div class="row">
                    <div class="col bg-p b-sd" style="margin-right: 1%; border-left: 5px solid #0f5fa3; padding: 1%">
                        <div class="row">
                            <div class="col">
                                <h4>Pemasukkan 30 hari terakhir</h4>
                                <h2>Rp<?= number_format($sum30day['total'], 0) ?></h2>
                                <span>Total pemasukkan</span>
                            </div>
                            <div class="col">
                                <p>List pemasukkan terbaru</p>
                                <ol style="padding-left: 15px">
                                    <?php foreach ($listriwayat as $value) : ?>
                                        <li>
                                            <h5>Rp<?= number_format($value['jml_bayar'], 0) ?></h5>
                                            <span><?= $value['nama'] . ' / ' . $value['level'] ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <div class="col-1 " style="box-shadow: none;margin:0;padding:0 ; text-align: right">
                                <a class="a-home" style="color: black" href="<?= url ?>bayar/riwayatbayar.php"><span>Lihat pemasukkan lainnya...</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 bg-p b-sd" style="border-left: 5px solid #0f5fa3;padding: 1%">
                        <h4>Saldo bulan <?= date('F') ?></h4>
                        <h2 style="margin-bottom: 0">Rp<?= number_format($sum1m['total'], 0) ?></h2>
                        <span>Total saldo</span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php include 'template/footer.php'; ?>