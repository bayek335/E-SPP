<?php

class Spp
{
    public function __construct()
    {
        global $koneksi;
        $auth = new Auth();

        $auth->ceklogin();
        if ($auth->ceklevel() != 'admin') {
            header('location:' . url);
        }
        $this->db = $koneksi;
    }

    //mengambil data spp dari tabel
    public function ambil()
    {

        $spp = $this->db->query("SELECT * FROM tb_spp  ORDER BY tahun DESC");

        $dataspp = [];
        while ($s = $spp->fetch_assoc()) {
            $dataspp[] = $s;
        }

        return $dataspp;
    }

    public function tambah($post)
    {
        $tahun = $post['tahun'];
        $nominal = $post['nominal'];
        $keterangan = $post['keterangan'];
        if ($tahun != null && $nominal != null && $keterangan != null) {
            $this->db->query("INSERT INTO tb_spp VALUES (
                '', '$tahun', '$nominal', '$keterangan'
            )");

            if (mysqli_affected_rows($this->db) == 1) {
                echo "<script>
                        alert('Spp baru berhasil ditambahkan');
                        document.location.href = 'dataspp.php';
                    </script>";
            } else {
                echo "<script>
                        alert('Spp baru gagal ditambahkan')
                    </script>";
                return false;
            }
        } else {
            echo "<script>
                    alert('Masukkan nilai dengan benar')
                </script>";
            return false;
        }
    }

    public function ubah($idspp)
    {
        return $this->db->query("SELECT * FROM tb_spp WHERE id_spp='$idspp'")->fetch_assoc();
    }

    //metod untuk menyimpan perubahan data
    public function simpan($idspp, $post)
    {
        $tahun = $post['tahun'];
        $nominal = $post['nominal'];
        $keterangan = $post['keterangan'];

        $this->db->query("UPDATE tb_spp SET tahun='$tahun', nominal='$nominal', keterangan='$keterangan' WHERE id_spp='$idspp'");

        if (mysqli_affected_rows($this->db) == 1) {
            echo "<script>
                alert('Spp dengan id " . $idspp . " berhasil diubah');
                document.location.href = 'dataspp.php';
            </script>";
        } else {
            echo "<script>
                alert('Spp dengan id " . $idspp . " gagal diubah')
                document.location.href = 'dataspp.php';
            </script>";
            return false;
        }
    }

    //metod untuk menghapus data spp
    public function hapus($idspp)
    {
        $this->db->query("DELETE FROM tb_spp WHERE id_spp='$idspp'");
        if (mysqli_affected_rows($this->db) == 1) {
            echo "<script>
            alert('spp dengan id " . $idspp . " berhasil dihapus');
                        document.location.href = 'dataspp.php';
                    </script>";
        } else {
            echo "<script>
                        alert('spp dengan id " . $idspp . " gagal dihapus');s
                        document.location.href = 'dataspp.php';
                    </script>";
        }
    }
}
