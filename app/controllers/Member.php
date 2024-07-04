<?php

class Member extends Controller {
    public function index() {
        $data['judul'] = 'Beranda Kamu';
        $data['anime'] = $this->model('Anime_model')->getAllAnimes();
        $data['berita'] = $this->model('Berita_model')->getAllNews();

        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('member/index', $data);
        $this->view('layouts/footer');
    }

    public function berita($slug) {
        $data['judul'] = 'Berita Anime';
        $data['berita'] = $this->model('Berita_model')->getNewsBySlug($slug);
        $data['comments'] = $this->model('BeritaComment_model')->getCommentsBySlugNews($slug);

        $this->view('layouts/header', $data);
        $this->view('member/berita', $data);
        $this->view('layouts/footer');
    }

    public function anime($slug) {
        $data['judul'] = 'Detail Anime';
        $data['anime'] = $this->model('Anime_model')->getAnimesBySlug($slug);
        $data['genre'] = $this->model('Anime_model')->getAnimeGenre($data['anime']['id_genre']);
        $data['episodes'] = $this->model('Anime_model')->getEpisodesBySlug($slug);
        $data['comments'] = $this->model('AnimeComment_model')->getCommentsBySlugNews($slug);

        $this->view('layouts/header', $data);
        $this->view('member/anime', $data);
        $this->view('layouts/footer');
    }

    public function addKomentar($slug) {
        error_log(print_r($_POST, true));
        $data['anime'] = $this->model('Anime_model')->getAnimesBySlug($slug);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $komentar = $_POST['komentar'];

            if ($this->model('AnimeComment_model')->tambahDataKomentar($data['anime']['id'], $komentar)) {
                $comments = $this->model('AnimeComment_model')->getCommentsBySlugNews($slug);
                echo json_encode(['success' => true, 'comments' => $comments]);
            } else {
                echo json_encode(['success' => false]);
            }
        }
    }

    public function addKomentar2($slug) {
        error_log(print_r($_POST, true));
        $data['berita'] = $this->model('Berita_model')->getNewsBySlug($slug);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $komentar = $_POST['komentar'];

            if ($this->model('BeritaComment_model')->tambahDataKomentar($data['berita']['id'], $komentar)) {
                $comments = $this->model('BeritaComment_model')->getCommentsBySlugNews($slug);
                echo json_encode(['success' => true, 'comments' => $comments]);
            } else {
                echo json_encode(['success' => false]);
            }
        }
    }
}