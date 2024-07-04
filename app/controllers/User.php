<?php

class User extends Controller
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function index()
    {
        $data['judul'] = 'Login Akun';

        $this->view('layouts/auth_header', $data);
        $this->view('auth/login', $data);
        $this->view('layouts/footer');
    }

    public function register()
    {
        $data['judul'] = 'Daftar Akun';

        $this->view('layouts/auth_header', $data);
        $this->view('auth/register', $data);
        $this->view('layouts/footer');
    }

    public function detail()
    {
        // $this->checkLogin();

        // // Periksa peran pengguna yang masuk
        // if ($_SESSION['user']['role'] != 'User') {
        //     $_SESSION['flash'] = ['tipe' => 'error', 'pesan' => 'Anda tidak memiliki akses ke halaman ini', 'aksi' => ''];
        //     header('Location: ' . BASEURL . '/user/index');
        //     exit;
        // }

        $data['judul'] = 'Detail Akun';

        $this->view('layouts/auth_header', $data);
        $this->view('member/detail', $data);
        $this->view('layouts/footer');
    }


    public function createUser()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header("Location: " . BASEURL . "/index");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header("Location: " . BASEURL . "/user/register");
            exit;
        }
    }

    public function validateUser()
    {
        $this->model('User_model')->validasiUser();
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . '/user/index');
        exit;
    }

    public function updateData()
    {
        header('Content-Type: application/json');
        if ($this->model('User_model')->updateDataUser($_POST, $_FILES)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }







    private function checkLogin()
    {
        $this->model('User_model')->middlewareRole();
    }
}
