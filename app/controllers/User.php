<?php

class User extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login Akun';

        $this->view('layouts/header', $data);
        $this->view('auth/login', $data);
        $this->view('layouts/footer');
    }

    public function register()
    {
        $data['judul'] = 'Daftar Akun';

        $this->view('layouts/header', $data);
        $this->view('auth/register', $data);
        $this->view('layouts/footer');
    }

    public function detail()
    {
        $data['judul'] = 'Detail Akun';

        $this->view('layouts/header', $data);
        $this->view('member/detail', $data);
        $this->view('layouts/footer');
    }

    public function createUser()
    {
    }

    public function validateUser()
    {
    }
}
