<?php

class Petugas
{
    public function __construct()
    {
        global $koneksi;
        $auth = new Auth();

        $auth->ceklogin();
        $this->db = $koneksi;
    }

    //metod untuk mengambil semua data petugas
    public function ambil($limit = null)
    {
        if (isset($limit)) {
            $petugas = $this->db->query("SELECT * FROM tb_petugas LIMIT $limit");
        } else {
            $petugas = $this->db->query("SELECT * FROM tb_petugas");
        }

        $datapetugas = [];
        while ($p = $petugas->fetch_assoc()) {
            $datapetugas[] = $p;
        }

        return $datapetugas;
    }

    //metod untuk menambah data petugas
    public function tambah($post)
    {
        $nama_pengguna = $post['nama_pengguna'];
        $kata_sandi = $post['kata_sandi'];
        $kata_sandi2 = $post['kata_sandi2'];
        $nama = $post['nama'];
        $level = $post['level'];

        if ($nama_pengguna != null && $nama != null) {

            $namaakun = $this->db->query("SELECT * FROM tb_petugas WHERE nama_pengguna = '$nama_pengguna'");

            if (mysqli_num_rows($namaakun) > 0) {
                echo "<script>
                            alert('Nama pengguna yang anda pilih telah digunakan telah digunakan');
                        </script>";
                return false;
            }

            if ($kata_sandi2 != $kata_sandi) {
                echo "<script>
                        alert('Kata sandi yang anda masukkan tidak sama')
                    </script>";
            } else {
                $sandi_baru = password_hash($kata_sandi2, PASSWORD_DEFAULT);

                $this->db->query("INSERT INTO tb_petugas VALUES (
                    '','$nama_pengguna','$sandi_baru','$nama','$level'
                )");

                if (mysqli_affected_rows($this->db) == 1) {
                    echo "<script>
                            alert('Data berhasil ditambahkan');
                            document.location.href = 'datapetugas.php';
                        </script>";
                } else {
                    echo "<script>
                            alert('Data gagal ditambahkan')
                        </script>";
                    return false;
                }
            }
        } else {
            echo "<script>
                    alert('Data gagal, masukkan nilai yang benar!!')
                </script>";
            return false;
        }
    }

    public function ubah($idp)
    {
        return $this->db->query("SELECT * FROM tb_petugas WHERE id_petugas='$idp'")->fetch_assoc();
    }

    //metod untuk menyimpan perubahan data
    public function simpan($idp, $post)
    {
        $nama_pengguna = $post['nama_pengguna'];
        $sandibaru = $post['sandibaru'];
        $sandibaru2 = $post['sandibaru2'];
        $nama = $post['nama'];
        $level = $post['level'];
        if ($sandibaru != null) {
            if ($sandibaru2 != $sandibaru) {
                echo "<script>
                    alert('Kata sandi yang anda masukkan tidak sama');
                    document.location.href = 'ubahpetugas.php?idp=" . $idp . "';
                </script>";
            } else {
                echo $sandi_baru = password_hash($sandibaru2, PASSWORD_DEFAULT);
                $this->db->query("UPDATE tb_petugas SET nama_pengguna='$nama_pengguna', kata_sandi='$sandi_baru', nama='$nama', level='$level' WHERE id_petugas='$idp'");
            }
        } else {
            $this->db->query("UPDATE tb_petugas SET nama_pengguna='$nama_pengguna', nama='$nama', level='$level' WHERE id_petugas='$idp'");
        }

        if (mysqli_affected_rows($this->db) == 1) {
            echo "<script>
                alert('Data berhasil diubah');
                document.location.href = 'datapetugas.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal diubah')
                document.location.href = 'datapetugas.php';
            </script>";
            return false;
        }
    }

    //metod untuk menghapus data petugas
    public function hapus($idp)
    {
        $this->db->query("DELETE FROM tb_petugas WHERE id_petugas='$idp'");
        if (mysqli_affected_rows($this->db) == 1) {
            echo "<script>
            alert('Data berhasil dihapus');
                        document.location.href = 'datapetugas.php';
                    </script>";
        } else {
            echo "<script>
                        alert('Data gagal dihapus');s
                        document.location.href = 'datapetugas.php';
                    </script>";
        }
    }
}
