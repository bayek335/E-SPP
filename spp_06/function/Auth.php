<?php

class Auth
{
    public function __construct()
    {
        global $koneksi;
        $this->db = $koneksi;
    }

    public function masuk($post)
    {
        $nama_pengguna = mysqli_real_escape_string($this->db, $post['nama_pengguna']);
        $kata_sandi = mysqli_real_escape_string($this->db, $post['kata_sandi']);

        if ($nama_pengguna != null && $kata_sandi != null) {

            $petugas = $this->db->query("SELECT * FROM tb_petugas WHERE nama_pengguna='$nama_pengguna'")->fetch_assoc();
            $sandi = password_verify($kata_sandi, $petugas['kata_sandi']);

            if ($petugas == true) {
                if ($nama_pengguna == $petugas['nama_pengguna'] && $kata_sandi == $sandi) {
                    $_SESSION['id_petugas'] = $petugas['id_petugas'];
                    $_SESSION['nama'] = $petugas['nama'];
                    $_SESSION['nama_pengguna'] = $petugas['nama_pengguna'];
                    $_SESSION['level'] = $petugas['level'];
                    header('location:' . url);
                }
            } else {
                echo "<script>alert('Nama pengguna atau Kata sandi belum terdaftar')</script>";
            }
        } else {
            echo "<script>alert('Nama pengguna atau Kata sandi belum terisi')</script>";
        }
    }

    //mengecek apakah user telah masuk atau belu ketika mengakses setiap halaman
    public function ceklogin()
    {
        if (!isset($_SESSION['level'])) {
            header('location:' . url . 'masuk.php');
        } else {
            return true;
        }
    }

    //mengecek level masing masing user ketika mengakses suatu halaman
    public function ceklevel()
    {
        if ($_SESSION['level'] == 'admin') {
            return 'admin';
        } elseif ($_SESSION['level'] == 'petugas') {
            return 'petugas';
        } else {
            return 'siswa';
        }
    }

    //menghapus sessi user ketika telah keluar dari website
    public function keluar()
    {
        session_destroy();
        header('location:' . url . 'masuk.php');
    }
}
