<?php
require '../../function/init.php';
$spp = new Spp();
if (isset($_GET['idspp'])) {
    $ubahspp = $spp->ubah($_GET['idspp']);
}
if (isset($_POST['submit'])) {
    $spp->simpan($_GET['idspp'], $_POST);
}
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
                <li><a href="<?= url ?>spp/dataspp.php">Spp</a> </li>
                <li>Ubah Spp</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p " style="margin-top:1%; padding-bottom: 15px;justify-content: center">
        <div class="col-4" style="padding: 15px; margin-top: 1%; height:480px">
            <h3>Ubah SPP Tahun Ajar <?= $ubahspp['tahun'] ?></h3>
            <form action="" method="post">
                <div class="form-grup">
                    <label for="tahun">Tahun Ajar</label>
                    <input class="form-kontrol" type="number" name="tahun" id="tahun" value="<?= $ubahspp['tahun'] ?>">
                </div>
                <div class="form-grup">
                    <label for="nominal">Nominal /Tahun</label>
                    <input class="form-kontrol" type="number" name="nominal" id="nominal" value="<?= $ubahspp['nominal'] ?>">
                </div>
                <div class=" form-grup">
                    <label for="keterangan">Keterangan</label>
                    <input class="form-kontrol" type="text" name="keterangan" id="keterangan" value="<?= $ubahspp['keterangan'] ?>">
                </div>
                <div>
                    <button class=" tbl tbl-h" type="submit" name="submit" value="ubah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>