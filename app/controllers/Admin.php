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
        $this->view('admin/data_user', $data);
        $this->view('layouts/admin_footer');
    }

    public function detailUser($slug)
    {
        $data['judul'] = 'Master User';
        $data['user'] = $this->model('User_model')->getUserBySlug($slug);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/detail_user', $data);
        $this->view('layouts/admin_footer');
    }

    public function cariUser()
    {
        $nama = $_POST['keyword'];
        $data['judul'] = 'Master User';
        $data['users'] = $this->model('User_model')->getUsersByNama($nama);

        $this->view('layouts/admin_header', $data);
        $this->view('layouts/admin_sidebar', $data);
        $this->view('admin/data_user', $data);
        $this->view('layouts/admin_footer');
    }


    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Diubah', 'success');
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Diubah', 'danger');
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }
}
