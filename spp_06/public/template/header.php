<?php
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'keluar') {
        $auth = new Auth();
        $auth->keluar();
    }
}

$server = $_SERVER['REQUEST_URI'];
$uri = explode('/', $server);

$uri2 = $uri[count($uri) - 2];
$urilast = $uri[count($uri) - 1];

if (isset($_GET['nisn'])) {
    $getnisn = 'transaksi.php?nisn=' . $_GET['nisn'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= url ?>assets/custom.style.css">
    <link rel="stylesheet" href="<?= url ?>assets/navbar.style.css">
    <link rel="stylesheet" href="<?= url ?>assets/font-awesome/css/font-awesome.css">

    <title><?= $judul ?></title>
</head>
<div class="background-dark"></div>
<div class="navbar">
    <div class="navSpan">
        <?php if (isset($_SESSION['nama'])) : ?>
            <div id="tbl-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        <?php endif; ?>
        <h3 style="font-weight: bold">SIP-SPP SMKN1 .......</h3>
    </div>
    <?php if (isset($_SESSION['nama'])) : ?>
        <div class="navProfil">
            <p><?= $_SESSION['nama'] ?></p>
        </div>
    <?php endif; ?>
</div>
<?php if (isset($_SESSION['level'])) : ?>
    <div class="sidebar">
        <div class="sidebar-span">
            <img src="<?= url ?>assets/images/logo.png" alt="">
            <p style="font-size: 16px;text-decoration: underline"><?= (isset($_SESSION['level'])) ? $_SESSION['level'] : '' ?></p>
        </div>
        <div style=" padding: 0 10px;">
            <ul>
                <li class="menu">
                    <a class="<?= ($uri2 == 'public') ? 'active' : '' ?>" href="<?= url ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') : ?>
                    <li id="smenu1" class="menu">
                        <a id="tbl-menu1" onclick="tblmenu1();" class="<?= ($uri2 == 'siswa') || ($uri2 == 'kelas') ? 'active' : '' ?>">
                            <i class="fa fa-users"></i>Siswa<i class="fa fa-chevron-right <?= ($urilast == 'datasiswa.php') || ($urilast == 'datakelas.php') ? 'active' : '' ?>"></i>
                        </a>
                        <ul class="smenu <?= ($urilast == 'datasiswa.php') || ($urilast == 'datakelas.php') ? 'active' : '' ?>">
                            <li><a href="<?= url ?>siswa/datasiswa.php"></i>Data Siswa</a></li>
                            <?php if ($_SESSION['level'] == 'admin') : ?>
                                <li><a href="<?= url ?>kelas/datakelas.php"></i>Data Kelas</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if ($_SESSION['level'] == 'admin') : ?>
                        <li class="menu">
                            <a class="<?= ($uri2 == 'spp') ? 'active' : '' ?>" href="<?= url ?>spp/dataspp.php"><i class="fa fa-calendar"></i>Spp</a>
                        </li>
                    <?php endif; ?>
                    <li id="smenu2" class="menu">
                        <a id="tbl-menu2" onclick="tblmenu2();" class="<?= ($uri2 == 'petugas') ? 'active' : '' ?>">
                            <i class="fa fa-envelope"></i>Akun<i class="fa fa-chevron-right <?= ($uri2 == 'petugas') ? 'active' : '' ?>"></i>
                        </a>
                        <ul class="smenu <?= ($uri2 == 'petugas') ? 'active' : '' ?>">
                            <?php if ($_SESSION['level'] == 'admin') : ?>
                                <li><a href="<?= url ?>petugas/datapetugas.php">Petugas / Siswa</a></li>
                            <?php endif; ?>
                            <li><a href="<?= url ?>petugas/perizinanpetugas.php">Perizinan Level</a></li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a class="<?= (isset($getnisn) ? $urilast == $getnisn : $urilast == 'transaksi.php')  ? 'active' : '' ?>" href="<?= url ?>bayar/transaksi.php"><i class="fa fa-money"></i>Pembayaran</a>
                    </li>
                <?php endif; ?>
                <li class="menu">
                    <a class="<?= ($urilast == 'riwayatbayar.php') ? 'active' : '' ?>" href="<?= url ?>bayar/riwayatbayar.php"><i class="fa fa-history"></i>Riwayat Pembayaran</a>
                </li>
                <?php if (isset($_SESSION['level'])) : ?>
                    <li class="tbl-keluar">
                        <form action="" method="POST">
                            <button type="submit" name="submit" value="keluar" onclick="konfirmasi(event, 'Anda yakin mau keluar??')" class="tbl tbl-m"><i class="fa fa-sign-out"></i>Keluar</button>
                        </form>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>


<body>