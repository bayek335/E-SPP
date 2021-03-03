<?php
require '../../function/init.php';

$spp = new Spp();

$dataspp = $spp->ambil();
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "hapus") {
        $spp->hapus($_POST['id_spp']);
    } elseif ($_POST['submit'] == "ubah") {
        $spp->simpan($_GET['idspp'], $_POST);
    }
}
if (isset($_GET['idspp'])) {
    $ubahspp = $spp->ubah($_GET['idspp']);
}

$judul = 'Data Spp SMKN 1 Kepanjen';
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
            <h3 style="">SPP</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li><a href="<?= url ?>">Dashboard</a></li>
                <li>Spp</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p " style="margin-top:1%;padding-bottom:14px">
        <div class=" col-1 b-sd" style="border-bottom: 3px solid #0f5fa3 ; padding: 5px 15px">
            <a href="<?= url ?>spp/tambahspp.php" class="tbl tbl-b">Tambah spp</a>
            <a href="<?= url ?>spp/cetakspp.php" class="tbl tbl-h"><i class="fa fa-file-pdf-o"> PDF </i></a>
        </div>
        <div class="col b-sd" style="padding: 15px; margin-top:15px">
            <h3>Table Spp</h3>
            <table>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Tahun Ajar</td>
                        <td>Nominal /Bulan</td>
                        <td>Keterangan</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataspp as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['tahun'] ?></td>
                            <td>Rp<?= number_format($value['nominal'], 0) ?></td>
                            <td><?= $value['keterangan'] ?></td>
                            <td>
                                <a class="tbl tbl-h" href="<?= url ?>spp/ubahspp.php?idspp=<?= $value['id_spp'] ?>">Ubah</a>
                                <form action="" method="post">
                                    <input type="hidden" name="id_spp" value="<?= $value['id_spp'] ?>">
                                    <button class="tbl tbl-m" type="submit" name="submit" value="hapus" onclick="konfirmasi(event, 'Anda yakin ingin menghapus Spp tahun '+<?= $value['tahun'] ?>)">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<?php include '../template/footer.php'; ?>