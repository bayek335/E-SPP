<?php
require '../../function/init.php';
$auth = new Auth();
$petugas = new Petugas();


if ($auth->ceklevel() != 'admin') {
    header('location:' . url);
}

$datapetugas = $petugas->ambil();
if (isset($_POST['submit'])) {
    $petugas->hapus($_POST['id_petugas']);
}

$judul = 'Data Petugas atau Siswa';
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
                <li>Petugas / Siswa</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p b-sd" style="margin-top: 15px;">
        <div class="col-1" style="padding: 0 15px;border-bottom:3px solid #0f5fa3">
            <a href="<?= url ?>petugas/tambahpetugas.php" class="tbl tbl-b">Tambah Petugas</a>
        </div>
        <div class="col-2 b-sd" style="padding: 15px;margin:15px 0">
            <h3>Tabel Akun Petugas / Siswa</h3>
            <table style="margin-top:15px">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Nama Pengguna</td>
                        <td>Level</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datapetugas as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['nama_pengguna'] ?></td>
                            <td><?= $value['level'] ?></td>
                            <td>
                                <a class="tbl tbl-h" href="<?= url ?>petugas/ubahpetugas.php?idp=<?= $value['id_petugas'] ?>">Ubah</a>
                                <form action="" method="post">
                                    <input type="hidden" name="id_petugas" value="<?= $value['id_petugas'] ?>">
                                    <button class="tbl tbl-m" type="submit" name="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>