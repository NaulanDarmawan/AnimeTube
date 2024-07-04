<?php

class Berita_model
{
    private $table = 'berita';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllNews()
    {
        $this->db->query("SELECT user.nama, berita.*
        FROM {$this->table}
        INNER JOIN user ON user.id = berita.user_id");
        return $this->db->resultSet();
    }

    public function getNewsBySlug($slug)
    {
        $this->db->query("SELECT user.nama, berita.*
        FROM {$this->table}
        INNER JOIN user ON user.id = berita.user_id
        WHERE slug_judul=:slug_judul");
        $this->db->bind('slug_judul', $slug);

        return $this->db->single();
    }

    public function getNewsByJudulOrDesc($judul)
    {
        if (!isset($judul)) {
            $this->db->query("SELECT * FROM {$this->table}");
            return $this->db->resultSet();
        } else {
            $this->db->query("SELECT * FROM {$this->table} WHERE judul like :judul OR deskripsi like :judul");
            $this->db->bind('judul', "%" . $judul . "%");
            return $this->db->resultSet();
        }
    }

    public function tambahDataBerita()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form
            $judul = htmlspecialchars($_POST['judul']);
            $deskripsi = htmlspecialchars($_POST['deskripsi']);
            //$user_id = $_SESSION['user_id']; // Asumsi user_id disimpan di sesi pengguna yang login
            $foto = '';

            // Proses file upload
            if (!empty($_FILES['foto']['name'])) {
                $targetDir = "assets/images/";
                $targetFile = $targetDir . basename($_FILES["foto"]["name"]);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Memastikan file adalah gambar
                $check = getimagesize($_FILES["foto"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
                        $foto = basename($_FILES["foto"]["name"]);
                    } else {
                        $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Gagal mengunggah gambar.', 'aksi' => ''];
                        header('Location: ' . BASEURL . '/admin/berita');
                        exit;
                    }
                } else {
                    $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'File bukan gambar.', 'aksi' => ''];
                    header('Location: ' . BASEURL . '/admin/berita');
                    exit;
                }
            } else {
                $foto = 'assets/images/anime.jpg'; // Default image
            }

            // Generate slug dari judul
            $slug_judul = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul));

            // Simpan ke database
            $query = "INSERT INTO {$this->table} (judul, slug_judul, deskripsi, foto, waktu_upload, user_id) VALUES (:judul, :slug_judul, :deskripsi, :foto, NOW(), :user_id)";
            $this->db->query($query);
            $this->db->bind('judul', $judul);
            $this->db->bind('slug_judul', $slug_judul);
            $this->db->bind('deskripsi', $deskripsi);
            $this->db->bind('foto', $foto);
            $this->db->bind('user_id', $_SESSION['user']['id']);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function updateDataBerita()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form
            $slug_judul = htmlspecialchars($_POST['id']); // menggunakan slug_judul sebagai ID
            $judul = htmlspecialchars($_POST['judul']);
            $deskripsi = htmlspecialchars($_POST['deskripsi']);
            $foto = '';

            // Proses file upload jika ada file baru yang diupload
            if (!empty($_FILES['foto']['name'])) {
                $targetDir = "assets/images/";
                $targetFile = $targetDir . basename($_FILES["foto"]["name"]);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Memastikan file adalah gambar
                $check = getimagesize($_FILES["foto"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
                        $foto = basename($_FILES["foto"]["name"]);
                    } else {
                        $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Gagal mengunggah gambar.', 'aksi' => ''];
                        header('Location: ' . BASEURL . '/admin/berita');
                        exit;
                    }
                } else {
                    $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'File bukan gambar.', 'aksi' => ''];
                    header('Location: ' . BASEURL . '/admin/berita');
                    exit;
                }
            } else {
                $foto = $_POST['current_foto']; // Menggunakan gambar lama jika tidak ada yang diupload

                // Menggunakan gambar default jika dihapus
                if ($_POST['delete_foto'] == 'true') {
                    $foto = 'anime.jpg'; // Gambar default
                }
            }

            // Update ke database
            $query = "UPDATE {$this->table} SET judul = :judul, deskripsi = :deskripsi, foto = :foto, waktu_update = NOW() WHERE slug_judul = :slug_judul";
            $this->db->query($query);
            $this->db->bind('judul', $judul);
            $this->db->bind('deskripsi', $deskripsi);
            $this->db->bind('foto', $foto);
            $this->db->bind('slug_judul', $slug_judul);

            if ($this->db->execute()) {
                $_SESSION['flash'] = ['tipe' => 'success', 'pesan' => 'Berita', 'aksi' => 'diperbarui'];
            } else {
                $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Terjadi kesalahan saat menyimpan data.', 'aksi' => ''];
            }
        }
    }


    public function hapusDataBerita($slug)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE slug_judul=:slug_judul");
        $this->db->bind('slug_judul', $slug);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
