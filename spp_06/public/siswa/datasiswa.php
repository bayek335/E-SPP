<?php
require '../../function/init.php';

$siswa = new Siswa();
$kelas = new Kelas();

$datakelas = $kelas->ambil();
$datasiswa = $siswa->ambil();
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "hapus") {
        $siswa->hapus($_POST['nisn']);
    }
}

$judul = 'Data Siswa SMKN 1 Kepanjen';
include '../template/header.php';
?>

<div class="container">
    <div id="user-level" data-level="<?= $_SESSION['level'] ?>"></div>
    <div class="row bg-p b-sd" style="padding: 15px;">
        <div class="tbl-back" style="margin-right:15px; color: #0f5ea395">
            <a style="cursor:pointer" onclick="window.history.back()">
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>
        <div class="col">
            <h3 style="">SISWA</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li><a href="<?= url ?>">Dashboard</a></li>
                <li>Siswa</li>
            </ul>
        </div>
    </div>

    <div class="row bg-p" style="margin-top: 1%;">
        <div class=" col-1" style="border-bottom: 3px solid #0f5fa3 ; padding: 5px 15px">
            <div class="row" style="justify-content: space-between">
                <div class="col-2">
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                        <a href="<?= url ?>siswa/tambahsiswa.php" class="tbl tbl-b">Tambah siswa</a>
                        <a id="tbl-cetak-siswa" href="<?= url ?>siswa/cetaksiswa.php" class="tbl tbl-h">Cetak</a>
                    <?php endif; ?>
                </div>
                <div class="col-3">
                    <form action="" method="get">
                        <div class="form-grup">
                            <select id="cari" type="text" name="" id="" class="form-kontrol" placeholder="Cari berdasarkan kelas" style="margin:5px 0 5px 0">
                                <option value="0">-- Filter kelas --</option>
                                <?php foreach ($datakelas as $kelas) : ?>
                                    <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col b-sd" style="padding: 15px">
            <h3 style="margin-bottom: 15px">Table Siswa</h3>
            <table id="data-tbl">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>NISN</td>
                        <td>NIS</td>
                        <td>Nama Siswa</td>
                        <td>Kelas</td>
                        <td>Alamat</td>
                        <td>No Telp</td>
                        <td>SPP</td>
                        <td>Status</td>
                        <?php if ($_SESSION['level'] == 'admin') : ?>
                            <td>Aksi</td>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datasiswa as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['nis'] ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td><?= $value['nama_kelas'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td><?= $value['no_telp'] ?></td>
                            <td><?= $value['tahun'] . '/' . $value['keterangan'] ?></td>
                            <td><?= $value['status_siswa'] ?></td>
                            <?php if ($_SESSION['level'] == 'admin') : ?>
                                <td>
                                    <a class="tbl tbl-h" href="<?= url ?>siswa/ubahsiswa.php?nisn=<?= $value['nisn'] ?>">Ubah</a>
                                    <form action="" method="post">
                                        <input type="hidden" name="nisn" value="<?= $value['nisn'] ?>">
                                        <button class="tbl tbl-m" type="submit" name="submit" value="hapus" onclick="konfirmasi(event, 'Anda yakin ingin menghapus data '+<?= $value['nama_siswa'] ?>)">Hapus</button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../template/footer.php'; ?>