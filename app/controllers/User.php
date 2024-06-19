<?php

class User extends Controller {
    public function index() {
        $data['judul'] = 'Login Akun';

        $this->view('layouts/header', $data);
        $this->view('auth/login', $data);
        $this->view('layouts/footer');
    }

    public function createUser() {

    }

    public function validateUser() {

    }
}