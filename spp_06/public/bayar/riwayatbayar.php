<?php
require '../../function/init.php';

$pembayaran = new pembayaran();
if ($_SESSION['level'] == 'siswa') {
    if (isset($_GET['nisn'])) {
        $datapembayaran = $pembayaran->cari($_GET['nisn']);
    }
} else {
    $datapembayaran = $pembayaran->ambil()['data_pembayaran'];
}

$judul = 'Data pembayaran SMKN 1 Kepanjen';
include '../template/header.php';
?>

<div class="container">
    <?php if ($_SESSION['level'] == 'siswa') : ?>
        <div class="row bg-p b-sd" style="padding: 15px 0;justify-content: center">
            <div class="col-2">
                <form action="" method="GET">
                    <div class="form-grup">
                        <div class="row">
                            <div class="col">
                                <input class="form-kontrol" type="text" name="nisn" id="tahun" placeholder="Cari berdasakan NISN. EX : 1234xxxxxx">
                            </div>
                            <div>
                                <button style="padding: 10px;margin: 1px 0 ;font-size: 16px" class="tbl tbl-b" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($datapembayaran) && $datapembayaran != null) : ?>
            <div class="row bg-p" style="margin-top: 1%">
                <div class=" col-1" style="border-top: 3px solid #0f5fa3 ; padding: 5px 15px">
                </div>
                <div class="col b-sd" style="padding: 15px">
                    <h3 style="margin-bottom: 15px">Table pembayaran</h3>
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
                        </tbody>
                    </table>
                </div>
            </div>
        <?php elseif (isset($datapembayaran)) : ?>
            <div class="row bg-p" style="margin-top: 1% ; height: 300px;justify-content: center;">
                <div class="col-2" style="text-align: center;margin-top: 15px">
                    <p style="font-size: 50px; opacity:0.3"> NISN YANG ANDA MASUKKAN TIDAK DITEMUKAN DI DATA MANAPUN</p>
                </div>
            </div>
        <?php endif; ?>
    <?php else : ?>
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
                    <li>Riwayat transaksi</li>
                </ul>
            </div>
        </div>
        <div class="row bg-p" style="margin-top: 1%">
            <div class=" col-1" style="border-bottom: 3px solid #0f5fa3 ; padding: 5px 15px">
                <div class="row" style="justify-content: space-between">
                    <div class="col-2">
                        <a href="<?= url ?>bayar/laporanpembayaran.php" class="tbl tbl-h">Laporan</a>
                    </div>
                </div>
            </div>
            <div class="col b-sd" style="padding: 15px">
                <h3 style="margin-bottom: 15px">Table pembayaran</h3>
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
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include '../template/footer.php'; ?>