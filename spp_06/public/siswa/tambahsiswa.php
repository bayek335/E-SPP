<?php
require '../../function/init.php';

$kelas = new Kelas();
$spp = new Spp();
$siswa = new Siswa();
$pembayaran = new Pembayaran();

$dataspp = $spp->ambil();
$datakelas = $kelas->ambil();

if (isset($_POST['submit'])) {
    if ($siswa->tambah($_POST) == true) {
        $pembayaran->tambah($_POST);
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href='" . url . "siswa/datasiswa.php';
        </script>";
    }
}

$judul = 'Tambah Data Siswa SMKN1 Kepanjen';
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
            <h3 style="">SISWA</h3>
        </div>
        <div class="col">
            <ul class="breadcrumb">
                <li><a href="<?= url ?>">Dashboard</a></li>
                <li><a href=" <?= url ?>siswa/datasiswa.php">Siswa</a></li>
                <li>Tambah Siswa</li>
            </ul>
        </div>
    </div>
    <div class="row bg-p b-sd" style="padding: 15px 0; margin-top:1%; justify-content: center">
        <div class="col-4" style="padding: 15px">
            <form action="" method="post">
                <h4>Form Tambah Siswa</h4>
                <div class="form-grup">
                    <label for="nisn">NISN</label>
                    <input class="form-kontrol" type="number" maxlength="10" name="nisn" id="nisn">
                </div>
                <div class="form-grup">
                    <label for="nis">NIS</label>
                    <input class="form-kontrol" type="text" maxlength="8" name="nis" id="nis">
                </div>
                <div class="form-grup">
                    <label for="nama_siswa">Nama</label>
                    <input class="form-kontrol" type="text" name="nama_siswa" id="nama_siswa">
                </div>
                <div class="form-grup">
                    <label for="id_kelas">Kelas</label>
                    <select class="form-kontrol" name="id_kelas" id="id_kelas">
                        <option>-- Kelas --</option>
                        <?php foreach ($datakelas as $kelas) : ?>
                            <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-grup">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-kontrol" name="alamat" id="alamat"></textarea>
                </div>
                <div class="form-grup">
                    <label for="no_telp">No Telepon</label>
                    <input class="form-kontrol" type="text" name="no_telp" id="no_telp">
                </div>
                <div class="form-grup">
                    <label for="id_spp">SPP</label>
                    <select class="form-kontrol" name="id_spp" id="id_spp">
                        <option>-- SPP --</option>
                        <?php foreach ($dataspp as $spp) : ?>
                            <option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'] . '/' . $spp['keterangan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-grup">
                    <label for="status_siswa">Status</label>
                    <select class="form-kontrol" name="status_siswa" id="status_siswa">
                        <option value="siswa">Siswa</option>
                        <option value="keluar / pindah">Pindah / Keluar</option>
                        <option value="alumni">Alumni</option>
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