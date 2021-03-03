<?php
require '../../function/init.php';

$kelas = new Kelas();

$datakelas = $kelas->ambil();

if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "hapus") {
        $kelas->hapus($_POST['id_kelas']);
    }
}

$judul = 'Data Kelas atau Siswa';
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
                <li>Kelas</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p " style="margin-top:1%; padding-bottom: 15px">
        <?php if (!isset($_GET['idk'])) : ?>
            <div class=" col-1 b-sd" style="border-bottom: 3px solid #0f5fa3 ; padding: 5px 15px">
                <a href="<?= url ?>kelas/tambahkelas.php" class="tbl tbl-b">Tambah Kelas</a>
                <a href="<?= url ?>kelas/cetakkelas.php" class="tbl tbl-h">Cetak</a>
            </div>
        <?php endif; ?>
        <div class="col bg-p b-sd" style="padding: 15px; margin: 1% 1% 0 0">
            <table>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kelas</td>
                        <td>Kompetensi Keahlian</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datakelas as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td><?= $value['kompetensi_keahlian'] ?></td>
                            <td>
                                <a class="tbl tbl-h" href="<?= url ?>kelas/ubahkelas.php?idk=<?= $value['id_kelas'] ?>">Ubah</a>
                                <form action="" method="post">
                                    <input type="hidden" name="id_kelas" value="<?= $value['id_kelas'] ?>">
                                    <button class="tbl tbl-m" type="submit" name="submit" value="hapus" onclick="konfirmasi(event, 'Anda yakin ingin menghapus data ini')">Hapus</button>
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