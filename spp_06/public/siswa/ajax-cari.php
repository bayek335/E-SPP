<?php
require '../../function/init.php';

$siswa = new Siswa();

if (isset($_GET['idk'])) {
    $datasiswa = $siswa->cari($nisn = null, $_GET['idk']);
}
?>


<table>
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
            <?php endif ?>
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
                            <button class="tbl tbl-m" type="submit" name="submit" value="hapus" onclick="konfirmasi(event, 'Anda yakin ingin menghapus data '+<?= $value['nisn'] ?>)">Hapus</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>