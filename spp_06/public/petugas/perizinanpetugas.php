<?php
require '../../function/init.php';
$judul = "Perizinan level";

include '../template/header.php';
?>
<div class="container izin-level">
    <div class="row bg-p b-sd" style="padding: 15px;">
        <div class="tbl-back" style="margin-right:15px; color: #0f5ea395">
            <a style="cursor:pointer" onclick="window.history.back()">
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>
        <div class="col">
            <h3 style="">PETUGAS / SISWA</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li><a href="<?= url ?>">Dashboard</a></li>
                <li><a href="<?= url ?>petugas/datapetugas.php">Petugas / Siswa</li></a>
                <li>Perizinan</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p bsd" style="margin-top: 15px;justify-content: center; padding: 15px; height:480px">
        <div class=" col-4">
            <h3 style="margin: 15px 0">Admin</h3>
            <p style="display: block;margin:5px 0">Akun yang memiliki level sebagai admin dapat mengakses</p>
            <p class="span bg-k">Halaman Home / Dashboard</p>
            <p class="span bg-k">Manajemen Siswa</p>
            <p class="span bg-k">Manajemen Kelas</p>
            <p class="span bg-k">Manajemen Spp</p>
            <p class="span bg-k">Manajemen Akun</p>
            <p class="span bg-k">Transaksi Pembayaran</p>
            <p class="span bg-k">Riwayat Pembayaran</p>
        </div>
        <div class="col-4">
            <h3 style="margin: 15px 0">Petugas</h3>
            <p>Akun dengan level sebagai Petugas dapat mengakses</p>
            <p class="span bg-k">Halaman Home / Dashboard</p>
            <p class="span bg-k">Perizinan Level</p>
            <p class="span bg-k">Transaksi Pembayaran</p>
            <p class="span bg-k">Riwayat Pembayaran</p>
        </div>
        <div class="col-4">
            <h3 style="margin: 15px 0">Siswa</h3>
            <p>Sebagai pengguna berlevel Siswa dapat mengakses</p>
            <p class="span bg-k">Riwayat Pembayaran</p>
            <p class="span bg-k">Halaman Home / Dashboard</p>
        </div>
    </div>
</div>
<?php include '../template/footer.php'; ?>