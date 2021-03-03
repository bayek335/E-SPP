<?php
require '../../function/init.php';
$auth = new Auth();
$petugas = new Petugas();

if ($auth->ceklevel() != 'admin') {
    header('location:' . url);
}

$datapetugas = $petugas->ubah($_GET['idp']);
if (isset($_POST['submit'])) {
    $petugas->simpan($_GET['idp'], $_POST);
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
                <li>Ubah Akun</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p" style="margin-top: 15px;justify-content: center">
        <div class="col-4" style="padding: 15px">
            <h4 style="margin-bottom: 15px ">Form Ubah Akun Petugas / Siswa</h4>
            <form action="" method="post">
                <div class="form-grup">
                    <label for="nama">Nama</label>
                    <input class="form-kontrol" type="text" name="nama" id="nama" value="<?= $datapetugas['nama'] ?>">
                </div>
                <div class="form-grup">
                    <label for="nama_pengguna">Nama Pengguna</label>
                    <input class="form-kontrol" type="text" name="nama_pengguna" id="nama_pengguna" value="<?= $datapetugas['nama_pengguna'] ?>">
                </div>
                <div class="form-grup">
                    <label for="sandibaru">Ubah Kata Sandi</label>
                    <input class="form-kontrol" type="text" name="sandibaru" id="sandibaru" placeholder="Isi field ini jika ingin mengganti kata sandi">
                </div>
                <div class="form-grup">
                    <label for="sandibaru2">Ulangi Kata Sandi</label>
                    <input class="form-kontrol" type="password" name="sandibaru2" id="sandibaru2">
                </div>
                <div class="form-grup">
                    <label for="level">Level</label>
                    <select class="form-kontrol" name="level" id="level">
                        <option>-- PILIH --</option>
                        <option <?= ($datapetugas['level'] == "admin") ? "selected" : ""  ?> value="admin">ADMIN</option>
                        <option <?= ($datapetugas['level'] == "petugas") ? "selected" : ""  ?> value="petugas">PETUGAS</option>
                        <option <?= ($datapetugas['level'] == "siswa") ? "selected" : ""  ?> value="siswa">SISWA</option>
                    </select>
                </div>
                <div>
                    <button class="tbl tbl-h" type="submit" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>