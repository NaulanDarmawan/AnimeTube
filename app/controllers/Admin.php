<?php

class Admin extends Controller
{
    public function index()
    {
        $data['judul'] = 'DAFTAR PENGGUNA APLIKASI';
        $data['total'] = $this->model('Anime_model')->getDataCount();

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/index', $data);
        $this->view('layouts/admin_footer');
    }

    // Fungsi CRUD Full Bagi User
    public function user()
    {
        $data['judul'] = 'Master User';
        $data['users'] = $this->model('User_model')->getAllUsers();

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/user/data_user', $data);
        $this->view('layouts/admin_footer');
    }

    public function detailUser($slug)
    {
        $data['judul'] = 'Master User';
        $data['user'] = $this->model('User_model')->getUserBySlug($slug);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/user/detail_user', $data);
        $this->view('layouts/admin_footer');
    }

    public function cariUser()
    {
        $nama = $_POST['keyword'];
        $data['judul'] = 'Master User';
        $data['users'] = $this->model('User_model')->getUsersByNama($nama);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/user/data_user', $data);
        $this->view('layouts/admin_footer');
    }

    public function updateUser()
    {
        if ($this->model('User_model')->updateRole($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diganti', 'success');
            header("Location: " . BASEURL . "/admin/user");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diganti', 'danger');
            header("Location: " . BASEURL . "/admin/user");
            exit;
        }
    }

    public function hapusUser($slug)
    {
        if ($this->model('User_model')->deleteUser($slug) > 0) {
            Flasher::setFlash('Berhasil', 'Diganti', 'success');
            header("Location: " . BASEURL . "/admin/user");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diganti', 'danger');
            header("Location: " . BASEURL . "/admin/user");
            exit;
        }
    }


    // Fungsi CRUD Full Bagi Genre
    public function genre()
    {
        $data['judul'] = 'Master Genre';
        $data['genres'] = $this->model('Genre_model')->getAllGenres();

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/genre/data_genre', $data);
        $this->view('layouts/admin_footer');
    }

    public function detailGenre($id)
    {
        $data['judul'] = 'Master User';
        $data['genre'] = $this->model('Genre_model')->getGenreById($id);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/genre/detail_genre', $data);
        $this->view('layouts/admin_footer');
    }

    public function cariGenre()
    {
        $nama = $_POST['keyword'];
        $data['judul'] = 'Master User';
        $data['genres'] = $this->model('Genre_model')->getGenresByNama($nama);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/genre/data_genre', $data);
        $this->view('layouts/admin_footer');
    }

    // Fungsi CRUD Full Bagi Anime
    public function anime()
    {
        $data['judul'] = 'Master Anime';
        $data['news'] = $this->model('Anime_model')->getAllAnimes();

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/anime/data_anime', $data);
        $this->view('layouts/admin_footer');
    }

    public function cariAnime()
    {
        $judul = $_POST['keyword'];
        $data['judul'] = 'Master Anime';
        $data['news'] = $this->model('Anime_model')->getAnimesByJudulOrSinopsis($judul);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/anime/data_anime', $data);
        $this->view('layouts/admin_footer');
    }

    public function halamanTambahAnime()
    {
        $data['judul'] = 'Master Anime';
        $data['genres'] = $this->model('Genre_model')->getAllGenres();

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/anime/tambah_anime', $data);
        $this->view('layouts/admin_footer');
    }

    public function tambahAnime()
    {
        if ($this->model('Anime_model')->tambahDataAnime($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header("Location: " . BASEURL . "/admin/anime");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header("Location: " . BASEURL . "/admin/anime");
            exit;
        }
    }

    public function tambahEpisode()
    {
        error_log(print_r($_POST, true));
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $slug = $_POST['slug'];
            $link = $_POST['link'];

            if ($this->model('Anime_model')->tambahDataEpisode($slug, $link)) {
                $no_urut = $this->model('Anime_model')->getEpisodeCount($slug);
                echo json_encode(['success' => true, 'no_urut' => $no_urut, 'link' => $link]);
            } else {
                echo json_encode(['success' => false]);
            }
        }
    }

    public function hapusEpisode($link)
    {
        error_log(print_r($_POST, true));
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $slug = $_POST['slug']; // Pastikan 'slug' dikirim dalam request POST
            if ($this->model('Anime_model')->hapusDataEpisode($link)) {
                $no_urut = $this->model('Anime_model')->getEpisodeCount($slug);
                echo json_encode(['success' => true, 'no_urut' => $no_urut, 'link' => $link]);
            } else {
                echo json_encode(['success' => false]);
            }
        }
    }

    public function detailAnime($slug)
    {
        $data['judul'] = 'Master Anime';
        $data['news'] = $this->model('Anime_model')->getAnimesBySlug($slug);
        $data['episodes'] = $this->model('Anime_model')->getEpisodesBySlug($slug);
        $data['comments'] = $this->model('AnimeComment_model')->getCommentsBySlugNews($slug);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/anime/detail_anime', $data);
        $this->view('layouts/admin_footer');
    }

    public function updateAnime()
    {
        if ($this->model('Anime_model')->updateDataAnime($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diganti', 'success');
            header("Location: " . BASEURL . "/admin/anime");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diganti', 'danger');
            header("Location: " . BASEURL . "/admin/anime");
            exit;
        }
    }

    public function hapusAnime($slug)
    {
        if ($this->model('Anime_model')->hapusDataAnime($slug) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header("Location: " . BASEURL . "/admin/anime");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header("Location: " . BASEURL . "/admin/anime");
            exit;
        }
    }

    // Fungsi CRUD Full Bagi Berita
    public function berita()
    {
        $data['judul'] = 'Master Berita';
        $data['news'] = $this->model('Berita_model')->getAllNews();

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/berita/data_berita', $data);
        $this->view('layouts/admin_footer');
    }

    public function cariBerita()
    {
        $judul = $_POST['keyword'];
        $data['judul'] = 'Master Berita';
        $data['news'] = $this->model('Berita_model')->getNewsByJudulOrDesc($judul);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/berita/data_berita', $data);
        $this->view('layouts/admin_footer');
    }

    public function halamanTambahBerita()
    {
        $data['judul'] = 'Master Berita';

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/berita/tambah_berita', $data);
        $this->view('layouts/admin_footer');
    }

    public function tambahBerita()
    {
        if ($this->model('Berita_model')->tambahDataBerita($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header("Location: " . BASEURL . "/admin/berita");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header("Location: " . BASEURL . "/admin/berita");
            exit;
        }
    }

    public function detailBerita($slug)
    {
        $data['judul'] = 'Master Berita';
        $data['news'] = $this->model('Berita_model')->getNewsBySlug($slug);
        $data['comments'] = $this->model('BeritaComment_model')->getCommentsBySlugNews($slug);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/berita/detail_berita', $data);
        $this->view('layouts/admin_footer');
    }

    public function updateBerita()
    {
        if ($this->model('Berita_model')->updateDataBerita($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diganti', 'success');
            header("Location: " . BASEURL . "/admin/berita");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diganti', 'danger');
            header("Location: " . BASEURL . "/admin/berita");
            exit;
        }
    }

    public function hapusBerita($slug)
    {
        if ($this->model('Berita_model')->hapusDataBerita($slug) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header("Location: " . BASEURL . "/admin/berita");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header("Location: " . BASEURL . "/admin/berita");
            exit;
        }
    }
}
