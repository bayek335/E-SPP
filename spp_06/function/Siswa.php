<?php

class Siswa
{
    public function __construct()
    {
        global $koneksi;
        $auth = new Auth();

        $auth->ceklogin();
        $this->db = $koneksi;
    }

    //Metod untuk mengambil data siswa
    public function ambil($limit = null)
    {
        if (isset($limit)) {
            $siswa = $this->db->query("SELECT * FROM tb_siswa ORDER BY id_kelas DESC LIMIT $limit");
        } else {
            $siswa = $this->db->query("SELECT * FROM tb_siswa
            JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas
            JOIN tb_spp ON tb_spp.id_spp = tb_siswa.id_spp
            ORDER BY nama_siswa ASC");
        }
        $datasiswa = [];
        while ($s = $siswa->fetch_assoc()) {
            $datasiswa[] = $s;
        }

        return $datasiswa;
    }

    //Metod untuk menambah data siswa 
    public function tambah($post)
    {
        $nisn = $post['nisn'];
        $nis = $post['nis'];
        $nama_siswa = $post['nama_siswa'];
        $id_kelas = $post['id_kelas'];
        $alamat = $post['alamat'];
        $no_telp = $post['no_telp'];
        $id_spp = $post['id_spp'];
        $status_siswa = $post['status_siswa'];

        if ($nisn != null && $nis != null && $nama_siswa != null && $id_kelas != null && $id_spp != null) {

            $ambil = $this->db->query("SELECT * FROM tb_siswa WHERE nisn='$nisn' OR nis='$nis' ");
            if (mysqli_num_rows($ambil) > 0) {
                echo "<script>
                    alert('NISN atau NIS yang anda masukkan telah digunakan seorang siswa, ganti nis atau nisn yang baru!!')
                </script>";
                return false;
            } else {
                $this->db->query("INSERT INTO tb_siswa VALUES (
                '$nisn', '$nis', '$nama_siswa', '$id_kelas', '$alamat', '$no_telp', '$id_spp', '$status_siswa'
            )");

                if (mysqli_affected_rows($this->db) == 1) {
                    return true;
                } else {
                    echo "<script>
                        alert('Data " . $nama_siswa . " gagal ditambahkan')
                    </script>";
                    return false;
                }
            }
        } else {
            echo "<script>
                    alert('Masukkan nilai dengan benar')
                </script>";
            return false;
        }
    }

    //Metod untuk mencari ddata siswa sebelum transaksi
    public function cari($nisn, $idk = null)
    {
        if ($nisn == null && isset($idk)) {
            $kel = $this->db->query("SELECT * FROM tb_siswa 
            JOIN tb_kelas ON tb_kelas.id_kelas=tb_siswa.id_kelas 
            JOIN tb_spp ON tb_spp.id_spp=tb_siswa.id_spp 
            WHERE tb_siswa.id_kelas='$idk' ORDER BY nama_siswa ASC");

            $datakelas = [];
            while ($k = $kel->fetch_assoc()) {
                $datakelas[] = $k;
            }

            return $datakelas;
        } else {
            return $this->ubah($nisn);
        }
    }

    //Metod untuk mencari data siswa yang akan diubah
    public function ubah($nisn)
    {
        return $this->db->query("SELECT * FROM tb_siswa
        JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas
        JOIN tb_spp ON tb_spp.id_spp = tb_siswa.id_spp
        WHERE nisn='$nisn'
        ")->fetch_assoc();
    }

    //metod untuk menyimpan perubahan data
    public function simpan($nisn, $post)
    {
        if ($nisn != "" && $post['nama_siswa'] != null && $post['id_kelas'] != null && $post['id_spp'] != null) {

            $nis = $post['nis'];
            $nama_siswa = $post['nama_siswa'];
            $id_kelas = $post['id_kelas'];
            $alamat = $post['alamat'];
            $no_telp = $post['no_telp'];
            $id_spp = $post['id_spp'];
            $status_siswa = $post['status_siswa'];

            $this->db->query("UPDATE tb_siswa 
            SET nisn='$nisn', nis='$nis', nama_siswa='$nama_siswa', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp', status_siswa='$status_siswa'
            WHERE nisn='$nisn'");

            if (mysqli_affected_rows($this->db) == 1) {
                echo "<script>
                    alert('Siswa dengan NISN " . $nisn . " berhasil diubah');
                    document.location.href = 'datasiswa.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Siswa dengan NISN " . $nisn . " gagal diubah, ada field yang belum terisi!!')
                document.location.href = 'ubahsiswa.php?nisn=" . $nisn . "';
            </script>";
            return false;
        }
    }

    //metod untuk menghapus data siswa
    public function hapus($nisn)
    {
        $this->db->query("DELETE FROM tb_siswa WHERE nisn='$nisn'");
        if (mysqli_affected_rows($this->db) == 1) {
            echo "<script>
            alert('Siswa dengan NISN " . $nisn . " berhasil dihapus');
                        document.location.href = 'datasiswa.php';
                    </script>";
        } else {
            echo "<script>
                        alert('Siswa dengan NISN " . $nisn . " gagal dihapus');s
                        document.location.href = 'datasiswa.php';
                    </script>";
        }
    }
}
