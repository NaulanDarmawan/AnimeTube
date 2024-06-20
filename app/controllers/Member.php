<?php

class Member extends Controller {
    public function index() {
        $data['judul'] = 'Beranda Kamu';

        $this->view('layouts/header', $data);
        $this->view('layouts/navbar');
        $this->view('member/index', $data);
        $this->view('layouts/footer');
    }

    public function berita() {
        $data['judul'] = 'Berita Anime';

        $this->view('layouts/header', $data);
        $this->view('member/berita', $data);
        $this->view('layouts/footer');
    }

    public function anime() {
        $data['judul'] = 'Detail Anime';

        $this->view('layouts/header', $data);
        $this->view('member/anime', $data);
        $this->view('layouts/footer');
    }
}