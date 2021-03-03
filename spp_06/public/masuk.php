<?php
require '../function/init.php';

if (isset($_SESSION['level'])) {
    header('location:' . url);
}
$auth = new Auth();

if (isset($_POST['submit'])) {
    $auth->masuk($_POST);
}

$judul = 'Sistem Pembayaran SPP kanesa';
include 'template/header.php';
?>

<div class="container bg-p" style="padding: 5%;">
    <div class="row" style="justify-content: center">
        <div class="col-4 b-sd" style="padding: 25px">
            <div class="row" style="border-bottom: 1px solid #d3d3d3;padding: 15px">
                <div class="col-4">
                    <img src="<?= url ?>assets/images/logo.png" alt="">
                </div>
                <div class="col" style="text-align: center">
                    <h3 style="font-weight:bold">SISTEM INFORMASI PEMBAYARAN SPP SMKN1 KEPANJEN</h3>
                </div>
            </div>
            <form action="" method="post">
                <div class="form-grup">
                    <label for="nama_pengguna">Nama Pengguna</label>
                    <input class="form-kontrol" type="text" name="nama_pengguna" id="nama_pengguna" placeholder="Nama pengguna">
                </div>
                <div class="form-grup">
                    <label for="pwd">Kata Sandi</label>
                    <div class="form-kontrol" style="padding: 7px 5px">
                        <input type="password" name="kata_sandi" id="pwd" style="border:none;width: 88%;display: inline" placeholder="Kata sandi"><i id="tbl-show-pwd" class="fa fa-eye" onclick="show_pwd()" style="cursor:pointer;margin-left: 15px;"></i>
                    </div>

                </div>
                <div style="text-align: center;margin-top: 20px">
                    <button class="tbl tbl-b" type="submit" name="submit" style="">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>