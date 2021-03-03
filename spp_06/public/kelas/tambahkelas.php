<?php
require '../../function/init.php';

$kelas = new Kelas();

if (isset($_POST['submit'])) {
    $kelas->tambah($_POST);
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
            <h3 style="">KELAS</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li><a href="<?= url ?>">Dashboard</a></li>
                <li><a href="<?= url ?>kelas/datakelas.php">Kelas</a></li>
                <li>Tambah Kelas</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p" style="margin-top: 1%; padding-bottom:15px; justify-content: center">
        <div class="col-4">
            <form action="" method="post">
                <h4 style="margin-top:15px">Form Tambah Kelas</h4>
                <div class="form-grup">
                    <label for="nama_kelas">Kelas</label>
                    <select class="form-kontrol" type="text" name="nama_kelas" id="nama_kelas">
                        <option value="">-- Kelas --</option>
                        <option value="XRPL1">X RPL 1</option>
                        <option value="XRPL2">X RPL 2</option>
                        <option value="XRPL3">X RPL 3</option>
                        <option value="XIRPL1">XI RPL 1</option>
                        <option value="XIRPL2">XI RPL 2</option>
                        <option value="XIRPL3">XI RPL 3</option>
                        <option value="XIIRPL1">XII RPL 1</option>
                        <option value="XIIRPL2">XII RPL 2</option>
                        <option value="XIIRPL3">XII RPL 3</option>
                        <option value="XEI1">X EI 1</option>
                        <option value="XEI2">X EI 2</option>
                        <option value="XEI3">X EI 3</option>
                        <option value="XIEI1">XI EI 1</option>
                        <option value="XIEI2">XI EI 2</option>
                        <option value="XIEI3">XI EI 3</option>
                        <option value="XIIEI1">XII EI 1</option>
                        <option value="XIIEI2">XII EI 2</option>
                        <option value="XIIEI3">XII EI 3</option>
                        <option value="XTKR1">X TKR 1</option>
                        <option value="XTKR2">X TKR 2</option>
                        <option value="XTKR3">X TKR 3</option>
                        <option value="XITKR1">XI TKR 1</option>
                        <option value="XITKR2">XI TKR 2</option>
                        <option value="XITKR3">XI TKR 3</option>
                        <option value="XIITKR1">XII TKR 1</option>
                        <option value="XIITKR2">XII TKR 2</option>
                        <option value="XIITKR3">XII TKR 3</option>
                        <option value="XTKJ1">X TKJ 1</option>
                        <option value="XTKJ2">X TKJ 2</option>
                        <option value="XTKJ3">X TKJ 3</option>
                        <option value="XITKJ1">XI TKJ 1</option>
                        <option value="XITKJ2">XI TKJ 2</option>
                        <option value="XITKJ3">XI TKJ 3</option>
                        <option value="XIITKJ1">XII TKJ 1</option>
                        <option value="XIITKJ2">XII TKJ 2</option>
                        <option value="XIITKJ3">XII TKJ 3</option>
                        <option value="XTSM1">X TSM 1</option>
                        <option value="XTSM2">X TSM 2</option>
                        <option value="XTSM3">X TSM 3</option>
                        <option value="XITSM1">XI TSM 1</option>
                        <option value="XITSM2">XI TSM 2</option>
                        <option value="XITSM3">XI TSM 3</option>
                        <option value="XIITSM1">XII TSM 1</option>
                        <option value="XIITSM2">XII TSM 2</option>
                        <option value="XIITSM3">XII TSM 3</option>
                    </select>
                </div>
                <div class="form-grup">
                    <label for="kk">Kompetensi Kejuruan</label>
                    <select class="form-kontrol" name="kk" id="kk">
                        <option value="">-- Kompetensi Kejuruan --</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Elektronik Industri">Teknik Elektronik Industri</option>
                        <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                        <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                        <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>

                    </select>
                </div>
                <div>
                    <button class="tbl tbl-b" type="submit" name="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>