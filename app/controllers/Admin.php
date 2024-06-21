<?php

class Admin extends Controller
{
    public function index()
    {
        $data['judul'] = 'DAFTAR PENGGUNA APLIKASI';

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

    public function detailBerita($slug)
    {
        $data['judul'] = 'Master Berita';
        $data['news'] = $this->model('Berita_model')->getNewsBySlug($slug);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/berita/detail_berita', $data);
        $this->view('layouts/admin_footer');
    }
}
