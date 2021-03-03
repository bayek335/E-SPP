<?php

class Kelas
{
    public function __construct()
    {
        global $koneksi;
        $this->auth = new Auth();

        $this->auth->ceklogin();
        $this->db = $koneksi;
    }

    //Mengambil data siswa
    public function ambil($limit = null)
    {
        if (isset($limit)) {
            $kelas = $this->db->query("SELECT * FROM tb_kelas ORDER BY kompetensi_keahlian ASC LIMIT $limit");
        } else {
            $kelas = $this->db->query("SELECT * FROM tb_kelas  ORDER BY nama_kelas ASC");
        }
        $datakelas = [];
        while ($k = $kelas->fetch_assoc()) {
            $datakelas[] = $k;
        }

        return $datakelas;
    }

    //menambah data siswa
    public function tambah($post)
    {
        //mengecek level pada session
        if ($this->auth->ceklevel() != 'admin') {
            header('location:' . url);
        }

        $nama_kelas = $post['nama_kelas'];
        $kompetensi_keahlian = $post['kk'];
        if ($nama_kelas != null && $kompetensi_keahlian != null) {
            $this->db->query("INSERT INTO tb_kelas VALUES (
                '', '$nama_kelas', '$kompetensi_keahlian'
            )");

            if (mysqli_affected_rows($this->db) == 1) {
                echo "<script>
                        alert('Kelas baru berhasil ditambahkan');
                        document.location.href = 'datakelas.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Kelas baru gagal ditambahkan')
                    </script>";
                return false;
            }
        } else {
            echo "<script>
                    alert('Pilih kelas dan kompetensi keahlian dengan benar')
                </script>";
            return false;
        }
    }

    //mengambil data siswa tertentu dan mengirimkan ke form ubah siswa
    public function ubah($idk)
    {
        //mengecek level pada session
        if ($this->auth->ceklevel() != 'admin') {
            header('location:' . url);
        }
        return $this->db->query("SELECT * FROM tb_kelas WHERE id_kelas='$idk'")->fetch_assoc();
    }

    //metod untuk menyimpan perubahan data
    public function simpan($idk, $post)
    {
        //mengecek level pada session
        if ($this->auth->ceklevel() != 'admin') {
            header('location:' . url);
        }
        $nama_kelas = $post['nama_kelas'];
        $kompetensi_keahlian = $post['kk'];

        $this->db->query("UPDATE tb_kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$idk'");

        if (mysqli_affected_rows($this->db) == 1) {
            echo "<script>
                alert('Kelas dengan id " . $idk . " berhasil diubah');
                document.location.href = 'datakelas.php';
            </script>";
        } else {
            echo "<script>
                alert('Kelas dengan id " . $idk . " gagal diubah')
                document.location.href = 'datakelas.php';
            </script>";
            return false;
        }
    }

    //metod untuk menghapus data kelas
    public function hapus($idk)
    {
        //mengecek level pada session
        if ($this->auth->ceklevel() != 'admin') {
            header('location:' . url);
        }
        $this->db->query("DELETE FROM tb_kelas WHERE id_kelas='$idk'");
        if (mysqli_affected_rows($this->db) == 1) {
            echo "<script>
            alert('Kelas dengan id " . $idk . " berhasil dihapus');
                        document.location.href = 'datakelas.php';
                    </script>";
        } else {
            echo "<script>
                        alert('Kelas dengan id " . $idk . " gagal dihapus');s
                        document.location.href = 'datakelas.php';
                    </script>";
        }
    }
}
