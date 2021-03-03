<?php
require '../../function/init.php';

$pembayaran = new pembayaran();


if (isset($_GET['tgl_awal'])) {
    $datapembayaran = $pembayaran->filterpembayaran($_GET);
}

$judul = 'Laporan Pembayaran SPP';
include '../template/header.php';
?>

<div class="container">
    <div class="row bg-p b-sd" style="padding: 15px;">
        <div class="tbl-back" style="margin-right:15px; color: #0f5ea395">
            <a style="cursor:pointer" onclick="window.history.back()">
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>
        <div class="col">
            <h3 style="">pembayaran</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li><a href="<?= url ?>">Dashboard</a></li>
                <li><a href="<?= url ?>bayar/riwayatbayar.php">Riwayat transaksi</a></li>
                <li>Laporan Transaksi</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p" style="margin-top: 1%">
        <div class="col-1" style="border-top: 3px solid #0f5fa3 ; padding: 5px 15px">
            <div class="row" style="justify-content: center">
                <div class="col-4">
                    <h5>Filter</h5>
                    <form action="" method="GET">
                        <div class=" form-grup">
                            <label for="tgl_awal">Mulai Tanggal</label>
                            <input class="form-kontrol" type="date" name="tgl_awal" id="tgl_awal" placeholder="dd">
                        </div>
                        <div class=" form-grup">
                            <label for="hingga_tgl">Hingga Tanggal</label>
                            <input class="form-kontrol" type="date" name="hingga_tgl" id="hingga_tgl" placeholder="dd">
                        </div>
                        <div style="text-align: center">
                            <button type="submit" class="tbl tbl-b">Tampilkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if (isset($datapembayaran)) : ?>
            <div class=" col-1" style="padding: 5px 15px">
                <div class="row">
                    <div class="col-1" style="text-align: left">
                        <a href="<?= url ?>bayar/cetakpembayaran.php?tgl_awal=<?= $_GET['tgl_awal'] . '&&hingga_tgl=' . $_GET['hingga_tgl'] ?>" class="tbl tbl-h"><i class="fa fa-file-pdf-o"> PDF </i></a>
                    </div>
                    <div class="col-1">
                        <table>
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>NISN</td>
                                    <td>Petugas</td>
                                    <td>Tahun / Keterangan</td>
                                    <td>Bulan SPP</td>
                                    <td>Nominal /Bulan</td>
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
                                        <td><?= $value['id_petugas'] . ' / ' . $value['nama'] ?></td>
                                        <td><?= $value['tahun'] . ' / ' . $value['keterangan'] ?></td>
                                        <td><?= $value['bulan_dibayar'] ?></td>
                                        <td>Rp<?= number_format($value['nominal']) ?></td>
                                        <td>Rp<?= number_format($value['jml_bayar']) ?></td>
                                        <td><?= $value['tgl_bayar'] ?></td>
                                        <td style="font-weight: bold"><?= $value['status'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../template/footer.php'; ?>