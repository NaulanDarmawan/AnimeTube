<?php

class Anime_model
{
    private $table = 'anime';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAnimes()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultSet();
    }

    public function getAnimesBySlug($slug)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE slug_nama=:slug_nama");
        $this->db->bind('slug_nama', $slug);

        return $this->db->single();
    }

    public function getAnimesByJudulOrSinopsis($judul)
    {
        if (!isset($judul)) {
            $this->db->query("SELECT * FROM {$this->table}");
            return $this->db->resultSet();
        } else {
            $this->db->query("SELECT * FROM {$this->table} WHERE nama like :judul OR sinopsis like :judul");
            $this->db->bind('judul', "%" . $judul . "%");
            return $this->db->resultSet();
        }
    }

    public function getEpisodesBySlug($slug)
    {
        $this->db->query("SELECT * FROM episode WHERE id_anime = :slug");
        $this->db->bind('slug', $slug);
        return $this->db->resultSet();
    }

    public function getAnimeGenre($genre)
    {
        $this->db->query("SELECT nama FROM genre WHERE id = :id");
        $this->db->bind('id', $genre);
        return $this->db->single();
    }

    public function tambahDataAnime()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form
            $judul = htmlspecialchars($_POST['judul']);
            $deskripsi = htmlspecialchars($_POST['deskripsi']);
            $id_genre = htmlspecialchars($_POST['genre']);
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
            $query = "INSERT INTO {$this->table} (nama, slug_nama, sinopsis, gambar, id_genre, id_user) VALUES (:nama, :slug_nama, :sinopsis, :gambar, :id_genre, :id_user)";
            $this->db->query($query);
            $this->db->bind('nama', $judul);
            $this->db->bind('slug_nama', $slug_judul);
            $this->db->bind('sinopsis', $deskripsi);
            $this->db->bind('gambar', $foto);
            $this->db->bind('id_genre', $id_genre);
            $this->db->bind('id_user', $_SESSION['user']['id']);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }

    public function tambahDataEpisode($slug, $link)
    {
        $query = "INSERT INTO episode (id_anime, link) VALUES (:id_anime, :link)";
        $this->db->query($query);
        $this->db->bind('id_anime', $slug);
        $this->db->bind('link', $link);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getEpisodeCount($slug)
    {
        $query = "SELECT COUNT(*) as count FROM episode WHERE id_anime = :id_anime";
        $this->db->query($query);
        $this->db->bind('id_anime', $slug);
        return $this->db->single()['count'];
    }

    public function hapusDataEpisode($link)
    {
        $query = "DELETE FROM episode WHERE link = :link";
        $this->db->query($query);
        $this->db->bind('link', $link);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataAnime()
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
            $query = "UPDATE {$this->table} SET nama = :judul, sinopsis = :deskripsi, gambar = :foto WHERE slug_nama = :slug_judul";
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


    public function hapusDataAnime($slug)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE slug_nama=:slug_nama");
        $this->db->bind('slug_nama', $slug);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
