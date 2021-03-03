<?php

class Pembayaran
{
    public function __construct()
    {
        global $koneksi;
        $auth = new Auth();

        $auth->ceklogin();
        $this->db = $koneksi;
    }

    //mengambil data pembayaran yang sudah lunas
    public function ambil($limit = null)
    {
        //jika ada permintaan limit maka akan menampilkan data dengan jumlah limit tersebut
        if (isset($limit)) {
            $pembayaran = $this->db->query("SELECT * FROM tb_pembayaran 
            JOIN tb_petugas ON tb_petugas.id_petugas=tb_pembayaran.id_petugas 
            WHERE status LIKE'%lunas%' ORDER BY tgl_bayar DESC LIMIT 3");
        }
        //dan jika tidak ada permintaan maka akan mengambil seluruh data 
        else {
            $pembayaran = $this->db->query("SELECT * FROM tb_pembayaran 
            JOIN tb_petugas ON tb_petugas.id_petugas=tb_pembayaran.id_petugas
            JOIN tb_spp ON tb_spp.id_spp=tb_pembayaran.id_spp
            WHERE status LIKE'%lunas%'
            ORDER BY tgl_bayar DESC ");
        }
        $datapembayaran = [];

        while ($p = $pembayaran->fetch_assoc()) {
            $datapembayaran[] = $p;
        }

        //ambil sum pemasukkan dalam kurun waktu 30 hari terakhir
        $sum30day = $this->db->query("SELECT SUM(jml_bayar) AS total FROM tb_pembayaran 
        JOIN tb_petugas ON tb_petugas.id_petugas=tb_pembayaran.id_petugas 
        WHERE tgl_bayar > NOW() - INTERVAL 30 DAY AND tgl_bayar <= NOW() AND status LIKE'%lunas%'");

        //ambil pemasukkan satu bulan pada bulan tertentu 
        $sum1m = $this->db->query("SELECT SUM(jml_bayar) AS total FROM tb_pembayaran 
        JOIN tb_petugas ON tb_petugas.id_petugas=tb_pembayaran.id_petugas 
        WHERE MONTH(tgl_bayar) = MONTH(CURDATE()) AND YEAR(tgl_bayar) <= YEAR(CURDATE()) AND status LIKE'%lunas%'");
        $data = [
            'data_pembayaran' => $datapembayaran,
            'sum30day' => $sum30day->fetch_assoc(),
            'sum1m' => $sum1m->fetch_assoc(),
        ];
        return $data;
    }

    //metod untuk menambah data pembayaran bersamaan dengan penambahan siswa
    public function tambah($post)
    {

        $nisn = $post['nisn'];
        $id_spp = $post['id_spp'];
        $status = 'Belum Bayar';
        $bulan_dibayar = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        if ($nisn != null && $id_spp != null) {
            foreach ($bulan_dibayar as $bulan) {
                $this->db->query("INSERT INTO tb_pembayaran VALUES (
                    '', '', '$nisn', '', '$bulan', '', '$id_spp', '', '$status'
                )");
            }
        }
    }

    //data untuk mencari siswa berdasarkan nisn
    public function cari($nisn, $idbayar = null)
    {
        if (isset($idbayar)) {

            $bayar = $this->db->query("SELECT * FROM tb_pembayaran
            JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn
            JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas
            JOIN tb_spp ON tb_spp.id_spp = tb_pembayaran.id_spp
            JOIN tb_petugas ON tb_petugas.id_petugas = tb_pembayaran.id_petugas
            WHERE tb_pembayaran.id_pembayaran='$idbayar' ");

            $datapembayaran = $bayar->fetch_assoc();

            return $datapembayaran;
        } else {

            if ($nisn != "") {
                if ($_SESSION['level']=='admin' || $_SESSION['level']=='petugas') {

                    $bayar = $this->db->query("SELECT * FROM tb_pembayaran
                    JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn
                    JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas
                    JOIN tb_spp ON tb_spp.id_spp = tb_pembayaran.id_spp
                    WHERE tb_pembayaran.nisn='$nisn'");

                }else{
                    $bayar = $this->db->query("SELECT * FROM tb_pembayaran
                    JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn
                    JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas
                    JOIN tb_spp ON tb_spp.id_spp = tb_pembayaran.id_spp
                    JOIN tb_petugas ON tb_petugas.id_petugas = tb_pembayaran.id_petugas
                    WHERE tb_pembayaran.nisn='$nisn'");
                }

                $datapembayaran = [];
                while ($p = $bayar->fetch_assoc()) {
                    $datapembayaran[] = $p;
                }

                return $datapembayaran;
            }
            return false;
        }
    }

    //menyimpan data bulan yang akan dibayar ke session 
    public function tambahbayar($nisn, $post)
    {
        $tambahbayar = [
            'id_pembayaran' => $post['id_pembayaran'],
            'status' => $post['status'],
            'bulan_dibayar' => $post['bulan_dibayar'],
            'nominal' => $post['nominal'],
            'nisn' => $nisn,
        ];
        $_SESSION['tambahbayar'] = $tambahbayar;

        return;
    }

    //memperbarui data pembayaran setelah petugas menekan tombol bayar pada menu transaksi
    public function simpan($nisn, $post)
    {
        $id = $post['id_pembayaran'];
        $id_petugas = $_SESSION['id_petugas'];
        $tgl_bayar = date('y-m-d h:i:s');
        $tahun_bayar = $post['tahun_bayar'];
        $jml_bayar = $post['jml_bayar'];
        $status = 'Lunas';

        if ($nisn != null && $jml_bayar != null) {
            if ($jml_bayar == $post['nominal']) {
                $this->db->query(
                    "UPDATE tb_pembayaran SET
                    id_petugas='$id_petugas', tgl_bayar='$tgl_bayar', tahun_bayar='$tahun_bayar', jml_bayar='$jml_bayar', status='$status'
                    WHERE nisn='$nisn' AND id_pembayaran='$id'"
                );
                if (mysqli_affected_rows($this->db) == 1) {
                    echo    "<script>
                                alert('Spp siswa dengan NISN " . $nisn . " berhasil dibayar');
                                document.location.href = '?nisn=" . $nisn . "'; 
                            </script>";
                }
                unset($_SESSION['tambahbayar']);
            } else {
                echo    "<script>
                            alert('Jumlah bayar yang anda masukkan tidak sesuai!!');
                        </script>";
                return false;
            }
        }
    }

    //memperbarui idspp siswa jika ada yang meminta perubahan (permintaan keringanan)
    public function pembaruansiswa($nisn, $idspp)
    {
        return  $this->db->query("UPDATE tb_pembayaran SET id_spp='$idspp' WHERE nisn='$nisn' AND status LIKE'%belum bayar%'");
    }

    //memfilter sebelum mencetak laporan
    public function filterpembayaran($post)
    {
        $tgl_awal = $post['tgl_awal'];
        $hingga_tgl = $post['hingga_tgl'];
        $hasil = $this->db->query("SELECT * FROM tb_pembayaran 
        JOIN tb_siswa ON tb_siswa.nisn = tb_pembayaran.nisn
        JOIN tb_kelas ON tb_kelas.id_kelas = tb_siswa.id_kelas
        JOIN tb_spp ON tb_spp.id_spp = tb_pembayaran.id_spp
        JOIN tb_petugas ON tb_petugas.id_petugas = tb_pembayaran.id_petugas
        WHERE status='Lunas' AND DATE(tgl_bayar)>='$tgl_awal' AND DATE(tgl_bayar)<='$hingga_tgl'  ");
        $datapembayaran = [];
        while ($p = $hasil->fetch_assoc()) {
            $datapembayaran[] = $p;
        }
        return $datapembayaran;
    }
}
