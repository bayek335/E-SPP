<?php
require '../../function/init.php';
$auth = new Auth();
$petugas = new Petugas();


if ($auth->ceklevel() != 'admin') {
    header('location:' . url);
}

if (isset($_POST['submit'])) {
    $data = $petugas->tambah($_POST);
}

$judul = 'Tambah Petugas atau Siswa';
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
            <h3 style="">PETUGAS / SISWA</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li><a href="<?= url ?>">Dashboard</a></li>
                <li><a href="<?= url ?>petugas/datapetugas.php">Petugas / Siswa</li></a>
                <li>Tambah Akun</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p" style="margin-top: 15px;justify-content: center">
        <div class="col-4" style="padding: 15px">
            <h4 style="margin-bottom: 15px ">Form Tambah Akun Petugas / Siswa</h4>
            <form action="" method="post">
                <div class="form-grup">
                    <label for="nama">Nama</label>
                    <input class="form-kontrol" type="text" name="nama" id="nama" placeholder="bayu pamungkas">
                </div>
                <div class="form-grup">
                    <label for="nama_pengguna">Nama Pengguna</label>
                    <input class="form-kontrol" type="text" name="nama_pengguna" id="nama_pengguna" placeholder="bayu1">
                </div>
                <div class="form-grup">
                    <label for="kata_sandi">Kata Sandi</label>
                    <input class="form-kontrol" type="text" name="kata_sandi" id="kata_sandi" placeholder="pilih sandi yang aman">
                </div>
                <div class="form-grup">
                    <label for="kata_sandi2">Ulangi Kata Sandi</label>
                    <input class="form-kontrol" type="password" name="kata_sandi2" id="kata_sandi2" placeholder="ulangi kata sandi pertama anda">
                </div>
                <div class="form-grup">
                    <label for="level">Level</label>
                    <select class="form-kontrol" name="level" id="level">
                        <option>-- PILIH --</option>
                        <option value="admin">ADMIN</option>
                        <option value="petugas">PETUGAS</option>
                        <option value="siswa">SISWA</option>
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