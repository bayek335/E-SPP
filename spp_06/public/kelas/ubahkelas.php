<?php
require '../../function/init.php';
$kelas = new Kelas();
if (isset($_GET['idk'])) {
    $ubahkelas = $kelas->ubah($_GET['idk']);
}
if (isset($_POST['submit'])) {
    $kelas->simpan($_GET['idk'], $_POST);
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
            <h3 style="">KELAS</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li><a href="<?= url ?>">Dashboard</a></li>
                <li><a href="<?= url ?>kelas/datakelas.php">Kelas</a></li>
                <li>Ubah Kelas</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p " style="margin-top:1%; padding-bottom: 15px;justify-content: center">
        <div class="col-4" style="padding: 15px; margin-top: 1%; height:720px">
            <h4>Form Ubah Kelas</h4>
            <form action="" method="POST">
                <div class="form-grup">
                    <label for="nama_kelas">Kelas</label>
                    <input class="form-kontrol" type="text" name="nama_kelas" id="nama_kelas" maxlength="7" placeholder="Kelas" value="<?= (isset($ubahkelas)) ? $ubahkelas['nama_kelas'] : '' ?>">
                </div>
                <div class="form-grup">
                    <label for="kk">Kompetensi Kejuruan</label>
                    <select class="form-kontrol" name="kk" id="kk">
                        <option value="">-- Kompetensi Kejuruan --</option>
                        <?php if (isset($ubahkelas)) : ?>
                            <option <?= ($ubahkelas['kompetensi_keahlian'] == 'Rekayasa Perangkat Lunak') ? 'selected' : '' ?> value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            <option <?= ($ubahkelas['kompetensi_keahlian'] == 'Teknik Elektronik Industri') ? 'selected' : '' ?> value="Teknik Elektronik Industri">Teknik Elektronik Industri</option>
                            <option <?= ($ubahkelas['kompetensi_keahlian'] == 'Teknik Kendaraan Ringan') ? 'selected' : '' ?> value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                            <option <?= ($ubahkelas['kompetensi_keahlian'] == 'Teknik Komputer dan Jaringan') ? 'selected' : '' ?> value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                            <option <?= ($ubahkelas['kompetensi_keahlian'] == 'Teknik Sepeda Motor') ? 'selected' : '' ?> value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="submit" class="tbl tbl-h" style="margin-top: 8px">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>