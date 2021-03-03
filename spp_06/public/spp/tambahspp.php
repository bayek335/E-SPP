<?php
require '../../function/init.php';

$spp = new Spp();

if (isset($_POST['submit'])) {
    $spp->tambah($_POST);
}

$judul = 'Tambah Kelas SMKN 1 Kepanjen';
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
                <li><a href=" <?= url ?>spp/dataspp.php">Spp</a></li>
                <li>Tambah Spp</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p b-sd" style="padding: 0 15px ;margin-top:1%;justify-content: center">
        <div class="col-4" style="height:480px">
            <h3 style="margin: 15px 0">Form tambah data SPP</h3>
            <form action="" method="post">
                <div class="form-grup">
                    <label for="tahun">Tahun Ajar</label>
                    <input class="form-kontrol" type="number" name="tahun" id="tahun">
                </div>
                <div class="form-grup">
                    <label for="nominal">Nominal /Bulan</label>
                    <input class="form-kontrol" type="number" name="nominal" id="nominal">
                </div>
                <div class="form-grup">
                    <label for="keterangan">Keterangan</label>
                    <input class="form-kontrol" type="text" name="keterangan" id="keterangan">
                </div>
                <div>
                    <button class="tbl tbl-b" type="submit" name="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>